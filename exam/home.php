<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome - DNA visualiser</title>

    <link rel="stylesheet" href="styles.css">

</head>
<body>
<?php include("navbar.html") ?>    

<!-- TITLE -->
<div class="title">
    Welcome to the DNA visualiser
</div>

<!-- MAIN CONTENT -->
<div class="maincontent">
    
    <span class="homepage">
        <span>
        This application ingest multifasta DNA sequences and displays the nucleotides nicely formatted.
        </span>

        <br><br>
            The user can upload multifasta sequences in two ways:
        <ol>
            <li>Upload a multifasta file.</li>
            <li>Paste multifasta sequences in the provided input field.</li>
        </ol>
            The user is in control of the output and can define:
        <ol>
            <li>the number of nucleotides allowed per line</li>
            <li>if nucleotides should be grouped by 12</li>
            <li>if all nucleotides should receive a different background color.</li>
        </ol>
            The application is also able to output RNA instead of DNA.
            Invalid input - nucleotides different from ATGC – is also handled. The options are:
        <ul>
            <li>Highlight the invalid nucleotides</li>
            <li>Remove the nucleotides from the generated output</li>
        </ul> 

        But enough talk,
        <a href="submit.php">let's generate some complements!</a>
        
    </span>
    <img src="screenshot.png" alt="image not found">



</div>

<?php include("navbar.html") ?>
</body>
</html>