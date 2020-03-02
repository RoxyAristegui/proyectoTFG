<?php
//----------------------------------------------------
// DB connection function
// Can be modified to use CONSTANTS defined in config.inc
//----------------------------------------------------
include_once '../Model/config.php';

function ConnectDB()
{
    $mysqli = new mysqli(host, user, pass , BD);
    	
	if ($mysqli->connect_errno) {
		include '../View/MESSAGE_View.php';
		new MESSAGE("Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error, './index.php');
		return $mysqli->connect_errno ;
	}
	else{
		return $mysqli;
	
	}
}

function ExisteDB(){
	$mysqli = new mysqli(host, user, pass , BD);
    	if ($mysqli->connect_errno==1049) {
    		return false;
    	}else{
    			return true;
    		}
}

?>
