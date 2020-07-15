<?php 
session_start();

include_once 'Acciones_Model.php';
include_once 'Entidades_Model.php';
include_once 'Rol_Model.php';
include_once 'Permisos_Rol_Model.php';


class ACL{

	var $login;
	var $permisos=array();
	var $rol;

	//el contructor inicializa la creacion del objeto sesion
function __construct($login=''){
		
	$this->login=$login;
	$this->Autenticado();
	
	$this->rol=$_SESSION['rol'];
	
	$permiso= new Permisos_Rol($this->rol);
	$this->permisos=$permiso->getById();
	//$this->getPermisosRol();
	}

function __destruct(){

}
function Acceso($entidadAc,$accionAc){
	
	$acceso=false;
	if($this->permisos!=NULL){
		foreach($this->permisos as $permiso){
					$entidad=new entidad('',$permiso["id_entidad"]);
					$accion= new accion('',$permiso['id_accion']);
					$entidad->getById();
					$accion->getById();
			if($accionAc==$accion->accion && $entidadAc==$entidad->entidad){
				$acceso=true;
			}
		}
		return $acceso;

	}else{
		return false;
	}

}

function Autenticado(){
	if($this->login==''){
		if(isset($_SESSION['login'])){
			$this->login=$_SESSION['login'];
		}else{
			//si el usuario no ha iniciado sesión, mandarlo a ello
			header('Location: ../Controller/Login_Controller.php');
	
		}
	}

}


}


