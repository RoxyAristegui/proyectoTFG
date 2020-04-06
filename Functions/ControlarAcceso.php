<?php
include_once '../Model/ACL_Model.php';
include_once '../View/MESSAGE_View.php';

//cogemos el controlador de la URL de la pagina web
$URI= $_SERVER['REQUEST_URI'];

$xplodeduri=explode("Controller/", $URI);
$explodeduri=explode('_',$xplodeduri[1]);
$controller=$explodeduri[0];
// recogemos la acción o establecemos el nombre de la acción por defecto
if(isset($_REQUEST['action'])){
	$action=$_REQUEST['action'];
}else{
	$action='SHOWALL';
}

$ACL= new ACL();
$acceso=$ACL->Acceso(trim($controller),$action);

if($acceso===false){
new MESSAGE('AccesoRestringido','Index_Controller.php');
	die();
}
