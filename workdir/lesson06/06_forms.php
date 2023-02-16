<?php

$firstname = $_GET['firstname'] ?? "enter value";

?>



<!DOCTYPE html>
<html lang="en">
<head>
	<title>Forms</title>
</head>
<body>
	
	<h5>Let's talk about forms...</h5>
	
	<!-- <form action="06_forms_submit.php" method="GET"> -->
	<form action="#" method="GET">	
		
		Firstname:
		<input type="text" name="firstname" value = "<?php echo "$firstname"; ?>">
	
	</form>
	
<pre>	
<?php
	if( isset($_GET['firstname']) ) {
		print_r ($_GET);
		print_r ($_POST);
		print_r ($_REQUEST);
		//print_r ($_FILES);
		
		echo "the firstname is: $_GET[firstname]\n";
	}
?>
</pre>
	
	
	
</body>
</html>
