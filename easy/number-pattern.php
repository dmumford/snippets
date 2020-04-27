<?php
#############################################################################
#
# Q9. -Write a program for this pattern(number pyramid) ?
# 1
# 22
# 333
# 4444
# 55555
#
# https://phpgurukul.com/php-programming-logical-interview-questions-answers/
#
# NOTE
# Function allows you to specify what level to print to
#
#############################################################################

function number_pyramid($n)
{
  $x = 1;
  while( $x < ($n+1) )
  {
    echo str_repeat("$x", $x).'<br/>';
    $x++;
  }
}

?>
