<?php

$array = $argv;
array_shift($array);
$count = count($array);
$freq =[];

echo  "The numbers received:" . "\n";

foreach ($array as $key => $argv) {
    	    	echo "number $key: $argv \n";
    		}


echo "\nSmallest number: " . min($array) . "\n";
echo "Avg: " . array_sum($array)/count($array) . "\n";
echo "Largest number: ". max($array) . "\n";
echo "Number of numbers: " .$count. "\n";
echo "Number occurences" . "\n";

foreach ($array as $key => $item) {
    	if ( !isset($freq[$item])) {
    	    	$freq[$item] = 0;
    		}
	$freq[$item]++;
	}

foreach ($freq as $item => $number) {
    	echo "\t" . $item . " -> " . $number . "\n";
	}

echo "\nThe numbers in reverse order:\n";

$reverse = array_reverse($array);

foreach ($reverse as $key => $argv) {
    	    	echo "number $key: $argv \n";
		}

$sorted = asort($array);
echo "\n$sorted\n";

















?>
