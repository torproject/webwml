#!/usr/bin/env perl
# Returns html rows based on csv lines
use strict;
use warnings;
use Time::Piece;
#use HTML::Escape qw/escape_html/;

my %pub; # save all publications
my $debug = 0;

sub debug {
  my $msg = shift;
  print "$msg\n" if $debug;
}
sub parse_line {
  my $str = shift;
  debug "Parsing:\n$str";
  if ($str =~ /(\d+\/\d+\/\d+),([^,]+),(.+),(.+)/) { # magic regex :)
      my $time = Time::Piece->strptime($1, "%m/%d/%y"); # given format: MM/DD/YY
      my $date = $time->strftime("%Y %b %d");
      chomp(my $source = $2);
      $pub{$time->epoch} .= "<tr>\n<td>$date</td>\n<td>$source</td>\n<td><a href='$4'>\n$3</a></td>\n</tr>\n\n";
      # TODO use uniqe keys to avoid .=
      debug "Added: $pub{$time->epoch}"
  }
}

unless (@ARGV) { print "Usage: $0 [-d] /path/to/csv/file > file\n"; exit 1; }

# parse all arguments (hopefully existing files)
foreach my $arg (@ARGV) {
  chomp($arg);
  debug "arg: $arg";
  if ($arg eq '-d') {
    $debug++;
    debug "Enabling debug output on request."
  } elsif (-f "$arg") {
    debug 'argument looks like a file.';
    open my $fh, '<', $arg
      or die "Can't open '$arg': $!\n";
    debug "Reading $arg.";
    foreach (<$fh>) {
      # https://stackoverflow.com/questions/6373888/converting-newline-formatting-from-mac-to-windows
      foreach my $line (split '\r', $_) {
        parse_line $line;
      }
    }
    close $fh; debug "Finished reading $arg."
  } else {
    debug 'argument is no file, assuming piped string.';
    parse_line $arg;
  }
}

my $str = join '', map { $pub{$_} } reverse sort keys %pub;
debug "Generated final html string (". (scalar keys %pub) ." entries):";
if ($str) { print "$str\nAdd above to press/en/press.wml.\n"; }
else { print "Nothing found.\n"; exit 1; }
