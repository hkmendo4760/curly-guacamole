<h3>Reading From a File</h3>


<?php
$DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];

$filename = $DOCUMENT_ROOT.'data/'.'cities.txt';

$lines_in_file = count(file($filename));

$fp = fopen($filename, 'r'); //opens the file for Reading

for ($ii = 1; $ii <= $lines_in_file; $ii++)
{
	$line = fgets($fp); //Reads one line from the File$
	$city = trim($line);
	
	print 'Cityy: '.$city.'<br />';
}

fclose($fp);

?>