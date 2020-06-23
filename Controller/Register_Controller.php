<?php


//session_start();
if(!isset($_POST['login'])){
	include '../View/Register_View.php';
	$register = new Register();
}
else{
		
	include '../Model/USUARIOS_Model.php';
	$usuario = new USUARIOS_Model($_REQUEST['login'],$_REQUEST['password'],$_REQUEST['nombre'],$_REQUEST['apellidos'],$_REQUEST['email'],$_REQUEST['dni']);
	$respuesta = $usuario->register();

	if (isset($respuesta['ok']) && $respuesta['ok'] === true){
		Include '../View/MESSAGE_View.php';
		new MESSAGE($respuesta, './Login_Controller.php');
	}
	else{
		include '../View/MESSAGE_View.php';
		new MESSAGE($respuesta, './Register_Controller.php');
	}

}

?>

