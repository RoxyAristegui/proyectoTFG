<?php

include_once '../Functions/ControlarAcceso.php';


include_once "../Model/Permisos_Rol_Model.php";
include_once "../Model/Permisos_Model.php";

include "../View/Permisos_Rol_View.php";



if(isset($_REQUEST['action'])){

	switch ($_REQUEST['action']) {
		case 'ADD':
				$permiso= new Permisos_Rol($_REQUEST['id_rol'],$_REQUEST['id_entidad'],$_REQUEST['id_accion']);
				$permiso->ADD();
			break;
		case 'DELETE':
				$permiso= new Permisos_Rol($_REQUEST['id_rol'],$_REQUEST['id_entidad'],$_REQUEST['id_accion']);
				$permiso->DELETE();

				break;

		default:
			
			
			break;
	}
}
// En funcion del action realizamos las acciones necesarias

if(isset($_REQUEST['id_rol'])){
	$id_rol=$_REQUEST['id_rol'];
}else{
	$id_rol=1;
}

			$perm=new Permisos_Rol($id_rol);
			$permRol=$perm->getById();
			$permiso= new Permisos('','');
			$permisos = $permiso->SEARCH();
			$accion = new Accion('');
			$acciones=$accion->SEARCH();
			$entidad= new Entidad('');
			$entidades=$entidad->SEARCH();
			$rol= new Rol('');
			$roles=$rol->SEARCH();
			new Permisos_Rol_View($acciones,$entidades,$permisos,$roles,$permRol);
	
