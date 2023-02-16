<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Multifasta</title>

    <link rel="stylesheet" href="styles.css">

    <style type="text/css">
        
        .A {
            color: <?= $_POST['color_a'] ?? 'black' ?>;
        }
        .T {
            color: <?= $_POST['color_t'] ?? 'black' ?>;
        }
        .G {
            color: <?= $_POST['color_g'] ?? 'black' ?>;
        }
        .C {
            color: <?= $_POST['color_c'] ?? 'black' ?>;
        }

    </style>
    
</head>
<body>

<?php

    # navbar
    include("navbar.html");

    # errors
    $errors = [];
    if(!isset($_POST['submit'])){
        $errors[] = "No data sent to color.php. Please submit the form";
    }
    
    $fasta_lines = [];
    if ($_POST['upload-type'] == 'paste') {
        if (empty($_POST['fasta-paste'])) {
            $errors[] = "Please paste fasta sequences";
        }
    }
    elseif ($_POST['upload-type'] == 'file') {
        if (empty($_FILES['fasta-file']['tmp_name'])) {
            $errors[] = "Please specify a file";
        }
    }
    else {
        $errors[] = "please choose your fasta upload method: Paste or File";
    }

    if (!empty($errors)){
        foreach ($errors as $error) {
            echo '<div class="error">'.$error.'</div>';
        }
        echo "<a href=\"submit.php\">Please fix your input</a>";
        exit;
    }

    # upload type
    if (isset($_POST['submit'])) {
    $lines = [];
    if ($_POST['upload-type'] == 'paste') {
        $lines = explode ("\n", $_POST['fasta-paste']);
    }
    elseif ($_POST['upload-type'] == 'file') {
        $lines = file($_FILES['fasta-file']['tmp_name']);
    }
        

?>


    <div>
        <?php

            # SEQUENCE PRINT 
            
            $freq = [];
            $tot_count = 0;

            # Table of contents
            echo "<ul>";
            foreach ($lines as $line) {
                if (str_starts_with ($line, ">")) {
                    echo "<li>";
                    echo "<a href=\"#$line\">$line</a>";
                    echo "</li>";
                }
            }
            echo "</ul>";

            echo "<pre>";
            foreach($lines as $line){

                $line = trim($line);

                if (str_starts_with($line, '>')) {

                    #print barplot
                    if (!empty($freq)) {
                    echo '<div class="barplot">';
                        foreach ($freq as $nt => $count) {
                            $p = round ($count/$tot_count *100);
                            echo '<div class="bar">';
                                echo '<div class="fill" style="width: ' .$p. '%">';
                                    echo "$nt>$p%";
                                echo '</div>';
                            echo '</div>';
                        }
                    echo '</div>';
                    }
                    #reset the world
                    $freq = [];
                    $tot_count = 0;

                    echo "\n<strong id=\"$line\">$line\n</strong>";
                }
                else {

                    $nts=str_split($line);
                    foreach ($nts as $nt) {
                        
                        $tot_count++;
                        if(!isset ($freq[$nt])) {
                            $freq[$nt] = 0;
                        }
                        $freq[$nt]++;

                        $class = $nt;

                        if ($nt != "A" and $nt != "T" and $nt != "G" and $nt != "C"){
                            $class = "invalid-nt";
                        }

                        echo '<span class="'.$class.'">'.$nt.'</span>';

                        if ($tot_count % 10 == 0 ) {
                            echo " ";
                        }

                        if ($tot_count % 80 == 0 ) {
                            echo "\n";
                        }
                    }
                }
            }
            echo '<div class="barplot">';
                foreach ($freq as $nt => $count) {
                    $p = round ($count/$tot_count *100);
                    echo '<div class="bar">';
                        echo '<div class="fill" style="width: ' .$p. '%">';
                            echo "$nt>$p%";
                        echo '</div>';
                    echo '</div>';
                }
            echo '</div>';
            echo "</pre>";


            
    }
        ?>
    </div>



</body>
</html>