<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Multifasta</title>

    <link rel="stylesheet" href="styles.css">
    
</head>
<body>
    
    <?php include("navbar.html") ?>

    <form action="color.php" method="post" enctype="multipart/form-data">

        <div>
            <input type="radio" name="upload-type" value="file">
            Select fasta file:
            <div class="input-wrap">
                <input type="file" name="fasta-file">
            </div>
        </div>

        <div>
            <input type="radio" name="upload-type" value="paste">
            Paste fasta file:
            <div class="input-wrap">
                <textarea name="fasta-paste" cols="30" rows="10"></textarea>
            </div>
        </div>

        <div>
            Pick a color
            <div class="input-wrap">
                A:
                <select name="color_a">
                    <option value="none">No color</option>
                    <option value="red">Red</option>
                    <option value="green">Green</option>
                    <option value="blue">Blue</option>
                    <option value="orange">Orange</option>
                </select>
            </div>
            <div class="input-wrap">
                T:
                <select name="color_t">
                    <option value="none">No color</option>
                    <option value="red">Red</option>
                    <option value="green">Green</option>
                    <option value="blue">Blue</option>
                    <option value="orange">Orange</option>
                </select>
            </div>
            <div class="input-wrap">
                G:
                <select name="color_g">
                    <option value="none">No color</option>
                    <option value="red">Red</option>
                    <option value="green">Green</option>
                    <option value="blue">Blue</option>
                    <option value="orange">Orange</option>
                </select>
            </div>
            <div class="input-wrap">
                C:
                <select name="color_c">
                    <option value="none">No color</option>
                    <option value="red">Red</option>
                    <option value="green">Green</option>
                    <option value="blue">Blue</option>
                    <option value="orange">Orange</option>
                </select>
            </div>
        </div>



        <input type="submit" name="submit" value="submit">

    </form>


</body>
</html>