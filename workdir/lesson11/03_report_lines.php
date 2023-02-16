<!DOCTYPE html>
<html lang="en">
<head>
	<title>report lines</title>
	
	<style type="text/css" media="screen">
		th, td{
			border: black solid 1px;
			padding: 0.5em 1em;
			}
		table {
			border-collapse: collapse;
		}
		li {
			display: inline-block;
			padding: 0 1em;
			border-right:solid grey 1px;
		}
		li:last-child {
			border: none;
		}
	</style>
	
</head>
<body>
	
	<form action="#" method="post" enctype="multipart/form-data">
		<input type="file" name="input-file" value="">
		<input type="submit" name="Submit" value="SUBMIT">
	</form>
	
	
		<?php
			
			// LINES
			$lines= file($_FILES['input-file']['tmp_name']);
			$nr_lines= count($lines);
			$nr_words = 0;
			$word_freq = [];
			$nr_chars = 0;

			foreach ($lines as $line) {
				$words = explode(" ", $line);
				foreach ($words as $word) {
					$word = trim($word);
					$nr_words++;

					if (!isset($word_freq[$word])){
						$word_freq[$word] = 0;
					}
					$word_freq[$word]++;
				}
				$nr_chars += strlen ($line);
			}

			arsort($word_freq);
		?>
	
	<table>
		<tr>
			<th>Lines</th>
			<td><?php echo $nr_lines; ?></td>
		</tr>
		
		<tr>
			<th>Words</th>
			<td><?php echo $nr_words; ?></td>
		</tr>
		
		<tr>
			<th>Characters</th>
			<td><?php echo $nr_chars; ?></td>
		</tr>
	</table>
	
	<?php
	
	$counter = 0;
	echo "<ol>";
	foreach ($word_freq as $word => $count) {
		echo "<li>$word</li>";
		
		if ($counter >= 10) {
			break;
		}
		$counter++;
	}
	echo "</ol>";
    	
	?>		


</body>
</html>
