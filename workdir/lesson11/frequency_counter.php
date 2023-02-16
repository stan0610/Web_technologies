<?php

$input= "ATGCCCGGATACGTCTGAGT";

$freq=[];

// seperate nucleotides
$nts= str_split($input);

foreach ($nts as $nt){
   if (!isset($freq[$nt])){
        $freq[$nt]=0;
    }
    $freq[$nt]++; 
}

echo "<pre>";
print_r($freq);
echo"</pre>";

?>