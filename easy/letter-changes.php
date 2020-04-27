<?php
#############################
#
# Letter Changes
#
# Have the function LetterChanges(str) take the str parameter being passed and modify
# it using the following algorithm. Replace every letter in the string with the letter
# following it in the alphabet (ie. c becomes d, z becomes a). Then capitalize every
# vowel in this new string (a, e, i, o, u) and finally return this modified string.
#
# https://coderbyte.com/editor/Letter%20Changes:PHP
#
##############################

function LetterChanges($str) {

 // make str lowercase
  $str = strtolower($str);

  // array of alphabet and what values to change to
  $alphabet = array ('a'=>'b','b'=>'c','c'=>'d','d'=>'E','e'=>'f','f'=>'g','g'=>'h',
                    'h'=>'I','i'=>'j','j'=>'k','k'=>'l','l'=>'m','m'=>'n','n'=>'O',
                    'o'=>'p','p'=>'q','q'=>'r','r'=>'s','s'=>'t','t'=>'U','u'=>'v',
                    'v'=>'y','w'=>'x','x'=>'y','y'=>'z','z'=>'A');
  
  // change chars in string to corresponding alphabet value
  $str = strtr($str, $alphabet);

  // return result!
  return $str;

}

?>
