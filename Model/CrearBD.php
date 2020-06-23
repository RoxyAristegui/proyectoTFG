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
	
	// Name of the file
	var	$filename ;
	

	function __construct($mysql_host,$mysql_username,$mysql_pass,$filename){
		$this->mysql_host=$mysql_host;
		$this->mysql_pass=$mysql_pass;
		$this->mysql_username=$mysql_username;
		$this->filename=$filename;
		
	}

	function leerSQL(){
		$conn =new mysqli($this->mysql_host, $this->mysql_username, $this->mysql_pass);

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
					mysqli_query($conn,$query) or die('Error de mysql'.var_dump($conn->error) );
					$query= '';		
				}
			}

			//$msg='<div class="success-response sql-import-response">SQL file imported successfully</div>';

			$return=array("ok"=>true,"code"=>"000052","resource"=>"CrearBd");
			return $return;
		}
}

function eliminarBD($bd){
$conn =new mysqli($this->mysql_host, $this->mysql_username, $this->mysql_pass);
mysqli_query($conn,'DROP DATABASE IF EXISTS '.$bd);
}

}


?>