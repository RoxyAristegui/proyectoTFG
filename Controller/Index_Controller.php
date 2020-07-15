<?php
//session
session_start();
//incluir funcion autenticacion
include_once '../Functions/Authentication.php';
include_once '../Model/USUARIOS_Model.php';
//si no esta autenticado
if (!IsAuthenticated()){
	
	header('Location: ../index.php');

}
//esta autenticado
else{

//comprobamos el rol para mosrarle una vista personalizada
	$user= new USUARIOS_Model($_SESSION['login'],'','','','','');
	$rol_user=$user->getRol();
	
	//si el usuario es proveedor
	if($rol_user=='4'){

		if($user->proveedor_creo_empresa()===false){
			header('Location: PROVEEDORES_Controller.php?action=ADD');
		
		}else{
				//TODO cambiar por proveedor index view
			include '../View/users_index_View.php';
			new Index();
		}

	}else{

		include '../View/users_index_View.php';
		new Index();
	}
}

?>