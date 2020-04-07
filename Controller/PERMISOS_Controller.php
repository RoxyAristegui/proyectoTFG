<?php

include_once '../Functions/ControlarAcceso.php';

include "../View/Permisos_View.php";

//include "../Model/Rol_Model.php";
include "../Model/Permisos_Model.php";



if(isset($_REQUEST['action'])){
	switch ($_REQUEST['action']) {
		case 'ADD':
				$permiso= new Permisos($_REQUEST['id_entidad'],$_REQUEST['id_accion']);
				$permiso->ADD();
			break;
		case 'DELETE':
				$permiso= new Permisos($_REQUEST['id_entidad'],$_REQUEST['id_accion']);
				$permiso->DELETE();
				break;

		default:

			
			
			break;
	}
}
// En funcion del action realizamos las acciones necesarias

		
$permiso= new Permisos('','');
			$permisos= $permiso->SEARCH();
			$accion = new Accion('');
			$acciones=$accion->SEARCH();
			$entidad= new Entidad('');
			$entidades=$entidad->SEARCH();
			new Permisos_View($acciones,$entidades,$permisos);
	
