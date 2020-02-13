<?php

session_start();
include_once '../Locale/Strings_'.$_SESSION['idioma'].'.php';

//session_start();
if(!isset($_POST['login'])){
	include '../View/Register_View.php';
	$register = new Register();
}
else{
		
	include '../Model/USUARIOS_Model.php';
	$usuario = new USUARIOS_Model($_REQUEST['login'],$_REQUEST['password'],$_REQUEST['nombre'],$_REQUEST['apellidos'],$_REQUEST['email']);
	$respuesta = $usuario->Register();

	if ($respuesta['ok'] === true){
		Include '../View/MESSAGE_View.php';
		new MESSAGE($respuesta, './Login_Controller.php');
	}
	else{
		include '../View/MESSAGE_View.php';
		new MESSAGE($respuesta, './Register_Controller.php');
	}

}

?>

