<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Multifasta</title>

    <style type="text/css">
        
        table {
            border-collapse: collapse;
        }
        
        th, td {
            border: solid black 1px;
            padding: 0.5em 1em;
            text-align: left;
        }

        .A {
            color: red;
        }
        .T {
            color: green;
        }
        .G {
            color: blue;
        }
        .C {
            color: orange;
        }

        .barplot {
            border-left: solid black 1px;
            border-bottom: solid black 1px;
            padding: 1em;
        }
        .bar {
            border: solid grey 1px;
        }
        .fill {
            background: lightblue;
            text-align: right;
        }

    </style>
    
</head>
<body>

    <form action="#" method="post" enctype="multipart/form-data">

        <div>
                <input type="radio" name="upload-type" value="file">
                Select fasta file:
            <div>
                <input type="file" name="fasta-file">
            </div>
        </div>

        <div>
                <input type="radio" name="upload-type" value="paste">
                Paste fasta file:
            <div>
                <textarea name="fasta-paste" id="" cols="30" rows="10"></textarea>
            </div>
        </div>
        <input type="submit" name="submit" value="submit">

    </form>

<?php

    if (isset($_POST['submit'])) {
        $lines = [];
        if ($_POST['upload-type'] == 'paste') {
            $lines = explode ("\n", $_POST['fasta-paste']);
        }
        elseif ($_POST['upload-type'] == 'file') {
            $lines = file($_FILES['fasta-file']['tmp_name']);
        }
        

?>


    <!-- FILES -->
    <div>
        <?php

            // NUMBER OF SEQUENCES
            $counter=0;
            foreach ($lines as $line_count) {
                if (str_starts_with ($line_count, ">")) {
                    $counter++;
                }              
            }
            echo "number of sequences: ".$counter."<br>";


            // SEQUENCE PRINT 
            
            $freq = [];
            $tot_count = 0;

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
                                    echo "$p%";
                                echo '</div>';
                            echo '</div>';
                        }
                    echo '</div>';
                    }
                    #reset the world
                    $freq = [];
                    $tot_count = 0;

                    echo "\n<strong>$line\n</strong>";
                }
                else {

                    $nts=str_split($line);
                    foreach ($nts as $nt) {
                        
                        $tot_count++;
                        if(!isset ($freq[$nt])) {
                            $freq[$nt] = 0;
                        }
                        $freq[$nt]++;

                        echo "<span class=\"$nt\">".$nt."</span>";

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
                            echo "$p%";
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