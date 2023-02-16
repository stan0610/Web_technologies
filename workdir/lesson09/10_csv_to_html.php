<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>csv to html</title>

    <style>
        textarea {
            width:500px;
            height:128px;
        }
        th, td {
            border: solid black 1px;
            padding: 0.5em;
        }
    </style>

</head>
<body>
    
    <form action="#" method="post">

        <div>
            Paste CSV here:
            <textarea name="csv"><?= $_POST['csv'] ?></textarea>
        </div>

        <div>
            Choose a seperator: 
            <input type="text" name="sep" value=",">
        </div>

        <div>
            first row is a header: 
            <input type="checkbox" name="headers">
        </div>

        <div>
            <input type="submit" name="submit" value="submit">
        </div>

    </form>

    <?php 
        if(isset($_POST['submit'])){
            echo "<hr>";

            $csv = [];
            $lines = explode("\n", $_POST['csv']);
            $nr_fields = 0;

            foreach ($lines as $line) {
                $fields = explode($_POST['sep'], $line);

                if ($nr_fields == 0){
                    $nr_fields = count($fields);
                }
                if (count($fields) != $nr_fields){
                    echo "Error, number of fields is incorrect";
                    exit;
                }

                $csv[] = $fields;
            }

            echo "<table>";

            if (isset($_POST['headers'])) {
                echo "<tr>";
                    $header_row = array_shift($csv);
                    foreach ($header_row as $header) {
                        echo "<th>$header</th>";
                    }
                echo "</tr>";
            }

            foreach ($csv as $row) {
                echo "<tr>";
                foreach ($row as $data) {
                    echo "<td>$data</td>";
                }
                echo "</tr>";
            }
            echo "</table>";
        }
    ?>

</body>
</html>