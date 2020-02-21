<?php
/*
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

*/

class CrearBD{
	
	var $mysql_host;
	var $mysql_username;
	var $mysql_pass;
	var $mysql_db="mysql";
	// Name of the file
	var	$filename = '../tfgRoxy.sql';
	

	function __construct($mysql_host,$mysql_username,$mysql_pass){
		$this->mysql_host=$mysql_host;
		$this->mysql_pass=$mysql_pass;
		$this->mysql_username=$mysql_username;
	}

	function leerSQL(){
		$conn =new mysqli($this->mysql_host, $this->mysql_username, $this->mysql_pass, $this->mysql_db);

		$query = '';
		$sqlScript = file($this->filename);
		if($sqlScript==''){ 
			//no se puede enconrtar el archivo
			$return=array("ok"=>false,"code"=>"00004","resource"=>"CrearBd");
		}else{
			foreach ($sqlScript as $line)	{
			
				$startWith = substr(trim($line), 0 ,2);
				$endWith = substr(trim($line), -1 ,1);
				
				if (empty($line) || $startWith == '--' || $startWith == '/*' || $startWith == '//') {
					continue;
				}
					
				$query = $query . $line;
				if ($endWith == ';') {
					echo $query;
					mysqli_query($conn,$query) or die('Error de mysql');
					$query= '';		
				}
			}

			//$msg='<div class="success-response sql-import-response">SQL file imported successfully</div>';

			$return=array("ok"=>true,"code"=>"000052","resource"=>"CrearBd");
			return $return;
		}
}

}

/*
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
*/


?>