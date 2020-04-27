<?php
##############################################################
#
# Check if a Triangle is a right-angled Triange
#
# A function that takes 3 numbers (lengths of Triangle sides)
# function returns true if a right-angled triangle
#
##############################################################

function isRightAngleTriange($a,$b,$c)
{

  // add values to array
  $sides=[$a,$b,$c];
  // sort array ascending
  sort($sides);

  // create squared value vars
  $aSq=pow($sides[0],2);
  $bSq=pow($sides[1],2);
  $cSq=pow($sides[2],2);

  // check if (a2 + b2) = c2
  if ( ($aSq+$bSq) === $cSq ) 
  {
    return true;
    //return 'It\'s a Right-angle Triange!<br/>';
  }
  else
  {
    return false;
    //return 'It\'s NOT a Right-angle Triange!<br/>';
  }

}

### Test Cases ###
//echo isRightAngleTriange(13,12,5) ? 'true' : 'false'; // returns true
//echo isRightAngleTriange(26,10,24) ? 'true' : 'false'; // returns true
//echo isRightAngleTriange(85,84,13) ? 'true' : 'false'; // returns true
//echo isRightAngleTriange(4,6,5) ? 'true' : 'false'; // returns false
//echo isRightAngleTriange(6,9,8) ? 'true' : 'false'; // returns false
//echo isRightAngleTriange(3,7,5) ? 'true' : 'false'; // returns false

?>
