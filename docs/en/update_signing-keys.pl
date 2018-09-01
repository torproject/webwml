#!/usr/bin/env perl
use strict;
use warnings;

my $keysfile = "include/keys.txt";
my $wmifile = 'include/keys.wmi';
my $forcekeyupdates = 0;
my $skipkeyupdates = 0;

# First we load the keys, then we create a wmi file which is included by
# https://www.torproject.org/docs/signing-keys.html.en

# Determine the base directory in case we are called from somewhere else.
# We assume to sit in docs/en. Update $root path if this file has moved:
$0 =~ /^(.+)\/[^\/]+$/;
my $root = "$1/../..";
chdir $root or die "Could not enter $root: $! (script path: $0)\n";

open my $kf, '<', "$keysfile" # read keys
  or die "Could not open $keysfile: $!\n";

my %sections; # project => key owners
my %owners; # key owner => string with all keys
my @projects; # save sections in order of appearance
my $section;
foreach (<$kf>) {
  # filters comment and empty lines
  next if ($_ eq "\n");
  if (/^#/) {
  # [section] / project
  } elsif (/^\[(.+)\]$/) {
    $section = "$1";
    $sections{"$section"} = ();
    push (@projects, $section);
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
print "Loaded $keysfile. Found $#owners key owners in $#projects projects.\n";

# If the keysfile did not change since the last run, we will not update them.
# To update all keys anyway, set $forcekeyupdates = 1 above, or comment:
if (-f $wmifile && qx/[ $wmifile -nt $keysfile ]/) {
  $forcekeyupdates or $skipkeyupdates++;
}

open my $out, '>', "$wmifile"
  or die "Could not write to $wmifile; $!\n";
print $out "#!/usr/bin/env wml\n<p>The signing keys we use are:</p>\n<ul>\n";
my %fingerprints;
foreach my $project (@projects) {
  my $owners = '';
  my $suf = 's';
  my @keysinproject;
  # we grab the key owners for each project and iterate over their keys
  foreach my $owner (@{$sections{"$project"}}) { # iterate over owners
    my $keys = $owners{"$owner"};
    # example for $keys: 0x165733EA, 0x8D29319A(signing key)
    my $inbrackets = '';
    $suf = '' if ($owners ne '');
    my @keys = split (',', $keys); 
    foreach my $key (@keys) { # iterate over keys
      # validate key format. all regexp are beautiful.
      if ($key =~ /^\s?(0x[^\(]+)(\(([^\)]+)\))?/) {
        my $key = $1; 
        push (@keysinproject, $key);
        # named alternative key
        if ($2) {
          $inbrackets .= " with its $3 $key";
        # first key
        } elsif ($inbrackets eq '') {
          $inbrackets = "$key";
        # second key
        } else {
          $inbrackets .= " and $key";
        }
      } else { # tell if the format is wrong
        print "Unrecognized key format: $key\n";
      }
    }
    my $sep = ($owners eq '') ? '' : ', ';
    # Add owner to the list
    $owners .= "$sep$owner ($inbrackets)";
    print " - $owner ($inbrackets) [$project]\n";
  }
  if ($project eq 'other') {
    print $out "<li>Other developers include $owners.</li>\n";
  } else {
    $suf = 'ed' if ($project =~ /older/);
    print $out "<li>$owners sign$suf <strong>$project</strong></li>\n";
  }
  my $keyids = join (' ', @keysinproject);
  # update keys form keyserver pool
  if ($forcekeyupdates or not $skipkeyupdates) {
    print "Fetching $keyids from keyserver:\n";
    qx/gpg --recv-key $keyids/;
  }
  # save gpg output for later
  my $str = qx/gpg --list-keys --keyid-format 0xlong --with-fingerprint $keyids/;
  $str =~ s/</&lt;/g; $str =~ s/>/&gt;/g; $str =~ s/@/#/g; # replace html codes
  $fingerprints{"$project"} = "<pre>\n$str</pre>\n";
}

# print keys for each project to file
print $out "</ul>\n<h2>Fingerprints</h2>\n<p>The fingerprints for the keys are:</p>\n";
foreach my $project (@projects) {
  print $out "<h3>$project</h3>\n". $fingerprints{"$project"};
}
close $out; print "Wrote $wmifile.\n"; exit 0;
