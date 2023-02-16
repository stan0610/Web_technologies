<?php

$input = $argv[1];

$nts = str_split($input);

$freq = [];
$total = 0;

# frequency counter
foreach ($nts as $nt) {
    	if (!isset($freq[$nt])) {
    	    	$freq[$nt] = 0;
    		}
    	$freq[$nt]++;
    	$total++;
	}

# statistics
echo "STATS:\n";
foreach ($freq as $nt => $count) {
    echo "\t$nt: $count >". $count/$total * 100 . "%\n";
}

# graph
echo "GRAPH:\n";
foreach ($freq as $nt => $count) {
    $percent = $count / $total *100;
    echo "\t$nt: ";
    for ($counter = 0; $counter < $percent; $counter++) {
    	echo "=";
    }
    echo "\n";
}

?>
