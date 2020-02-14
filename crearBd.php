<?php

// Name of the file
$filename = 'tfgRoxy.sql';
// MySQL host
$mysql_host = 'localhost';
// MySQL username
$mysql_username = 'phpmyadmin';
// MySQL password
$mysql_password = 'MySQLpa55';
// Database name
$mysql_database = 'INCID_TFG';

$conn =new mysqli($mysql_host, $mysql_username, $mysql_password, 'mysql');

$query = '';
$sqlScript = file($filename);
foreach ($sqlScript as $line)	{
	
	$startWith = substr(trim($line), 0 ,2);
	$endWith = substr(trim($line), -1 ,1);
	
	if (empty($line) || $startWith == '--' || $startWith == '/*' || $startWith == '//') {
		continue;
	}
		
	$query = $query . $line;
	if ($endWith == ';') {
		mysqli_query($conn,$query) or die('<div class="error-response sql-import-response">Problem in executing the SQL query <b>' . $query. '</b></div>');
		$query= '';		
	}
}
echo '<div class="success-response sql-import-response">SQL file imported successfully</div>';

$filename='tfgRoxy_test.sql';
$query = '';
$sqlScript = file($filename);
foreach ($sqlScript as $line)	{
	
	$startWith = substr(trim($line), 0 ,2);
	$endWith = substr(trim($line), -1 ,1);
	
	if (empty($line) || $startWith == '--' || $startWith == '/*' || $startWith == '//') {
		continue;
	}
		
	$query = $query . $line;
	if ($endWith == ';') {
		mysqli_query($conn,$query) or die('<div class="error-response sql-import-response">Problem in executing the SQL query <b>' . $query. '</b></div>');
		$query= '';		
	}
}
echo '<div class="success-response sql-import-response">SQL TEST file imported successfully</div>';

?>