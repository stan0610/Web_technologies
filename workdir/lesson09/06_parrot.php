<!DOCTYPE html>
<html lang="en">
<head>
	<title>Parrot</title>
</head>
<body>
	

	<?php
	
		$sentence = $_POST['sentence'] . ' ' . $_POST['word'];
	
	?>
	
	<form action="#" method="post">
		Enter a word:
		<input type="text" value="" name="word">
		<input type="submit" value="submit" name="submit">
		<input type="hidden" name="sentence" value="<?php echo $sentence ?>">
	
	
	
	
	</form>
	
	<?php
		$word = $_POST['word'];
		
		echo "<div>";
		echo "Curent word is: $word";
		echo "</div>";

		echo "<div>";
		echo "The sentence is: $sentence";
		echo "</div>";
			
	?>
	
	
	
	
</body>
</html>
