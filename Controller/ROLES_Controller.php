<?php

	//session_start(); //solicito trabajar con la session

	//include '../Functions/Authentication.php';
	include_once '../Functions/ControlarAcceso.php';

	include_once '../Model/USUARIOS_Model.php';
	include_once '../View/Roles_View.php';
		include_once '../View/Roles_User_View.php';
	include_once '../View/MESSAGE_View.php';


	if (!isset($_REQUEST['action'])){
		$_REQUEST['action'] = '';
	}

 


// En funcion del action realizamos las acciones necesarias

		Switch ($_REQUEST['action']){
			case 'ADD':
				if($_POST){
					$rol=$_POST['rol'];
					$desc=$_POST['descripcion'];
					$rol=new rol($rol,$desc);
					$rtn=$rol->ADD();

				//los errores de insercion pueden venir en un array(error con la BD) o array de arrays (datos no válidos)
			
					if(isset($rtn[0]['ok']) || $rtn['ok']===false){	

						new MESSAGE($rtn,"ROLES_Controller.php");
					
					}
				}

			
			 	$roles= new Rol('');
				$listaroles=$roles->SEARCH();
				new Roles_View($listaroles);
			
				break;

			case 'DELETE':
				if(isset($_REQUEST['id'])){
					$id=$_REQUEST['id'];
					$rol= new rol('',$id);
					$rtn=$rol->DELETE();
				}	
				$roles= new Rol('');
				$listaroles=$roles->SEARCH();
				new Roles_View($listaroles);
			
				break;	

			case 'EDIT':

				/*if(isset($_REQUEST['id_rol'])){
					$id=$_REQUEST['id_rol'];
					$login=$_REQUEST['login'];
					$rol=new rol('',$id);
					$rtn=$rol->setRolUsuario($login);
				}
				*/

				if(isset($_REQUEST['loginlist'])){
					$ids=$_REQUEST['loginlist'];
					$rol=$_REQUEST['Rol'];
					$array=(json_decode($ids));
					
					foreach ($array as $login) {
						$usuario= new USUARIOS_Model($login,'','','','','');
						$rtn=$usuario->setRol($rol);
						if($rtn['ok']==false){
							new MESSAGE($rsp,"ROLES_Controller.php");
							die();
						}
					}

				}
				$usuarios= new USUARIOS_Model('','','','','','');
				$usuarios=$usuarios->SEARCH();
			 	$roles= new Rol('');
				$listaroles=$roles->SEARCH();
				new Roles_User_View($listaroles,$usuarios);



				break;	

			 default:
				$usuarios= new USUARIOS_Model('','','','','','');
				$usuarios=$usuarios->SEARCH();
 				$roles= new Rol('');
				$listaroles=$roles->SEARCH();
				new Roles_User_View($listaroles,$usuarios);
				break;
		}

	
		
			if(isset($rtn['code'])){
						//lanzar modal de confirmacion;
						$mensajeModal=$rtn['code'];
						include '../View/Mensaje_Modal.php';
						new Modal($mensajeModal);
					}

	

