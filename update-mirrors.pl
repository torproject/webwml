#!/usr/bin/env perl
# This is Free Software (GPLv3) http://www.gnu.org/licenses/gpl-3.0.txt
# This script is currently being refactored: https://bugs.torproject.org/22182
use warnings;
use strict;
use Getopt::Long; # https://metacpan.org/pod/Getopt::Long::Modern
use File::Basename;
use Data::Dumper;
use LWP::Simple;
use HTML::LinkExtor;
use LWP; # https://metacpan.org/pod/distribution/libwww-perl/lwptut.pod
use Time::Piece; # https://metacpan.org/pod/Time::Piece
use Digest::SHA qw(sha256_hex);
use Try::Tiny;

# Set Defaults
my %opts = (
  'max_age' => 2,
  'socks_proxy' => '127.0.0.1:9050',
  'disable_proxy' => 0,
  'verify_files' => 0,
  'remove_failing' => 0,
  'skip_tests' => 0,
  'csvfile' => 'include/tor-mirrors.csv',
  'wmifile' => 'include/mirrors-table.wmi');

sub print_help {
    print "
Check if Tor mirrors are reachable, update $opts{'csvfile'} and regenerate
$opts{'wmifile'} which is included in getinvolved/en/mirrors.wml and appears at
https://www.torproject.org/getinvolved/mirrors

Usage: $0 [options]
\t--max-age\t\tChange acceptable age for mirrors in days (Default: $opts{'max_age'})
\t--socks-proxy\t\tDefine SOCKS proxy to access mirrors (Default: $opts{'socks_proxy'})
\t--no-proxy\t\tDirectly connect to mirrors.
\t--verify-files\t\tDownload random files and verify their signature
\t\t\t\t(depending on connection speed this can take a bit)
\t--remove-failing\tRemove unreachable mirrors from the list
\t--skip-tests\t\tjust regenerate table (after minor changes or for debugging)
\t--csv\t\t\tDefine alternative csv file (Default: $opts{'csvfile'})
\t--wmi\t\t\tDefine alternative wmi file (Default: $opts{'wmifile'})
\t--help\t\t\tShow this help\n";
  exit 0;
}

# Parse Options
GetOptions(
  "max-age=n"     => \$opts{'max_age'},
  "socks-proxy=s" => \$opts{'socks_proxy'},
  "no-proxy"      => \$opts{'no_proxy'},
  "verify-files"  => \$opts{'verify_files'},
  "remove-failing" => \$opts{'remove_failing'},
  "skip-tests"      => \$opts{'skip_tests'},
  "csv=s"         => \$opts{'csvfile'},
  "wmi=s"         => \$opts{'wmifile'},
  "help"          => sub { &print_help }
) or die "Error parsing arguments. Please try again.\n";

# TODO Make global variables unnecessary
my (@columns, @torfiles, %randomtorfiles, %failures, %regions);

# Functions

# Returns a date string for a given date object
sub DateString {
  my ($date_object) = @_;
  return $date_object->strftime("%a %b %e %T %Y");
}

# Returns seconds since epoch [string]
sub GetTime {
  my ($string) = @_;
  try {
      # usually the string looks like: Sun Oct 21 21:18:56 2018
      my $date    = Time::Piece->strptime($string, "%a %b  %d %T %Y");
      return $date->epoch;
  } catch {
      warn "\tGetTime: Failed to parse: $string\n";
      return 0;
  };
}

# Strips special characters [string]
sub SanitizeContent {
    my ($taintedData) = @_;
    my $whitelist = '-a-zA-Z0-9: +';
    # clean the data, return cleaned data
    $taintedData =~ s/[^$whitelist]//go;
    return $taintedData;
}

# Removes potential double slash at end of an URL [string]
sub CleanUrl {
    my ($url) = @_;
    die "CleanUrl: called without argument.\n" unless ($url);
    $url =~ s/([^:])\/\//$1\//g;
    return $url;
}

# Returns array of files [string, string, object]
sub ExtractLinks {
    my ($content, $url, $ua) = @_;
    unless ($content) { die "ExtractLinks: Called with empty content.\n"; }
    unless ($url) { die "ExtractLinks: Called with empty URL.\n"; }
    my @links;
    my $parser = HTML::LinkExtor->new(undef, $url);
    $parser->parse($content);
    foreach my $linkarray ($parser->links) {
        my ($elt_type, $attr_name, $attr_value) = @$linkarray;
        if ($elt_type eq 'a' && $attr_name eq 'href' && $attr_value =~ /\/$/ && $attr_value =~ /^$url/) {
            push @links, Fetch($ua, $attr_value, \&ExtractLinks);
        }
	#elsif ($attr_value =~ /\.(asc)$/) # small pgp files easier to test with
        elsif ($attr_value =~ /\.(xpi|dmg|exe|tar\.gz)$/) {
            push @links, $attr_value;
        }
    }
    return @links;
}

# Prints date string [string]
sub ExtractDate {
    my ($string) = @_;
    die "\tExtractDate: called with empty string.\n" unless ($string);
    my @lines = split "\n", $string;
    warn "\tExtractDate: empty string after split by newlines.\n" unless ($lines[0]);
    $string = SanitizeContent($lines[0]);
    warn "\tExtractDate: SanitizeContent returned empty string.\n" unless ($string);
    my $date;
    try {
      # usually the string looks like: Tue Oct  1 16:49:59 UTC 2018
      # TODO we could do some pre-parsing to validate the string first
      $date    = Time::Piece->strptime($string, "%a %b  %d %T UTC %Y");
    } catch {
      warn "\tExtractDate: Failed to parse: $string\n";
      return undef;
    };

    if ($date && $date->epoch > 0) {
        print "\tExtractDate:\t". DateString($date) ."\n";
        return $date;
    } else {
        warn "\tExtractDate: strptime returned empty date for: $string\n";
    }
    return undef;
}

# Prints signature [string, string]
sub ExtractSig {
    my ($content, $url) = @_;
    my $sig = sha256_hex($content);
    print "\tExtractSig($url) = $sig\n";
    return $sig;
}

# Returns version strin [string, string]
sub FindVersion {
    my ($content, $url) = @_;
    # TODO Parsing the webpage is an unstable solution (#21222).
    foreach (split "\n", $content) {
      if (/<em>Version ([\d\.]+) /) { return $1; }
    }
    return undef;
}

# Calls subrouting or print / saves error [ua object, string, subroutine]
sub Fetch {
    my ($ua, $url, $sub) = @_;
    if (! $url || $url eq '') { die "Fetch: called with empty URL.\n"; }
    print "\nGET $url: ";
    my $request = new HTTP::Request GET => "$url";
    my $result = $ua->request($request);
    my $code = $result->code();
    print "$code\n";
    my $last_modified;
    if ($result->header('Last-Modified')) {
        $last_modified = $result->header('Last-Modified');
        print "\tLast-Modified:\t$last_modified\n";
    }

    if ($result->is_success && $code eq "200") {
        my $content = $result->content;
        if ($content) {
            return $sub->($content, $url, $ua);
       } else {
          print "\tFetch: Empty content, no mirror here.\n";
          return -1;
       }
    } elsif ($code eq "301") {
      #print "\tFetch: Received '301 Moved Permanently'\n";
      return -301;
    } elsif ($code eq "403") {
      #print "\tFetch: Received '403 Forbidden'\n";
      return -403;
    } elsif ($code eq "404") {
      #print "\tFetch: Received '404 Not Found'\n";
      return -404;
    } else {
      my $error = $result->message;
      $error =~ s/^.+\(([^)]+)\).*$/$1/;
      print "\t$code $error\n";
      push (@{$failures{"$code $error"}}, $url);
    }
    return undef;
}

# Returns array of mirrors [string]
sub LoadMirrors {
    my ($columns) = @_;
    open(my $fh, "<", $opts{'csvfile'}) or die "Cannot open '$opts{'csvfile'}': $!";
    my $line = <$fh>;
    chomp($line);
    @$columns = split(/\s*,\s*/, $line);
    my @mirrors;
    while (<$fh>) {
        chomp;
	my @values = split(/\s*,\s*/);
	my %server;
	for (my $i = 0; $i < scalar(@$columns); $i++)	{
	    $server{$columns->[$i]} = $values[$i] || '';
	}
        try {
            $server{updateDate} = Time::Piece->strptime($server{updateDate}, "%a %b %d %T %Y") if ($server{updateDate}); # alternatice "%c" < Sun Sep 30 18:48:27 2018
        } catch {
            $server{updateDate} = "";
        };
	push @mirrors, {%server};
    }
    close($fh);
    my $count = scalar(@mirrors);
    die "LoadMirrors: The list of loaded mirrors is empty.\n" unless ($count > 0);
    print "Loaded $count mirrors from disk.\n";
    return @mirrors;
}

# Writes mirrors to file [string, int, array]
sub DumpMirrors {
    my ($columns, $time_barrier, @m) = @_;
    open(my $csvfh, ">", $opts{'csvfile'}) or die "Cannot open '$opts{'csvfile'}': $!";
    print $csvfh join(", ", @$columns) . "\n";
    print "\nSaving mirrors that responded since ". DateString($time_barrier) ." (". $time_barrier->epoch .").\n";
    foreach my $server(@m) {
        next unless ($server->{httpWebsiteMirror} || $server->{httpsWebsiteMirror} || $server->{ftpWebsiteMirror} || $server->{httpDistMirror} || $server->{httpsDistMirror} || $server->{hiddenServiceMirror});
        if ($opts{'remove_missing'}) {
            next unless ($server->{updateDate} && $server->{updateDate} > $time_barrier);
        }
        print $csvfh join(", ", map($server->{$_}, @$columns));
	print $csvfh "\n";
    }
    close($csvfh);
    print "Updated $opts{'csvfile'}.\n";
}

# Returns html for a given server [string]
sub PrintServer {
     my ($server) = @_;
     my $return = "\n<tr>\n\t<td>$server->{orgName}</td>\n\t<td><small>$server->{updateDate}</small></td>\n";

     my %web = (
                        httpWebsiteMirror => "http",
                        httpsWebsiteMirror => "https",
                        ftpWebsiteMirror => "ftp",
                        rsyncWebsiteMirror => "rsync",
                        hiddenServiceMirror => "onion");
     my %dist = (
                        httpDistMirror => "http",
                        httpsDistMirror => "https",
                        rsyncDistMirror => "rsync");

     foreach my $type (\%web, \%dist) {
         $return .= "\t<td>\n";
         foreach my $protocol ( sort keys %$type ) {
             if ($server->{$protocol}) {
                 my $url = $server->{$protocol};
                 my $tag = $type->{$protocol};
                 $return .= "\t\t<a href=\"$url\">$tag</a>\n";
             }
         }
         $return .= "\t</td>\n";
     }
     $return .= "</tr>\n";
     return $return;
}

# Start
chdir dirname($0);
die "Could not find 'include' - are we in the webwml directory?.\n" unless (-d 'include');
my $tortime = localtime;
my ($secperday, $lua, $tb_version) = (86400);
my $trace_path = 'project/trace/www-master.torproject.org';
my $download_path = 'download/download.html.en';
STDOUT->autoflush(1); # unbuffer stdout to show progress
my @m = LoadMirrors(\@columns);

unless ($opts{'skip_tests'}) {

# Init LWP
print "=============== Testing mirrors with LWP UserAgent $LWP::VERSION ===============\n";
$lua = LWP::UserAgent->new(
    max_redirect => 0,
    keep_alive => 1,
    timeout => 30,
    agent => "Tor MirrorCheck Agent"
); # https://metacpan.org/pod/LWP::UserAgent

# Configure Proxy
unless ($opts{'no_proxy'}) {
  print "Loading LWP::Protocol::socks. Install module or use --no-proxy if this fails.\n";
  require LWP::Protocol::socks; # https://metacpan.org/pod/LWP::Protocol::socks
  $lua->proxy([qw(http https)] => "socks://$opts{'socks_proxy'}");
}

# Test proxy with tpo
print "\nRetrieve current time from tpo:";
$tortime  = (Fetch($lua, "http://expyuzz4wqqyqhjn.onion/$trace_path", \&ExtractDate)
  or Fetch($lua, "https://www.torproject.org/$trace_path", \&ExtractDate))
  or die "Can't extract time from tpo. Are we or they offline?\n";
die "Failed to parse date returned by tpo ($tortime).\n" if ($tortime < 0);
print "The time barrier for mirrors to be listed is ". DateString($tortime) ." (". $tortime->epoch .").\n";

print "\nDetermine current TB version:";
$tb_version = (Fetch($lua, "http://expyuzz4wqqyqhjn.onion/$download_path", \&FindVersion)
  or Fetch($lua, "https://www.torproject.org/$download_path", \&FindVersion))
  or die "Can't extract tb version from tpo. Are we or they offline?\n";
if ($tb_version) { print "Tor Browser stable: $tb_version\n"; }
else { die "Found no Tor Browser version on the download page, this script needs an update ($tb_version).\n"; }

# nit: There's virtually no risk to receive a 403 above but it could cause a bug.

# Save hash of current checksum file to verify dist mirrors later
my $sumfile = "/torbrowser/$tb_version/sha256sums-signed-build.txt";
$randomtorfiles{$sumfile} = Fetch($lua, CleanUrl("https://dist.torproject.org/$sumfile"), \&ExtractSig);
die "Couldn't extract signature of $sumfile." unless ($randomtorfiles{$sumfile} || $randomtorfiles{$sumfile} >0);

if ($opts{'verify_files'}) {
    # it is not optimal that we crawl dist, but it might be necessary if we
    # are asked to thoroughly verify files on the mirrors.
    @torfiles = Fetch($lua, "https://www.torproject.org/dist/", \&ExtractLinks);
    die "Found no files on dist.\n" unless (@torfiles > 0);

    my $r = int(rand(scalar(@torfiles)));
    my $suffix = $torfiles[$r];
    $suffix =~ s/^https:\/\/www.torproject.org//;
    $randomtorfiles{$suffix} = Fetch($lua, $torfiles[$r], \&ExtractSig);

    print "Using these files for sig matching:\n". join("\n", keys %randomtorfiles) ."\n";
}

} # / skip_tests
$tortime -= $opts{'max_age'} * $secperday;
for my $server (@m) {
    foreach my $field (qw/ipv4 ipv6 loadBalanced/) { # unify boolean values
        unless ($server->{$field} =~ /TRUE|FALSE/) {
            $server->{$field} = ($server->{$field} =~ /yes|true|1/i) ? 'TRUE' : 'FALSE';
        }
    }

    foreach my $serverType ('httpWebsiteMirror', 'httpsWebsiteMirror', 'ftpWebsiteMirror', 'httpDistMirror', 'httpsDistMirror', 'hiddenServiceMirror') {
        next unless ($server->{$serverType});

        my $url = CleanUrl("$server->{$serverType}/");
        if ($url ne "$server->{$serverType}") { # silently correct URL
            $server->{$serverType} = $url;
        }

        # There are several mirror types and we want to find out if each is up to date
        if ($serverType =~ /httpWebsiteMirror|httpsWebsiteMirror|ftpWebsiteMirror|hiddenServiceMirror/) {
            next if ($opts{skip_tests});
            my $updateDate = Fetch($lua, CleanUrl("$url$trace_path"), \&ExtractDate);

            if (not defined $updateDate) {
                if ($opts{'remove_failing'}) {
                  print "\tRemoving $url\n";
                  $server->{$serverType} = '';
                  next;
                }
                push (@{$failures{'No trace URL'}}, $url);
                #print "\t$url ($server->{'adminContact'}) has issues but without --remove-failing we keep it.\n";

            } elsif ($updateDate < 0) { # We received a clear error.
                print "\tRemoving $url\n";
                $server->{$serverType} = '';

            } elsif ($updateDate) {
                $server->{updateDate} = $updateDate;

                # Check offered TB version
                my $version = Fetch($lua, CleanUrl("$url$download_path"), \&FindVersion);
                my $errors;
                unless ($version) {
                    print "\tFound no Tor Browser version.\n";
                    push (@{$failures{'No download version'}}, $url);
                    $errors++;
                } elsif ($tb_version ne $version) {
                    print "\tMirror offers an old Tor Browser version: $version\n";
                    push (@{$failures{'Wrong download version'}}, $url);
                    $errors++;
                } else { print "\tTor Browser stable: $version\n"; }
                if ($errors && $opts{'remove_failing'}) {
                    print "\tRemoving $url\n";
                    $server->{$serverType} = '';
                    next;
                }
            }

        } elsif ($serverType =~ /httpDistMirror|httpsDistMirror/) {
            next if ($opts{skip_tests});
            $server->{sigMatched} = 1;
            foreach my $randomtorfile(keys %randomtorfiles) {
                my $sig = Fetch($lua, CleanUrl("$url$randomtorfile"), \&ExtractSig);
                if (!$sig) {
                    $server->{sigMatched} = 0;
                    last;
                } elsif ($sig ne $randomtorfiles{$randomtorfile}) {
                    push (@{$failures{'Signature mismatch'}}, $url);
                    $server->{sigMatched} = 0;
                    last;
                } else {
                    # TODO how do we find out the update time without another request
                    # If we do not update the time only-dist mirrors are discriminated.
                    # Alternatively setting the current time may be misleading.
                    # Using $tortime assuming everything is fine passing the checksum test.
                    $server->{updateDate} = DateString($tortime);
                }
            }
        } else { die "Unrecognized server type: $serverType\n"; }
    }
    if ($server->{updateDate} &&  &GetTime($server->{updateDate}) > $tortime->epoch) {
        push (@{$regions{ $server->{region} }{ $server->{subRegion} } }, $server);
    } else { push (@{$failures{'Outdated'}}, "<a name='$server->{'orgName'}'></a><a href='#$server->{'orgName'}' title='Last update: ". ($server->{updateDate} || '') ."'>$server->{'orgName'}</a>"); }
    # TODO We could generate a mail to admins with failing mirrors
}

# TODO we could also check rsync

# show mirror issues
my $failing_mirrors;
if (!$opts{'remove_failing'}) {
    foreach my $error (sort keys %failures) {
        next unless (@{$failures{$error}} > 0);
        my $failing = join ', ', @{$failures{$error}};
        $failing_mirrors .= "<tr><td colspan='5'><h4 id='$error'><a href='#$error'>$error</a></h4></td></tr>\n<tr><td colspan='5'><small>$failing</small></td>";
    }
}

# open wmi for writing
open (my $wmifh, '>', $opts{'wmifile'}) or die "Can't write $opts{'wmifile'}: $!";
$wmifh->autoflush(1); # unbuffer stdout to show progress

# Print server list sorted by region
print $wmifh "<ul>\n";
foreach my $region (sort keys %regions) {
    print $wmifh "<li><strong><a href='#$region'>$region</a></strong>: ";
    foreach my $subregion (sort keys %{$regions{$region}}) {
        print $wmifh "<a href='#$subregion'>$subregion</a> <small>(". @{$regions{$region}{$subregion}} .")</small> ";
    }
    print $wmifh "</li>\n";
}
print $wmifh "</ul>\n";

foreach my $region (sort keys %regions) {
    my $subregions;
    foreach my $subregion (sort keys %{$regions{$region}}) {
        my $servers;
        foreach my $server (
          sort { &GetTime($b->{updateDate}) <=> &GetTime($a->{updateDate}) }
          @{$regions{$region}{$subregion}} ) {
            $servers .= PrintServer($server);
        }
        $subregions .= "<tr><td colspan=5><h4 id='$subregion'>$subregion</h4></td></tr>\n$servers" if ($servers);
    }
    print $wmifh "<tr><td colspan=5><h3 id='$region'>$region</h3></td></tr>\n$subregions" if ($subregions);
}
print $wmifh "<tr><td colspan=\"5\"><h3 id='failing'><a href='#failing'>Why is my mirror not listed above?</a></h3></td></tr>\n$failing_mirrors" if ($failing_mirrors);
close($wmifh);

DumpMirrors(\@columns, $tortime - 31*$secperday, @m);
print "Updated $opts{'wmifile'}.\nWe are done here, enjoy your day!\n";

__END__

Possible improvements:
- above code has several TODOs
- the various server types are repeated at a few places and should be centralized in a hash
- be less verbose per default
- use consistent variable/function names
- run script through perltidy: https://metacpan.org/pod/Perl::Tidy - https://metacpan.org/pod/distribution/Perl-Tidy/bin/perltidy
- run it through perl critic, a Perl source code analyzer with policies based on Perl Best Practices (PBP): Perl::Critic::Freenode http://p3rl.org/
- use Text::CSV (start with the csv() function), Mojo::CSV, Text::xSV, or DBD::CSV http://tburette.github.io/blog/2014/05/25/so-you-want-to-write-your-own-CSV-code/
- line 167 in LoadMirrors replaces columns with contents 0 to ''
