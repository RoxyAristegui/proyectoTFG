<?php
include_once '../Model/ACL_Model.php';
include_once '../View/MESSAGE_View.php';

//cogemos el controlador de la URL de la pagina web
$URI= $_SERVER['REQUEST_URI'];

$xplodeduri=explode("Controller/", $URI);
$explodeduri=explode('_',$xplodeduri[1]);
$controller=$explodeduri[0];
// recogemos la acción o establecemos el nombre de la acción por defecto


$currentUser= new ACL();
if(isset($_REQUEST['action'])){

	$action=$_REQUEST['action'];
}else{
	$action='SHOWALL';
}

	if(($action=='SHOWCURRENT' || $action=='EDIT') && $currentUser->login==$_REQUEST['login']){
		//para ver tu perfil, o editar tu perfil no necesitas permiso
		$acceso=true;
	
}else{

	$acceso=$currentUser->Acceso(trim($controller),$action);
}

if($acceso===false){
new MESSAGE('AccesoRestringido','Index_Controller.php');
	die();
}
