<?php

	include_once '../Functions/ControlarAcceso.php';


	//include_once '../Model/Entidades_Model.php';
	include_once '../View/Entidades_View.php';


	if (!isset($_REQUEST['action'])){
		$_REQUEST['action'] = '';
	}
		Switch ($_REQUEST['action']){
			case 'ADD':
				$entidad=$_POST['entidad'];
				$desc=$_POST['descripcion'];
				$entidad=new Entidad($entidad,$desc);
				$rtn=$entidad->ADD();
				
				break;

			case 'DELETE':
				$id=$_REQUEST['id'];
				$entidad= new Entidad('',$id);
				$rtn=$entidad->DELETE();
				
				break;	
		
			 default:
				$rtn['ok']=true;
				break;
		}
			if(isset($rtn[0]['ok']) || $rtn['ok']===false){

					new MESSAGE($rtn,"../Controller/ENTIDADES_Controller.php	");
			
			}else{
		 		$entidad=new Entidad('');
			 	$lista=$entidad->ListaConPermiso();

				new Acciones_view($lista);
				
				if(isset($rtn['code'])){
					//lanzar modal de confirmacion;
					$mensajeModal=$rtn['code'];
					include '../View/Mensaje_Modal.php';
					new Modal($mensajeModal);
				}

		}