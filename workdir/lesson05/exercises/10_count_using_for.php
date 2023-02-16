<?php


if ($argv[1] == "up") {
	for ($counter = $argv[2]; $counter < $argv[3]; $counter++) {
    		echo "$counter\n";
		}
	}
	
	
if ($argv[1] == "down") {
	for ($counter = $argv[2]; $counter > $argv[3]; $counter--) {
    		echo "$counter\n";
		}
	}	

?>
