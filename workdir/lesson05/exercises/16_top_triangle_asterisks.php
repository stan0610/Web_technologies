<?php


$counter = 0;
$num = $argv[1];

// TOP

while ($counter <= $num) {
    	for ($asterisk = $argv[1]; $asterisk != $counter; $asterisk--) {
    	    	echo "*";
    		}
    	
    	$counter ++;
    	echo "\n";
	}



// BOTTOM
$counter2 = 0;
$num2 = $argv[1];

while ($counter2 <= $num2) {
	for ($space = 0; $space < $counter2; $space++) {
	    	echo " ";
		}
    	for ($asterisk2 = $argv[1]; $asterisk2 != $counter2; $asterisk2--) {
    	    	echo "*";
    		}
    	
    	$counter2 ++;
    	echo "\n";
	}


// MIDDLE
$counter3 = 0;
$num3 = $argv[1];

while ($counter3 <= $num3) {
	for ($space = 0; $space < $counter3/2; $space++) {
	    	echo " ";
		}
    	for ($asterisk3 = $argv[1]; $asterisk3 != $counter3; $asterisk3 = $asterisk3 -1) {
    	    	echo "*";
    		}

    	$counter3 = $counter3 +2;
    	echo "\n";
	}


?>
