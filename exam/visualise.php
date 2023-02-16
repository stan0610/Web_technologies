<?php
    if (isset($_POST['colornts'])) {
        $color_a = "pink";
        $color_t = "yellow";
        $color_c = "lightgreen";
        $color_g = "lightblue";
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Visualise - DNA visualiser</title>

    <link rel="stylesheet" href="styles.css">

    <style>
        .A {
            background: <?= $color_a?>;
        }
        .T {
            background: <?= $color_t?>;
        }
        .C {
            background: <?= $color_c?>;
        }
        .G {
            background: <?= $color_g?>;
        }
        .U {
            background: <?= $color_t?>;
            font-weight: bold;
        }
        .invalid-nt {
            <?php
                if($_POST['invalidnts'] == 'remove') {
                    echo "display: none;";
                }
                elseif($_POST['invalidnts'] == 'highlight') {
                    echo "background: red; color: white;";
                }
            ?>
        }
    </style>

</head>
<body>
<?php include("navbar.html") ?>  

<div class="title">
    Visualise Sequences
</div>

<div class="maincontent">

<!-- ERRORS -->
<?php

    $errors = [];

    # page accession without sending data
    if(!isset($_POST['submit'])){
        $errors[] = "Data was not sent via the form.";
    }

    # upload type was picked, but no fasta received
    if ($_POST['upload-type'] == 'paste') {
        if (empty($_POST['fasta-paste'])) {
            $errors[] = "No fasta sequences were pasted.";
        }
    }
    elseif ($_POST['upload-type'] == 'file') {
        if (empty($_FILES['fasta-file']['tmp_name'])) {
            $errors[] = "No fasta file was selected.";
        }
    }

    # no upload type was picked
    else {
        $errors[] = "No upload type was picked";
    }

    # no error handling option was picked
    if(!isset($_POST['invalidnts'])){
        $errors[] = "Please specify how the DNA errors should be handled (remove or highlight).";
    }

    if (!empty($errors)){
        foreach ($errors as $error) {
            echo '<div class="error">'.$error.'</div>';
        }
        echo "Please correct the issues and resubmit the "."<a href=\"submit.php\">form</a>";
        exit;
    }
?>

<!-- VISUALISE THE SEQUENCE -->
<?php
# data was submitted correctly
if (isset($_POST['submit'])) {
    # upload type
    $lines = [];
    if ($_POST['upload-type'] == 'paste') {
        $lines = explode ("\n", $_POST['fasta-paste']);
    }
    elseif ($_POST['upload-type'] == 'file') {
        $lines = file($_FILES['fasta-file']['tmp_name']);
    }

    # print sequence
    foreach($lines as $line){
        $line = trim($line);
        if (str_starts_with($line, '>')) {
            $tot_count = 0;
            echo "<br><strong>$line</strong><br>";
        }
        else {
            $nts=str_split($line);
            foreach ($nts as $nt) {
                $tot_count++;
                if(!isset ($freq[$nt])) {
                    $freq[$nt] = 0;
                }
                $freq[$nt]++;

                #for RNA
                if (isset($_POST['rna'])) {
                    if ($nt == "T") {
                        $nt = "U";
                    }
                }

                $class = $nt;

                if ($nt != "A" and $nt != "T" and $nt != "G" and $nt != "C" and $nt != "U"){
                    $class = "invalid-nt";
                }

                echo '<span class="'.$class.'">'.$nt.'</span>';

                #72 nts per line
                if (isset($_POST['ntsperline'])) {
                    $line_nt = $_POST['ntsperline'];
                }
                else{
                    $line_nt = 72;
                }
                if ($tot_count % $line_nt == 0 ) {
                    echo "<br>";
                }

                # 12 nts per block
                #there is a bug that i could not find in my code ==> if i didnt set the group by 12 nt my sequence wont print
                if (isset($_POST['groupnts'])) {
                    $space_nt = 12;
                }
                if ($tot_count % $space_nt == 0 ) {
                    echo " ";
                }

    
            }
       }
    }

}

?>


</div>

<?php include("navbar.html") ?>
</body>
</html>