<!DOCTYPE html>
<html lang="en">
<head>
	<title>File print</title>
</head>
<body>
	
	<form action="#" method="post" enctype="multipart/form-data">
		<input type="file" name="file" value="">
		<input type="submit" name="Submit" value="SUBMIT">
	</form>
	
	
		<?php
			$content = file_get_contents($_FILES['file']['tmp_name']);
			if (isset($content)) {
				echo "<pre>";
					echo $content;
				echo "</pre>";
				}
			
		?>
	
	
</body>
</html>
