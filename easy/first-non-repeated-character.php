<?php
#############################
#
# Q4. How do you print the first non-repeated character from a string?
#
# https://codeburst.io/100-coding-interview-questions-for-programmers-b1cf74885fb7
#
#############################

function firstUniqueChar($str)
{
    // check if $str is not empty
    if ( strlen($str) > 0 )
    {
        // create array of $str chars
        $strArr = str_split($str);

        // array of char counts
        $counts = array_count_values($strArr);

        // search for first count that is 1
        return array_search(1,$counts);

    }
    else
    {
        
        // if string empty return warning msg
        return "String is empty!";         
    }
    
}

?>
