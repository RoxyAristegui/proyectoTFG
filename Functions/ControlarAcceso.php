<?php
include_once '../Model/ACL_Model.php';
include '../View/MESSAGE_View.php';

$URI= $_SERVER['REQUEST_URI'];

$xplodeduri=explode("Controller/", $URI);
$explodeduri=explode(_,$xplodeduri[1]);
$controller=$explodeduri[0];
$ACL= new ACL();

$acceso=$ACL->Acceso(trim($controller),$_REQUEST['action']);

if($acceso===false){
	//new MESSAGE('AccesoRestringido','Index_Controller.php');
	echo "false;";
}
