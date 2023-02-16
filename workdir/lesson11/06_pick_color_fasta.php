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
        .invalid-nt {
            color: darkred;
            border-bottom: solid red 2px
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
                <textarea name="fasta-paste" cols="30" rows="10"></textarea>
            </div>
        </div>

        <div>
            Pick a color
            <div>
                A:
                <select name="color_a">
                    <option value="none">No color</option>
                    <option value="red">Red</option>
                    <option value="green">Green</option>
                    <option value="blue">Blue</option>
                    <option value="orange">Orange</option>
                </select>
            </div>
            <div>
                T:
                <select name="color_t">
                    <option value="none">No color</option>
                    <option value="red">Red</option>
                    <option value="green">Green</option>
                    <option value="blue">Blue</option>
                    <option value="orange">Orange</option>
                </select>
            </div>
            <div>
                G:
                <select name="color_g">
                    <option value="none">No color</option>
                    <option value="red">Red</option>
                    <option value="green">Green</option>
                    <option value="blue">Blue</option>
                    <option value="orange">Orange</option>
                </select>
            </div>
            <div>
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