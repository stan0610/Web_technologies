<?php

// LONG WAY

//$file_handle=  fopen('fasta.txt', 'r'); 

//$size = filesize('fasta.txt');

//echo fread($file_handle, $size);

//fclose($file_handle);




// SHORT WAY

//echo file_get_contents ("fasta.txt");




// ITERATE THE LINES (EACH LINE IN THE FILE IS AN ITEM IN AN ARRAY)	

$blob = file_get_contents ("fasta.txt");

$lines = explode ("\n", $blob);

$lines = file("fasta.txt");

print_r($lines);

foreach ($lines as $line) {
    	$line = trim($line);
    	echo ">>>$line<<<\n";
	}	





// edit files
//long way

$fhw = fopen("file2.txt","w");
// w = overwrite content ==> a = append (add)
fwrite ($fhw, "content");
fclose($fhw);


// short way
// third parameter would be FILE_APPEND
file_put_contents("file3.txt","content for file3\n");


//remove a file ==> unlink('file2.txt');
//create a file ==> touch ('new_file.txt');
//rename a file ==> rename ('new_file.txt','file4.txt');
//make directory ==> mkdir("dir");
//remove empty directory ==> rmdir("dir");


?>
