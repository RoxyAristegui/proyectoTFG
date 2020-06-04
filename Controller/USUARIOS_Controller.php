
<?php

	
	include '../Functions/ControlarAcceso.php';

	
	include '../Model/USUARIOS_Model.php';
	include '../View/USUARIOS_SHOWALL_View.php';
	include '../View/USUARIOS_SEARCH_View.php';
	include '../View/USUARIOS_ADD_View.php';
	include '../View/USUARIOS_EDIT_View.php';
	include_once '../View/USUARIOS_DELETE_View.php';
	include_once '../View/USUARIOS_SHOWCURRENT_View.php';
	include_once '../View/MESSAGE_View.php';
	include_once '../View/Mensaje_Modal.php';

// la función get_data_form() recoge los valores que vienen del formulario por medio de post y la action a realizar, crea una instancia USUARIOS y la devuelve
	function get_data_form(){

		$login = $_POST['login'];
		$password = $_POST['password'];
		$nombre = $_POST['nombre'];
		$apellidos = $_POST['apellidos'];
		$email = $_POST['email'];
		$dni=$_POST['dni'];
		$action = $_POST['action'];
		$id_rol=$_POST['id_rol'];
		
		$usuarios = new USUARIOS_Model($login,$password,$nombre,$apellidos,$email,$dni,$id_rol);
		return $usuarios;
	}
	if (!isset($_REQUEST['action'])){
		$_REQUEST['action'] = '';
	}

// En funcion del action realizamos las acciones necesarias

		Switch ($_REQUEST['action']){
			case 'ADD':
				
				if (!$_POST){ // se incoca la vista de add de usuarios
						$roles= new Rol("","");
					$listaRoles=$roles->SEARCH();

					new USUARIOS_ADD($listaRoles);
				}
				else{
					$USUARIOS = get_data_form(); //se recogen los datos del formulario
					$respuesta = $USUARIOS->ADD();
					
					new MESSAGE($respuesta, '../Controller/USUARIOS_Controller.php');
				}
				break;
			case 'DELETE':
				if (!$_POST){ //nos llega el id a eliminar por get
					$USUARIOS = new USUARIOS_Model($_REQUEST['login'],'','','','','');
					$valores = $USUARIOS->getById();
					$rol = new Rol ('',$valores['id_rol']);
					$rolname=$rol->getById()['rol'];
					new USUARIOS_DELETE($valores,$rolname); 
					//se le muestra al usuario los valores de la tupla para que confirme el borrado mediante un form que no permite modificar las variables 
				}
				else{ // llegan los datos confirmados por post y se eliminan
					$USUARIOS = get_data_form();
					$respuesta = $USUARIOS->DELETE();
					$USUARIOS_ALL = new USUARIOS_Model('','','','','','');
					$datos = $USUARIOS_ALL->SEARCH();

					$lista = array('login','DNI','nombre', 'apellidos','email','rol');

					new USUARIOS_SHOWALL($lista, $datos);
					 new Modal($respuesta['code']);
				//	new MESSAGE($respuesta, '../Controller/USUARIOS_Controller.php');
				}
				break;
			case 'EDIT':
				
				if (!$_POST){ //nos llega el usuario a editar por get
					$USUARIOS = new USUARIOS_Model($_REQUEST['login'],'','','','',''); // Creo el objeto
					$valores = $USUARIOS->getById(); // obtengo todos los datos de la tupla
					$roles= new Rol("","");
					$listaRoles=$roles->SEARCH();

					if (is_array($valores))
					{
						new USUARIOS_EDIT($valores,$listaRoles); //invoco la vista de edit con los datos 
							//precargados
					}else
					{
						new MESSAGE($valores, '../Controller/USUARIOS_Controller.php');
					}
				}else{

					$USUARIOS = get_data_form(); //recojo los valores del formulario
					$respuesta = $USUARIOS->EDIT(); // update en la bd en la bd
					new MESSAGE($respuesta, '../Controller/USUARIOS_Controller.php');
				}

				break;
			case 'SEARCH':
			
				if (!$_POST){
					new USUARIOS_SEARCH();
				}
				else{
					$USUARIOS = get_data_form();
					$datos = $USUARIOS->SEARCH();
					//si no se encuentra ningun resultado se muestra un error

					if(isset($datos['code'])){
						new MESSAGE($datos,'../Controller/USUARIOS_Controller.php?action=SEARCH');
					}else{

						$lista = array('login','DNI','nombre', 'apellidos','email','rol');	
						new USUARIOS_SHOWALL($lista, $datos);
					}

				}
				break;
			case 'SHOWCURRENT':
			
				$USUARIOS = new USUARIOS_Model($_REQUEST['login'],'','','','','');
				$valores = $USUARIOS->getById();
				$rol = new Rol ('',$valores['id_rol']);
				$rolname=$rol->getById()['rol'];
				new USUARIOS_SHOWCURRENT($valores,$rolname);
				break;
			default:
				
					if (!$_POST){
						$USUARIOS = new USUARIOS_Model('','','','','','');
					}
					else{
						$USUARIOS = get_data_form();
					}
					$datos = $USUARIOS->SEARCH();
					$lista = array('login','DNI','nombre','apellidos','email','rol');
					new USUARIOS_SHOWALL($lista, $datos);
				
		}

	//}

?>
