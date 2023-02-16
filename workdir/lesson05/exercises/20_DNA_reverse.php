<?php

$input = $argv[1];
$DNA = str_split($input);


echo "orig.: " . $input . "\n";

echo "comp.: ";
	foreach ($DNA as $nt) {
	    	if ($nt == "A") { echo "T"; }
	    	elseif ($nt == "T") { echo "A";	}
	    	elseif ($nt == "G") { echo "C"; }
	    	elseif ($nt == "C") { echo "G"; }	    			    		
	}

echo "\n";

?>
