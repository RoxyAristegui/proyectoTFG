<?php 
session_start();

include_once 'Permisos_Model.php';

class ACL extends Abstract_Model{

	var $login;
	var $permisos=array();
	var $rol;

	//el contructor inicializa la creacion del objeto sesion
function __construct($login=''){
		
	$this->login=$login;
	if($this->login==''){
		if(isset($_SESSION['login'])){
			$this->login=$_SESSION['login'];
		}else{
			//si el usuario no ha iniciado sesión, mandarlo a ello
			header('Location: ../Controller/Login_Controller.php');
	
		}
	}

	$rol= new Rol('');
	$this->rol=$rol->getRolUsuario($this->login);
	$this->getPermisosRol();
	}

function __destruct(){

}
function ADD(){
	$this->query="insert into PERMISOS_ROLES (id_rol,id_permiso,id_accion) values('".$this->id_rol."','".$this->id_permiso."','".$this->id_accion."')";
}

function DELETE(){
	$this->query="delete from PERMISOS_ROLES where id_rol='".$this->id_rol."' and id_permiso = '".$this->id_permiso."' and id_accion='".$this->id_accion."'";
}

function EDIT(){

}
function SEARCH(){

}

//obtiene todos los permisos por usuarios
function getById(){

}

function getByName(){

}

function getPermisosRol(){

		$this->query="select * from PERMISOS_ROLES where( id_rol='".$this->rol."')";
		$this->get_results_from_query();

		if($this->feedback['ok']===true){
			foreach($this->rows as $row){
				$permiso=["id_entidad"=>$row['id_entidad'],"id_accion"=>$row['id_accion']];
			array_push($this->permisos, $permiso);
			}
		
			return $this->permisos;
		
		}else{
			$this->ok=false;
			$this->code="000330";
			$this->resource='getPermisosRol';	
			$this->construct_response();
			return $this->feedback;
		}

}


function Acceso($entidadAc,$accionAc="SHOWALL"){
	if($accionAc==''){
		$accionAC="SHOWALL";
	}
	print_r($this->login);
	print_r($this->permisos);
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


}


