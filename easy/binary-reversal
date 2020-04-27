<?php
#############################
#
# Binary Reversal
#
# Have the function BinaryReversal(str) take the str parameter
# being passed, which will be a positive integer, take its binary
# representation (padded to the nearest N * 8 bits), reverse that
# string of bits, and then finally return the new reversed string
# in decimal form. For example: if str is "47" then the binary
# version of this integer is 101111 but we pad it to be 00101111.
# Your program should reverse this binary string which then
# becomes: 11110100 and then finally return the decimal version
# of this string, which is 244.
#
# https://coderbyte.com/editor/Binary%20Reversal:PHP
#
##############################

function BinaryReversal($str) {
    
    // convert to binary
    $str = decbin($str);

    // cast as string
    $str = strval($str);

    // reverse $str
    $str = strrev($str);

    // check if binary number is divisible by 8
    if ( (strlen($str) % 8) != 0 )
    {
      // keep adding zeros until divisble by 8
      while ( (strlen($str) % 8) != 0 )
      {
        $str = $str."0";
      }
    }

    // return decimal value 
    $str = bindec($str);

    // return value!
    return $str;

}

?>
