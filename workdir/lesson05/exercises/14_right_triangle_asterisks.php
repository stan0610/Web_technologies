<?php

$counter = 0;

while ($counter <= $argv[1]) {
	for ($space = $argv[1]; $space > $counter; $space--) {
	    	echo " ";
	}
    	for ($asterisk = 0; $asterisk < $counter ; $asterisk++) {
		echo "*";
    	}
    	
    $counter ++;
    echo "\n";
}

?>
