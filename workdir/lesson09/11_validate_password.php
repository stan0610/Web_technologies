<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>validate password</title>
</head>
<body>
    
<?php if (!isset($_POST['submit'])): ?>
    
    <form action="#" method="post">

        <div>
            enter password
            <input type="password" name="pass" value="">
        </div>

        <div>
            confirm password 
            <input type="password" name="conf" value="">
        </div>

        <div> 
            <input type="submit" name="submit" value="submit">
        </div>
    </form>

    <?php
    
else:
    $pass = $_POST['pass'];
    $conf = $_POST['conf'];

    if ($pass != $conf) {
         echo "Passwords are not equal,";
    }
    elseif (strlen($pass)<8) {
        echo "Password is too short";
    }
    else {
        echo "Good password!";
    }

endif;

    ?>

</body>
</html>