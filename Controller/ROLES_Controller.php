<?php

	//session_start(); //solicito trabajar con la session

	//include '../Functions/Authentication.php';
	include_once '../Functions/ControlarAcceso.php';


	//include_once '../Model/Rol_Model.php';
	include_once '../Model/USUARIOS_Model.php';
	include_once '../View/Roles_View.php';
	include_once '../View/MESSAGE_View.php';


	if (!isset($_REQUEST['action'])){
		$_REQUEST['action'] = '';
	}

// En funcion del action realizamos las acciones necesarias

		Switch ($_REQUEST['action']){
			case 'ADD':
				$rol=$_POST['rol'];
				$desc=$_POST['descripcion'];
				$rol=new rol($rol,$desc);
				$rtn=$rol->ADD();
				
				break;

			case 'DELETE':
				$id=$_REQUEST['id'];
				$rol= new rol('',$id);
				$rtn=$rol->DELETE();
				
				break;	
			case 'EDIT':
				$id=$_REQUEST['id_rol'];
				$login=$_REQUEST['login'];
				$rol=new rol('',$id);
				$rtn=$rol->setRolUsuario($login);
				
				break;	
			 default:
				$rtn['ok']=true;
				break;
		}

		//los errores pueden venir en array o en array de arrays
		//se muestran en un mensaje
		if(isset($rtn[0]['ok']) || $rtn['ok']===false){	

			new MESSAGE($rtn,"ROLES_Controller.php");
			
		}else{
			
			// si se ha realizado correctamente se vuelve a mostrar la página
			$usuarios= new USUARIOS_Model('','','','','','');
			$usuarios=$usuarios->SEARCH();


			$roles= new Rol('');
			$listaroles=$roles->SEARCH();
			new Roles_View($listaroles,$usuarios);

			//
			if(isset($rtn['code'])){
				//lanzar modal de confirmacion;
				$mensajeModal=$rtn['code'];
				include '../View/Mensaje_Modal.php';
				new Modal($mensajeModal);
			}


		}
		

	

