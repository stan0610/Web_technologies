<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    
    <form action="#" method="post">
        <div>
            Name:
            <input type="text" name="name">
        </div>

        <div>
            Age:
            <input type="number" name="age">
        </div>

        <div>
            <input type="submit" name="submit" value="submit">
        </div>
    </form>

<?php

    if (isset($_POST['submit'])){
        echo "<hr>";

        $name = $_POST['name'];
        $age = $_POST['age'];

        if ($age >= 21) {
            echo "<div>";
                echo "Welcome $name";
            echo "</div>";
        }
        else {
            echo "<div>";
                echo "Sorry $name, try again in ". 21-$age ." years";
            echo "</div>";
        }
    }

?>

</body>
</html>