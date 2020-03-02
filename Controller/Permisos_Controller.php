<?php
include "../Model/ACL_Model.php";
include "../View/Roles_View.php";

	$acl=new ACL();
	if (!isset($_REQUEST['action'])){
		$_REQUEST['action'] = '';
	}
	$acl=new ACL();
// En funcion del action realizamos las acciones necesarias

		Switch ($_REQUEST['action']){
			case 'SHOW_ROLES':
				//mostrar los roles
				
				$roles=$acl->getAllRoles();
				new RolesView($roles);
				break;
		case'SHOW_ADD_ROL':
			//mostrar y añadir roles
			if($_REQUEST['rol']!=''){
				$add=$acl->AddRol($_REQUEST['rol']);
					if($add!==true){
						include "../View/MESSAGE_View.php";
						new MESSAGE($add,"../Controller/Permisos_Controller.php");
						break;
					}
						$_REQUEST['rol']='';
					
				
			}
				$roles=$acl->getAllRoles();
				new RolesView($roles);
				break;
			default:
				$roles=$acl->getAllRoles();
				new RolesView($roles);
				break;
}