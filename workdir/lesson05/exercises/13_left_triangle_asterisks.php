<?php

$counter = 0;
$num = $argv[1];

while ($counter <= $num) {
    	for ($asterisk = 0; $asterisk < $counter ; $asterisk++) {
		echo "*";
    		}
    	
    	$counter ++;
    	echo "\n";
	}

?>
