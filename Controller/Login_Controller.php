<?php
session_start();

include_once '../Functions/Access_DB.php';
include '../Functions/Authentication.php';

if(IsAuthenticated()){
	//si ya ha iniciado sesion no puede hacer login de nuevo
header('Location:USUARIOS_Controller.php?action=SHOWCURRENT&login='.$_SESSION['login']);

}else{

//si no se han enviado paramtetros, creamos la vista inicial
if(!isset($_REQUEST['login']) && !(isset($_REQUEST['password']))){
	
	//comprobar si existe la base de datos, sino, se procede a crearla
	 $bd = ExisteDB();
	if($bd===false){
		header('Location: ../Controller/CrearBD_Controller.php');
	}else{
		//si existe la BD se muestra la vista de login
		include '../View/Login_View.php';
		$login = new Login();
	}
}
else{
	//si ya se ha recogido los datos del formulario de la vista de login
	include '../Model/USUARIOS_Model.php';
	$usuario = new USUARIOS_Model($_REQUEST['login'],$_REQUEST['password'],'','','','');
	$respuesta = $usuario->login();
	
	if ($respuesta['ok'] == true){
		//si se ha hecho login correcto, se vuelve a la vista prncipal
		session_start();
		$_SESSION['login'] = $_REQUEST['login'];
		$user= new USUARIOS_Model($_SESSION['login'],'','','','','');
		$_SESSION['rol']=$user->getRol();
		header('Location:index_Controller.php');
	}
	else{
		//si ha ocurrido algune error, se muestra en pantalla;
		include '../View/MESSAGE_View.php';
		new MESSAGE($respuesta, './Login_Controller.php');
	
	}

}

}
?>

