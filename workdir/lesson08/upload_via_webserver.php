<!DOCTYPE html>
<html lang="en">
<head>
	<title>Upload a FILE</title>
</head>
<body>
	
	<form action="#" method="post" enctype="multipart/form-data">
		
		<input type="file" name="our_file_to_upload" value="">
		<input type="file" name="file_upload_2" value="">
		
		<input class="submit" type="submit" value="submit" name="">
		

	</form>
	

<pre>	
<?php

	print_r($_GET);
	print_r($_POST);
	# with (enctype="multipart/form-data") everything is stored in the $_FILES
	print_r($_FILES);
	
	# get file information in a string
	echo file_get_contents($_FILES['our_file_to_upload']['tmp_name']);
	
	# get file information in an array
	print_r( file($_FILES['file_upload_2']['tmp_name']));

	
?>
</pre>	
	
</body>
</html>
