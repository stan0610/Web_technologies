<?php

$counter = 0;
$num = $argv[1];

while ($counter <= $argv[1]) {
	for ($space = $argv[1]; $space > $counter; $space--) {
	    	echo " ";
		}
    	for ($stars = 0; $stars < $counter ; $stars++) {
		echo "*";
    		}
    	for ($stars2 = 0; $stars2 < $counter ; $stars2++) {
		echo "*";
    		}
    	$counter ++;
    	echo "\n";
	}



?>
