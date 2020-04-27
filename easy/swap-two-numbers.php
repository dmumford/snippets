<?php
#############################
#
# Q12. How do you swap two numbers without using the third variable?
# https://codeburst.io/100-coding-interview-questions-for-programmers-b1cf74885fb7
#
#############################

function swapNums($a,$b)
{
    // echo inputted values
    echo "Input: a=$a  b=$b<br/>";

    // make $a array with both values
    $a=[$a,$b];

    // change $b value to $a
     $b = $a[0];
    // change $a value to $b
    $a = $a[1];

    // echo outputted values
    echo "Output: a=$a  b=$b<br/><br/>";
}

?>
