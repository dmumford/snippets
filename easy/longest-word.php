<?php
#############################
#
# Longest Word
#
# Have the function LongestWord(sen) take the sen parameter
# being passed and return the largest word in the string.
# If there are two or more words that are the same length,
# return the first word from the string with that length.
# Ignore punctuation and assume sen will not be empty.
#
# https://coderbyte.com/editor/Longest%20Word:PHP
#
##############################

function LongestWord($sen) {

  // split str into substrings
  $sub = explode(" ", $sen);

  // substring lengths, matches order of $sub
  $lengths = [];

  // loop through array of substrings
  foreach ($sub as $s)
  {
    // add substring lengths to $lengths
    array_push($lengths, strlen($s));
  }

  // find largest index in $lengths array
  $largest = array_keys($lengths, max($lengths));

  // match to index of $sub to find corresponding substring
  $result = $sub[$largest[0]];
  
  return $result;

}

?>
