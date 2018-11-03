#!/usr/bin/env perl
use strict;
use warnings;
use Getopt::Long;
use Time::Piece;

# Set Defaults
my %opts = (
  'keysfile'  => 'include/keys.txt',
  'wmifile'   => 'include/keys.wmi',
  'fpfile'    => 'include/subkey_fingerprints.wmi',
  'force-key-updates' => 0,
  'no-refresh-keys'  => 0,
  'refresh-keys'  => 1, # set >1 to always force
);

sub print_help {
    print "
This script loads the GPG keys of Tor Project release teams from
$opts{'keysfile'}, refreshes them and updates
$opts{'fpfile'} and $opts{'wmifile'}
which is included in docs/en/signing-keys.wml.

It expects gpg >= v2.1 to be installed and working.

Usage: $0 [options]
\t--keysfile\t\tPath to file with GPG key IDs (Default: $opts{'keysfile'})
\t--wmifile\t\tPath to wmi file to be generated (Default: $opts{'wmifile'})
\t--fpfile\t\tPath to wmi file for Tor Browser subkey fingerprints to be generated (Default: $opts{'fpfile'})
\t--refresh-keys\t\tRefresh GPG keys no matter what.
\t--no-refresh-keys\tDon't refresh GPG keys.\n";
  exit 0;
}

# Parse Options
GetOptions(
  'keysfile=s'          => \$opts{'keysfile'},
  'wmifile=s'           => \$opts{'wmifile'},
  'fpfile=s'            => \$opts{'fpfile'},
  'refresh-keys'      => \$opts{'force-key-updates'},
  'no-refresh-keys'   => \$opts{'no-refresh-keys'},
  'help'              => sub { &print_help }
) or die "Error parsing arguments. Please try again.\n";

# First we load the keys, then we create a wmi file which is included by
# https://www.torproject.org/docs/signing-keys.html.en

# Determine the base directory in case we are called from somewhere else.
# We assume to sit in docs/en. Update $root path if this file has moved:
$0 =~ /^(.+)\/[^\/]+$/;
my $root = "$1/../..";
chdir $root or die "Could not enter $root: $! (script path: $0)\n";
open my $kf, '<', $opts{'keysfile'} or die "Could not open $opts{'keysfile'}: $!\n";

## Load keys txt

my %sections; # project => key owners
my %owners; # key owner => string with all keys
my @apps; # save sections in order of appearance
my $section;
foreach (<$kf>) {
  # filters comment and empty lines
  next if ($_ eq "\n");
  if (/^#/) {
  # [section] / project
  } elsif (/^\[(.+)\]$/) {
    $section = "$1";
    $sections{"$section"} = ();
    push (@apps, $section);
  # key owner with list of key id(s)
  } elsif (/^([^:]+):(.+)$/) {
    my $owner = "$1";
    my $keys = "$2";
    push( @{$sections{"$section"}}, $owner);
    $owners{"$owner.$section"} = "$keys";
  # tell about unrecognized lines
  } else { print "Ignored line: $_\n"; }
}
close $kf;
my @owners = keys %owners;
print "Loaded $opts{'keysfile'}. Found $#owners key owners for $#apps applications.\n";


## Update keys and generate wmi

if ($opts{'no-refresh-keys'}) {
  print "Not refreshing keys.\n";
  undef $opts{'refresh-keys'};
} elsif ($opts{'force-key-updates'}) {
  print "Refreshing keys requested.\n";
  $opts{'refresh-keys'}++;
  # If the keysfile did not change since the last run, we will not update them.
} elsif (-f $opts{'wmifile'} && system "test $opts{'wmifile'} -ot $opts{'keysfile'}") {
  print "No need to refresh keys.\n";
  $opts{'refresh-keys'}--;
} else { print "Wil refresh GPG keys.\n"; }

my $buffer = ''; # project overview string
my %fingerprints;
foreach my $app (@apps) {
  print "\nUpdating keys for '$app':\n" if ($opts{'refresh-keys'});
  my ($keys, $subkey_fingerprints, $owners) = ('', '', '');
  my @keysforapp;
  # we grab the key owners for each project and iterate over their keys
  foreach my $owner (@{$sections{"$app"}}) { # iterate over owners
    my $keys = $owners{"$owner.$app"};
    # example for $keys: 0x165733EA, 0x8D29319A(signing key)
    my ($inbrackets, $inbrackets_html);
    my @keys = split (',', $keys); 
    foreach my $key (@keys) { # iterate over keys
      $key =~ s/\s*//g;
      my $keylink = "<a href='https://pgp.mit.edu/pks/lookup?search=$key&op=vindex&exact=on'>$key</a>";
      push (@keysforapp, $key);
      unless ($inbrackets) { # first key
        $inbrackets = $key;
        $inbrackets_html = $keylink;
      } else { # second key
          $inbrackets .= " and $key";
          $inbrackets_html .= " and $keylink";
      }
    }
    my $sep = ($owners eq '') ? '' : ', ';
    # Add owner to the list
    $owners .= "$sep$owner ($inbrackets_html)";
    print " - $owner ($inbrackets)\n";
  }
  $buffer .= "<li><strong>$app</strong>: $owners</li>\n";

  # we update collected keys for this application and create a string of them
  my $gpgcmd = "gpg --keyid-format 0xlong --fingerprint --with-subkey-fingerprints";
  foreach my $key (@keysforapp) {
    # update keys
    if ($opts{'refresh-keys'}) {
      print "\nFetching $key\n";
      my $gpgresult;
      do { $gpgresult = system "gpg --recv-key $key"; sleep 1; }
      while ($gpgresult != 0);
    }

    # add output to key string
    my $str = qx/$gpgcmd $key/;
    # replace html codes
    $str =~ s/</&lt;/g; $str =~ s/>/&gt;/g; $str =~ s/@/#/g; $str =~ s/@/&at;/g;
    $keys .= "\n$str";
  }
  # save formatted string for project
  $fingerprints{"$app"} = "<pre>\n$keys</pre>\n";

  if ($app eq "Tor Browser releases") {
    my $owner = "The Tor Browser Developers";
    die "Did not findTor Browser signing key.\n" unless ($owners{"$owner.$app"});
    # save Tor Browser signing key subkey fingerprints to $fpfile
    my @fp = qx/$gpgcmd $owners{"$owner.$app"}|grep "Key fingerprint"/;
    shift @fp; # remove primary key fingerprint
    $subkey_fingerprints .= join ('', map { s/^\s+Key fingerprint = //; "$_" } @fp);
    if (open my $fpout, '>', "$opts{'fpfile'}.temp") {
      print $fpout "#!/usr/bin/env wml\n$subkey_fingerprints";
      close $fpout;
      # check that the written file is not empty
      my $written_lines = qx/wc -l "$opts{'fpfile'}.temp"|wc -l/;
      if ($written_lines gt 0) {
        rename "$opts{'fpfile'}.temp", $opts{'fpfile'} and
          print "\nWrote following subkey fingerprints to $opts{'fpfile'}:\n$subkey_fingerprints\n"
          or die "Could not overwrite $opts{'fpfile'}: $!\n";
      } else { die "Created $opts{'fpfile'}.temp but it is empty.\n"; }
    } else { die "Could not create temporary file $opts{'fpfile'}.temp.\n"; }
  }
}
my $date = localtime;
my $date_str = $date->strftime("%B %Y"); # month name year

# print keys for each project to file
open my $html, '>', $opts{'wmifile'}
  or die "Could not write to $opts{'wmifile'}; $!\n";

print $html "#!/usr/bin/env wml
<p>
This page lists <a href='../include/keys.txt'>GPG signing keys of our release
teams</a> as of $date_str.<br/>
To learn how to verify signatures, see <a href=\"<page docs/signing-keys>\">
our manual</a>.
</p>

<ul>
$buffer
</ul>\n";

foreach my $app (@apps) {
  print $html "<h3>$app</h3>\n". $fingerprints{"$app"};
}
close $html;
print "\nWrote $opts{'wmifile'}.\n";

__END__
things to improve:
- migrate keysfile to YAML
- above code has several TODOs
- run script through perltidy: https://metacpan.org/pod/Perl::Tidy - https://metacpan.org/pod/distribution/Perl-Tidy/bin/perltidy
- run it through perl critic, a Perl source code analyzer with policies based on Perl Best Practices (PBP): Perl::Critic::Freenode http://p3rl.org/
