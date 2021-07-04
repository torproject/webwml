#!/usr/bin/env perl
use strict;
use warnings;
use File::Temp qw/tempdir/; # https://metacpan.org/pod/File::Temp

# This script automatically updates the .wmi file with gpg as per:
my $keysfile = "include/keys.txt";
my $wmifile = 'include/keys.wmi';
my $fpfile = 'include/subkey_fingerprints.wmi';
my $forcekeyupdates = 0;
my $skipkeyupdates = 0;

# First we load the keys, then we create a wmi file which is included by
# https://www.torproject.org/docs/signing-keys.html.en

# Determine the base directory in case we are called from somewhere else.
# We assume to sit in docs/en. Update $root path if this file has moved:
$0 =~ /^(.+)\/[^\/]+$/;
my $root = "$1/../..";
chdir $root or die "Could not enter $root: $! (script path: $0)\n";

my $gpghomedir = tempdir(CLEANUP => 1, chmod => 0700);

open my $kf, '<', "$keysfile" # read keys
  or die "Could not open $keysfile: $!\n";

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
    $owners{"$owner"} = "$keys";
  # tell about unrecognized lines
  } else { print "Ignored line: $_\n"; }
}
close $kf;
my @owners = keys %owners;
print "Loaded $keysfile. Found $#owners key owners for $#apps applications.\n";

# If the keysfile did not change since the last run, we will not update them.
# To update all keys anyway, set $forcekeyupdates = 1 above, or comment:
if (-f $wmifile && qx/[ $wmifile -nt $keysfile ]/) {
  $forcekeyupdates or $skipkeyupdates++;
}

my $buffer = ''; # project overview string
my %fingerprints;
foreach my $app (@apps) {
  print "\nUpdating keys for '$app':\n";
  my ($keys, $subkey_fingerprints, $owners, $suf) = ('', '', '', 's');
  my @keysforapp;
  # we grab the key owners for each project and iterate over their keys
  foreach my $owner (@{$sections{"$app"}}) { # iterate over owners
    my $keys = $owners{"$owner"};
    # example for $keys: 0x165733EA, 0x8D29319A(signing key)
    my ($inbrackets, $inbrackets_html) = ('', '');
    $suf = '' if ($owners ne '');
    my @keys = split (',', $keys); 
    foreach my $key (@keys) { # iterate over keys
      # validate key format. all regexp are beautiful.
      if ($key =~ /^\s?(0x[^\(]+)(\(([^\)]+)\))?/) {
        my $key = $1; 
        my $keylink = "<a href='https://pgp.mit.edu/pks/lookup?search=$key&op=vindex&exact=on'>$key</a>";
        push (@keysforapp, $key);
        # named alternative key
        if ($2) {
          $inbrackets .= " with its $3 $key";
        # first key
        } elsif ($inbrackets eq '') {
          $inbrackets = "$key";
          $inbrackets_html = "$keylink";
        # second key
        } else {
          $inbrackets = " and $key";
          $inbrackets_html .= " and $keylink";
        }
      } else { # tell if the format is wrong
        print "Unrecognized key format: $key\n";
      }
    }
    my $sep = ($owners eq '') ? '' : ', ';
    # Add owner to the list
    $owners .= "$sep$owner ($inbrackets_html)";
    print " - $owner ($inbrackets)\n";
  }
  if ($app eq 'other') {
    $buffer .= "<li>Other developers include $owners.</li>\n";
  } else {
    $suf = 'ed' if ($app =~ /older/);
    $buffer .= "<li>$owners sign$suf <strong>$app</strong></li>\n";
  }

  # we update collected keys for this application and create a string of them
  my $gpgcmd = "gpg2 --homedir $gpghomedir ";
  my $gpgoptions = "--keyid-format 0xlong --fingerprint --with-subkey-fingerprints";
  foreach my $key (@keysforapp) {
    # update keys
    if ($forcekeyupdates or not $skipkeyupdates) {
      print "\nFetching $key\n";
      my $gpgresult;
      do { $gpgresult = system "$gpgcmd --recv-key $key"; sleep 1; }
      while ($gpgresult != 0);
    }

    # add output to key string
    my $str = qx/$gpgcmd $gpgoptions $key/;
    # replace html codes
    $str =~ s/</&lt;/g; $str =~ s/>/&gt;/g; $str =~ s/@/#/g; $str =~ s/@/&at;/g;
    $keys .= "$str";
  }
  # save formatted string for project
  $fingerprints{"$app"} = "<pre>\n$keys</pre>\n";

  if ($app eq "Tor Browser releases") {
    my $owner = "The Tor Browser Developers";
    die "Did not findTor Browser signing key.\n" if ($owners{$owner} eq '');
    # save Tor Browser signing key subkey fingerprints to $fpfile
    my @fp = qx/$gpgcmd $gpgoptions $owners{$owner}|grep "Key fingerprint"/;
    shift @fp; # remove primary key fingerprint
    $subkey_fingerprints .= join ('', map { s/^\s+Key fingerprint = //; "$_" } @fp);
    if (open my $fpout, '>', "$fpfile.temp") {
      print $fpout "#!/usr/bin/env wml\n$subkey_fingerprints";
      close $fpout;
      # check that the written file is not empty
      my $written_lines = qx/wc -l "$fpfile.temp"|wc -l/;
      if ($written_lines gt 0) {
        rename "$fpfile.temp", "$fpfile" and
          print "\nWrote following subkey fingerprints to $fpfile:\n$subkey_fingerprints"
          or die "Could not overwrite $fpfile: $!\n";
      } else { die "Created $fpfile.temp but it is empty.\n"; }
    } else { die "Could not create temporary file $fpfile.temp.\n"; }
  }
}
my @date = localtime;
my $date = "$date[4]/$date[5]"; # Month/Year

# print keys for each project to file
open my $html, '>', "$wmifile"
  or die "Could not write to $wmifile; $!\n";

print $html "#!/usr/bin/env wml
<p>
This page was automatically generated page from
<a href='/include/keys.txt'>this file listing the gpg keys of our release teams</a>.
To learn how to verify signatures, see <a href=\"<page docs/signing-keys>\">
our manual</a>.
</p>
<p>
As of $date the signing keys we use are:
</p>

<ul>
$buffer
</ul>
<h2>Fingerprints</h2>\n<p>The fingerprints for the keys are:</p>\n";

foreach my $app (@apps) {
  print $html "<h3>$app</h3>\n". $fingerprints{"$app"};
}
close $html;
print "\nWrote $wmifile.\n";
