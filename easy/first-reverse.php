<?php
#############################
#
# First Reverse
#
# Have the function FirstReverse(str) take the str parameter being passed
# and return the string in reversed order. For example: if the input string
# is "Hello World and Coders" then your program should return the string
# sredoC dna dlroW olleH.
#
# https://coderbyte.com/editor/First%20Reverse:PHP
#
##############################

function FirstReverse($str) {

  // create array of chars in $str
  $str = str_split($str);

  // reverse array order
  $str = array_reverse($str);

  // join array elements as string
  $str = join($str);

  // return result!
  return $str;

}


?php
