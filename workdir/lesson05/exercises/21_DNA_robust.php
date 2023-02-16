<?php

$input = $argv[1];

$DNA = str_split($input);
$nr_nts = 0;

$clean_input = "";
$clean_output = "";

$freq = [];

# data processing

	foreach ($DNA as $nt) {
	    	if ($nt == "A" or $nt == "a") { 
				$clean_input .= "A";
				$clean_output .= "T";
				$nr_nts++;
			}
	    	elseif ($nt == "T" or $nt == "t") { 
				$clean_input .= "T";
				$clean_output .= "A";
				$nr_nts++;
			}
	    	elseif ($nt == "G" or $nt == "g") { 
				$clean_input .= "G";
				$clean_output .= "C";
				$nr_nts++;
			}
	    	elseif ($nt == "C" or $nt == "c") { 
				$clean_input .= "C";
				$clean_output .= "G";
				$nr_nts++;
			}
			else {
				if (!isset($freq[$nt])) {
					$freq[$nt] = 0;
				}
				$freq[$nt]++;
			}   			    		
	}

#screen output

	echo $clean_input . "\n";

	for ($pipes=0; $pipes < $nr_nts; $pipes++) { 
		echo "|";
	}

	echo "\n";

	echo $clean_output . "\n\n";

	foreach ($freq as $nt => $count) {
		echo "$nt encountered $count time(s)\n";
	}
?>
