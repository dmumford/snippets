<?php
##############################################################
#
# Check if string is a Palindrome
#
##############################################################

function isPalindrome($str)
{

  $forward = str_split($str);
  $reversed = array_reverse($forward);

  if ( $forward === $reversed )
  {
    return true;
  }
  else
  {
    return false;
  }

}

### Test Cases ###
//echo isPalindrome("fresrfe") ? 'true' : 'false'; // returns false
//echo isPalindrome("abba") ? 'true' : 'false'; // returns true
//echo isPalindrome("wolflow") ? 'true' : 'false'; // returns true
//echo isPalindrome("Hello world!") ? 'true' : 'false'; // returns false

?>
