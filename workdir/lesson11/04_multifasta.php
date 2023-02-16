<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Multifasta</title>

    <style type="text/css">
        
        div div {
            margin-bottom: 1em;
        }

        table {
            border-collapse: collapse;
        }
        
        th, td {
            border: solid black 1px;
            padding: 0.5em 1em;
            text-align: left;
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

    if (isset($_POST['submit'])) :
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
            
           # $lines = file($_FILES['fasta-file']['tmp_name']);

            // NUMBER OF SEQUENCES
            $counter=0;
            foreach ($lines as $line_count) {
                if (str_starts_with ($line_count, ">")) {
                    $counter++;
                }              
            }
            echo "number of sequences: ".$counter."<br>";


            // SEQUENCE PRINT AND GC COUNT

            $gc_count=[];
            $tot_count=[];
            $cur_seq="";
            
            echo "<pre>";
            foreach($lines as $line){

                $line = trim($line);

                if (str_starts_with($line, '>')) {
                    
                    $cur_seq=$line;
                    $gc_count[$cur_seq]=0;
                    $tot_count[$cur_seq]=0;

                    echo "\n<strong>$line\n</strong>";
                }
                else {

                    $nts=str_split($line);
                    foreach ($nts as $nt) {
                        $tot_count[$cur_seq]++;
                        if ($nt == "C" or $nt == "G") {
                            $gc_count[$cur_seq]++;
                        }

                        echo $nt;

                        if ($tot_count[$cur_seq] % 10 == 0 ) {
                            echo " ";
                        }

                        if ($tot_count[$cur_seq] % 80 == 0 ) {
                            echo "\n";
                        }
                        
                    }
                }
            }
            echo "</pre>";


            

        ?>
    </div>

    <table>
        <tr>
            <th>Header</th>
            <td>% GC</td>
        </tr>
        
        <?php foreach ($tot_count as $header => $tot_count): ?>
        <tr>
            <th><?= $header ?></th>
            <td><?= round (($gc_count[$header] / $tot_count) *100) ?></td>
        </tr>
        <?php endforeach ?>

    </table>
    <?php endif ?>

</body>
</html>