<?php
    $base=$_POST['base'] ?? 10;
    
    $char=$_POST['char'] ?? '*';
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"> 
    <title>Dynamic triangle</title>
</head>
<body>

    <form action="#" method="post">
		<div>
            Base size
            <input type="number" value="<?= $base ?>" name="base">
        </div>
		
        <div>
            Character
            <input type="text" value="<?= $char ?>" name="char">
        </div>

        <div>
            <input type="submit" value="submit" name="submit">
        </div>
			
	</form>

    <?php
        if (isset($_POST['submit'])) {
            echo "<hr>";
            
            for($row=1; $row <= $base; $row++) {
                for($sym=0; $sym < $row; $sym++) {
                    echo $char;
                }
                echo"<br>";
            }

        }
    ?>



</body>
</html>