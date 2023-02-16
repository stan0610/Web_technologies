<?php

if ($argv[1] == "up"){
	while ($argv[2]<$argv[3]) {
		echo "$argv[2]\n";
		$argv[2] ++;
		}
	}
elseif ($argv[1] == "down"){
	while ($argv[2]>$argv[3]) {
		echo "$argv[2]\n";
		$argv[2] --;
		}
	}

?>
