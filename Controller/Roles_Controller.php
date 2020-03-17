<?php

	//session_start(); //solicito trabajar con la session

	//include '../Functions/Authentication.php';
	include_once '../Model/ACL_Model.php';

	/*if (!IsAuthenticated()){
		header('Location:../index.php');
	}
*/

	include_once '../Model/Rol_Model.php';
	include_once '../Model/USUARIOS_Model.php';
	include_once '../View/Roles_View.php';
	include_once '../View/MESSAGE_View.php';




// sino existe la variable action la crea vacia para no tener error de undefined index

if (!isset($_REQUEST['action'])){
		$_REQUEST['action'] = '';
		$accion='SHOWALL'; //definicimos la acción para el control de acceso.
	}else{
		$accion=$_REQUEST['action'];

	}

	$ACL=new ACL();

	if($ACL->Acceso('PERMISOS',$accion)===false){
		new MESSAGE('AccesoRestringido','Index_Controller.php');

	}
// En funcion del action realizamos las acciones necesarias

		Switch ($_REQUEST['action']){
			case 'ADD':
				$rol=$_POST['rol'];
				$desc=$_POST['descripcion'];
				$rol=new rol($rol,$desc);
				$rtn=$rol->ADD();
				if($rtn['ok']===false){
					new MESSAGE_View($rtn,"Roles_Controller.php");
				}
				break;

			case 'DELETE':
				$id=$_REQUEST['id'];
				$rol= new rol('',$id);
				$rtn=$rol->DELETE();
				if($rtn['ok']===false){
					new MESSAGE_View($rtn,"Roles_Controller.php");
				}
				break;	
			case 'changeRol':
				$id=$_POST['id_rol'];
				$login=$_POST['login'];
				$rol=new rol('',$id);
				$rtn=$rol->setRolUsuario($login);
				if($rtn['ok']===false){
					new MESSAGE_View($rtn,"Roles_Controller.php");
				}
				break;	
			 default:
				
				break;
			}
		

		$usuarios= new USUARIOS_Model('','','','','','');
		$usuarios=$usuarios->SEARCH();


		$roles= new Rol('');
		$listaroles=$roles->SEARCH();
		new Roles_View($listaroles,$usuarios);

	

