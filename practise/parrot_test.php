<?php
$sentence = $_POST['sentence']. " " . $_POST['word'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    
    <!-- data input -->
    <form action="#" method="post">
        Enter a word:
        <input type="text" name="word">
        <input type="hidden" name="sentence" value="<?= $sentence ?>">
        <input type="submit" name="submit" value="submit">
    </form>


    <!-- data processing -->
    <?php 

        $word = $_POST['word'];

        if (isset($_POST['submit'])) {
            echo "<div>";
            echo "last word was: ". $word;
            echo "</div>";

            echo "<div>";
            echo "the complete sentence is: " . $sentence;
            echo "</div>";
        }

    ?>

</body>
</html>