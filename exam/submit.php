<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Submit - DNA visualiser</title>

    <link rel="stylesheet" href="styles.css">

</head>
<body>
<?php include("navbar.html") ?>  

<div class="title">
    Submit some (multi)Fasta to visualise
</div>

<div class="maincontent">
<form action="visualise.php" method="post" enctype="multipart/form-data">

    <!-- INPUT -->
    <br>
    <div class="head">Input:</div>
    <div>
        <label>
            <input type="radio" name="upload-type" value="file">
            Upload a (multi)fasta file:
        </label>
        <div class="input">
            <input type="file" name="fasta-file">
        </div>
    </div>

    <div>
        <label>
            <input type="radio" name="upload-type" value="paste">
            Paste some (multi)fasta sequences:
        </label>
        <div class="input">
            <textarea name="fasta-paste"></textarea>
        </div>
    </div>

    <!-- OUTPUT -->
    <br>
    <div class="head">Output:</div>
    please specify the number of nucleotides that should be printed per line:
    <div>
        <input type="number" name="ntsperline" value="72">
    </div>

    <div>
        <input type="checkbox" name="groupnts">
        Group nucleotides by 12.
    </div>

    <!-- COLORS -->
    <br>
    <div class="head">Colors:</div>

    <div>
        <input type="checkbox" name="colornts">
        All nucleotides should receive a different background color
    </div>

    <!-- RNA -->
    <br>
    <div class="head">RNA</div>

    <div>
        <input type="checkbox" name="rna">
        The sequence should be transcribed to RNA
    </div>

    <!-- ERRORS -->
    <br>
    <div class="head">Errors</div>

    <div>
        <label>
            <input type="radio" name="invalidnts" value="remove">
            Remove the invalid nucleotides from the output.
        </label>
    </div>
    <div>
        <label>
            <input type="radio" name="invalidnts" value="highlight">
            Highlight the invalid nucleotides.
        </label>
    </div>

    <!-- SUBMIT -->
    <br>
    <input type="submit" name="submit" value="Visualise Sequences">

    </form>
</div>

<?php include("navbar.html") ?>
</body>
</html>