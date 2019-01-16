#!/usr/bin/env perl
# Returns html rows based on csv lines
# Usage: /path/to/script /path/to/csv/file > file
use strict;
use warnings;
#use HTML::Escape qw/escape_html/;

my $str; # append all strings here

sub print_rows {
  my $string = shift;

  # define where to output to:
  #  1) STDOUT
  print "$string";

  #  2) press.html
  #open my $out, '>>', 'press.html';
  #print $out $string;
  #  3) escaped htmlfile (install module above: cpan -i HTML::Escape
  #print $out escape_html($string);
  #close $out;
}
sub add_row {
  $str .= shift;
}
sub parse_line {
  my $str = shift;
  if ($str =~ /(\d+\/\d+\/\d+),([^,]+),(.+),(.+)/) { # magic regex :)
      chomp(my $date = qx/LANG=en_US.UTF-8 date -d "$1" "+%Y %B %d"/);
      chomp(my $source = $2);
      my $name = $3;
      my $url = $4;
      my $string = "
<tr>
<td>$date</td>
<td>$source</td>
<td><a href=\"$url\">$name</a></td>
</tr>
";
    add_row $string;
  }
}

foreach my $arg (@ARGV) {
  chomp($arg);
  if (-f $arg) {
    open my $fh, '<', $arg
      or warn "Can't open '$arg': $!\n" and next;
    foreach (<$fh>) {
      parse_line $_;
    }
    close $fh;
  } else {
    parse_line $arg;
  }
}
if ($str) { print_rows $str; }
else { print "Nothing found.\n"; exit 1; }
