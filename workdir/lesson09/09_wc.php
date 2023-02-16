<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>WC</title>
</head>
<body>
    
    <form action="#" method="post">


        <div>
            Paste text here:
            <textarea name="text" cols="30" rows="10"><?= $_POST['text'] ?></textarea>
        </div>

        <div>
            <label>
                Show lines:
                <input type="checkbox" name="lines" checked>
            </label>
            <label>
                Show words:
                <input type="checkbox" name="words" checked>
            </label>
            <label>
                Show characters:
                <input type="checkbox" name="chars" checked>
            </label>
        </div>

        <div>
            <input type="submit" name="submit" value="submit">
        </div>
 
    </form>
<?php
    if (isset($_POST['submit'])) :

        $text = $_POST['text'];

        $lines = explode ("\n", $text);
        $nr_lines = count($lines);
        $nr_words = 0;
        $nr_chars = 0;

         foreach ($lines as $line) {
            $words = explode(" ", $line);
            $nr_words += count($words);

            foreach ($words as $word) {
                $chars = str_split($word);
                $nr_chars += count($chars);
            }
        }
?>

    <table>
        <?php if(isset($_POST['lines'])):?>
        <tr>
            <th>Lines</th>
            <td><?php echo $nr_lines; ?></td>
        </tr>
        <?php endif ?>

        <?php if(isset($_POST['words'])):?>
        <tr>
            <th>Words</th>
            <td><?php echo $nr_words; ?></td>
        </tr>
        <?php endif ?>

        <?php if(isset($_POST['chars'])):?>
        <tr>
            <th>Characters</th>
            <td><?php echo $nr_chars; ?></td>
        </tr>
        <?php endif ?>
    </table>
<?php endif; ?>

</body>
</html>