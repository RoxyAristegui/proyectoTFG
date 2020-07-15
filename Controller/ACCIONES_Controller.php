<?php

	include_once '../Functions/ControlarAcceso.php';


	include_once '../View/Acciones_View.php';


	if (!isset($_REQUEST['action'])){
		$_REQUEST['action'] = '';
	}
		Switch ($_REQUEST['action']){
			case 'ADD':
				$accion=$_POST['accion'];
				$desc=$_POST['descripcion'];
				echo $desc;
				$accion=new Accion($accion,'',$desc);
				$rtn=$accion->ADD();
			
				break;

			case 'DELETE':
				$id=$_REQUEST['id'];
				$accion= new Accion('',$id);
				$rtn=$accion->DELETE();
				
				break;	
		
			 default:	$rtn['ok']=true;
							
				break;
		}
			if(isset($rtn[0]['ok']) || $rtn['ok']===false){

						new MESSAGE($rtn,"../Controller/ACCIONES_Controller.php	");
			
				}else{


		 	$acciones=new Accion('');
			$lista=$acciones->ListaConPermiso();
			new Acciones_view($lista);

			if(isset($rtn['code'])){
				//lanzar modal de confirmacion;
				$mensajeModal=$rtn['code'];
				include '../View/Mensaje_Modal.php';
				new Modal($mensajeModal);
			}
		}