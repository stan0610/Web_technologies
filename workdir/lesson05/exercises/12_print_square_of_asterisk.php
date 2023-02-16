<?php

$width = $argv[1] ?? 10;
$height = $argv[2] ?? 10;

echo "let's create a square of $width by $height\n";


for ($rows = 0; $rows < $height; $rows++) {
    
	for ($count = 0; $count < $width; $count++) {
		echo "*";
		}
	echo "\n";
	}	
	
?>
