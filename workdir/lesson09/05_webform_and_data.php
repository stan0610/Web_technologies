<!DOCTYPE html>
<html lang="en">
<head>
	<title>Webform</title>
</head>
<body>

	<?php
		if (!isset($_POST['submit'])) {	
	?>
		<form action="#" method="post">
			<label>
				first name: 
				<input type="text" value="" name="firstname">
			</label>
			
			<br>
			<br>

			<label>
				Last name: 
				<input type="text" value="" name="lastname">
			</label>
			
			<br>
			<br>
			
			<label>
				Male: 
				<input type="radio" value="man" name="gender">
				Female: 
				<input type="radio" value="woman" name="gender">
			</label>
			
			<br>
			<br>

			<label>
				Age: 
				<input type="number" value="" name="age">
			</label>
			
			<br>
			<br>

			<label>
				E-mail address: 
				<input type="email" value="" name="email">
			</label>
			
			<br>
			<br>
			
			<label>
				Password:
				<input type="password" value="" name="password">
			</label>
			
			<br>
			<br>
			
			<label>
				I want to receive updates: 
				<input type="checkbox" value="updates will be sent" name="update">
			</label>
			
			<br>
			<br>
			
			<label>
				<input type="Submit" value="Submit" name="submit">
			</label>
			
			<br>
			<br>
		</form>
	
	
	<?php
			}
		else {
		    	echo "<h4>the following data was submitted: </h4>";
		    	foreach ($_POST as $key => $value) {
		    	    	echo $key . ": " . $value . "<br>";
		    		}
		    	echo"<a href=05_webform_and_data.php>RETURN</a>";
			}
	
	?>
</body>
</html>

