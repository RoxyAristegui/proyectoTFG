<?php
//session
session_start();
//incluir funcion autenticacion
include '../Functions/Authentication.php';
include_once '../Model/config.php';
//si no esta autenticado
if (!IsAuthenticated()){
   $mysqli = new mysqli(host, user, pass , BD);
    	
	if ($mysqli->connect_errno) {
	header('Location: ../View/CrearBD_View.php');
}else{
	header('Location: ../index.php');
}
}
//esta autenticado
else{
	include '../View/users_index_View.php';
	new Index();
}

?>