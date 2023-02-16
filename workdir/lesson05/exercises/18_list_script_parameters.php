<?php

$array = $argv;
$count = count($array)-1;
array_shift($array);

echo  $count . " parameters provided:" . "\n";

foreach ($array as $key => $argv) {
	echo "\t Position $key: $argv \n";
	}
	
?>
