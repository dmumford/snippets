<?php

// Every 4-digit combination
function pinCodes($print=true) {
    $n = 0;
    
    // declare empty array
    $pinCodes = [];
    
    while ( $n <= 9999 ) {
        // add leading zeros if number < 4 digits
        $formatted_n = str_pad($n, 4, '0', STR_PAD_LEFT);
        
        // add combination to array
        array_push($pinCodes, $formatted_n);
        
        $n++;
    }
    
    if ($print) {
        // echo each combination
        foreach ($pinCodes as $code) {
            echo $code."<br/>";
        }
    }
    else {
        return $pinCodes;
    }
    
}
// test function
pinCodes();

?>
