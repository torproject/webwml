#!/usr/bin/env perl
# Returns html rows based on csv lines
use strict;
use warnings;
use Time::Piece;
#use HTML::Escape qw/escape_html/;

my %pub; # save all publications

sub parse_line {
  my $str = shift;
  if ($str =~ /(\d+\/\d+\/\d+),([^,]+),(.+),(.+)/) { # magic regex :)
      my $time = Time::Piece->strptime($1, "%m/%d/%y"); # given format: MM/DD/YY
      my $date = $time->strftime("%Y %b %d");
      chomp(my $source = $2);
      $pub{$time->epoch} = "<tr>\n<td>$date</td>\n<td>$source</td>\n<td><a href='$4'>\n$3</a></td>\n</tr>\n\n";
  }
}

unless (@ARGV) { print "Usage: $0 /path/to/csv/file > file\n"; exit 1; }

# parse all arguments (hopefully existing files)
foreach my $arg (@ARGV) {
  chomp($arg);
  if (-f $arg) {
    # we are lucky, this looks like a file
    open my $fh, '<', $arg
      or warn "Can't open '$arg': $!\n" and next;
    foreach (<$fh>) {
      parse_line $_;
    }
    close $fh;
  } else {
    # this is no file, let's assume we got piped a string to parse
    parse_line $arg;
  }
}

# share our treasure with the world
my $str = join '', map { $pub{$_} } reverse sort keys %pub;
if ($str) { print $str; }
else { print "Nothing found.\n"; exit 1; }
# TODO one day i want to able to update press/en/press.wml directly
