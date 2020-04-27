<?php
#############################################################################
#
# This function is just for fun!
#
# Some people say that the youngest appropiate age you can date is equal to 
# half your age + 7
#
# Here is a function which takes the argument 'age' and returns the youngest 
# socially-acceptable age you can have a date with.
#
# (Novelty use only)
#
#############################################################################

function youngestDate($age)
{
  if ($age<21)
  {
    return "Error: calculation only works with input age >= 21!";
  }
  else
  {
    return ceil( ($age/2)+7 );
  }
}

?>
