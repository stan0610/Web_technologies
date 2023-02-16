<?php

$num = $argv[1];

if ($num == 9){
	echo "this number is equal to 9\n";
	}
	elseif ($num < 9) {
		echo "this number is smaller than 9\n";
		}
	elseif ($num > 9) {
		echo "this number is bigger than 9\n";
		}

// BONUS
if ($num % 9 == 0) {
	echo "$num can be devided by 9\n";
	}

		
?>
