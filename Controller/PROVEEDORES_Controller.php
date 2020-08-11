
<?php



	include '../Functions/ControlarAcceso.php';

	include_once '../Model/PROVEEDORES_Model.php';
	include_once '../View/PROVEEDORES_ADD_View.php';
	include_once '../View/PROVEEDORES_EDIT_View.php';
	include_once '../View/PROVEEDORES_SHOWALL_View.php';
	include_once '../View/PROVEEDORES_SHOWCURRENT_View.php';
	include_once '../View/PROVEEDORES_DELETE_View.php';
	include_once '../View/PROVEEDORES_SEARCH_View.php';

	include_once '../Model/USUARIOS_Model.php';
	include_once '../View/MESSAGE_View.php';
	include_once '../View/Mensaje_Modal.php';


	Function get_data_form(){
		 $empresa=$_POST['empresa'];
		 $CIF=$_POST['CIF'];
		 $direccion=$_POST['direccion'];
		 $localidad=$_POST['localidad'];
		 $CP=$_POST['CP'];
		 $email=$_POST['email'];
		 $telefono=$_POST['telefono'];
		 $movil=$_POST['movil'];
		 $pers_contacto=$_POST['pers_contacto'];

		 $prov= new PROVEEDORES_Model($CIF, $empresa, $direccion, $localidad, $CP, $email, $telefono, $movil, $pers_contacto);
		 return $prov;
	}


if (!isset($_REQUEST['action'])){

		$_REQUEST['action'] = '';
		if($_SESSION['rol']=='4'){
			$_REQUEST['action']=='SHOWCURRENT';
		}
	}



Switch ($_REQUEST['action']){
	case 'ADD':
				
				$user= new USUARIOS_Model($_SESSION['login'],'','','','','');

				if($user->proveedor_creo_empresa()===true && $_SESSION['rol']=='4'){
					//si ya tiene una cuenta de proveedor, un usuario no puede volver a añadirla
					header('Location: PROVEEDORES_Controller.php?action=SHOWCURRENT');
				}
				if (!$_POST){
				    // se invoca la vista de add de usuarios
					
					new PROVEEDORES_ADD();

				}else{
					$prov = get_data_form(); //se recogen los datos del formulario
					$respuesta = $prov->ADD();
					
					new MESSAGE($respuesta, '../Controller/PROVEEDORES_Controller.php');
				}
			
				break;
	case 'EDIT':
				
				if (!$_POST){ // se incoca la vista de add de usuarios
					$CIF=$_REQUEST['CIF'];
					$prov=new PROVEEDORES_Model($CIF,'','','','','','','','');
					$datos=$prov->getById();
					new PROVEEDORES_EDIT($datos);
				}
				else{
					$prov = get_data_form(); //se recogen los datos del formulario
					$respuesta = $prov->EDIT();
					
					new MESSAGE($respuesta, '../Controller/PROVEEDORES_Controller.php');
				}
				break;
	case 'DELETE':
				if (!$_POST){ // se incoca la vista de add de usuarios
					$CIF=$_REQUEST['CIF'];
					$prov=new PROVEEDORES_Model($CIF,'','','','','','','','');
					$datos=$prov->getById();
					new PROVEEDORES_DELETE($datos);
				}
				else{
					$prov = get_data_form(); //se recogen los datos del formulario
					$respuesta = $prov->DELETE();
					
					new MESSAGE($respuesta, '../Controller/PROVEEDORES_Controller.php');
				}
				break;
	case 'SHOWCURRENT':
		if(isset($_REQUEST['CIF'])){
				$CIF=$_REQUEST['CIF'];
				$prov=new PROVEEDORES_Model($CIF,'','','','','','','','');
				$datos=$prov->getById();
			}else{
				$prov=new PROVEEDORES_Model('','','','','','','','','');
				$datos=$prov->getByAdmin($_SESSION['login']);
				if(isset($datos['code']) && $datos['code']=='004080'){
				    //El proveedor aun no creo sus datos de empresa
                    header('Location: PROVEEDORES_Controller.php?action=ADD');
                }
			}
				new PROVEEDORES_SHOWCURRENT($datos);		
				break;
    case 'SEARCH':
        if(!$_POST){

			new PROVEEDORES_SEARCH();

        }else{
            	$prov = get_data_form(); //se recogen los datos del formulario
            $datos = $prov->SEARCH();

            $campos = array("empresa", "CIF", "direccion", "localidad", "CP", "telefono", "movil", "pers_contacto", "email");
            new PROVEEDORES_SHOWALL($campos, $datos);

        }break;
	default:
	    if($_SESSION['rol']==4){
	        header('Location: PROVEEDORES_Controller.php?action=SHOWCURRENT');
        }else {
            if (!$_POST) {
                $prov = new PROVEEDORES_Model('', '', '', '', '', '', '', '', '');
            } else {
                $prov = get_data_form();
            }
            $datos = $prov->SEARCH();


            $campos = array("empresa", "CIF", "direccion", "localidad", "CP", "telefono", "movil", "pers_contacto", "email");
            new PROVEEDORES_SHOWALL($campos, $datos);
        }
				break;	
			}