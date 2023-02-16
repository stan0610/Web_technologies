<!DOCTYPE html>
<html lang="en">
<head>
	<title>lists in php</title>
</head>
<body>
	

	<ol>
	<?php
		$dish=["Frikandon","Stoofvlees","Pizza"];
		foreach ($dish as $dishes) {echo "<li>$dishes</li>";}	
	?>
	</ol>
	

	<ul>
	<?php
		$hobbies=["KSA","Cycling","F1 kijken"];
			
		foreach ($hobbies as $hobby) {echo "<li>$hobby</li>";}	
	?>
	</ul>


</body>
</html>
