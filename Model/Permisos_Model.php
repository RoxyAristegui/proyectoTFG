<?php

/*
Esta clase define los permisos existentes, que corresponde ala tabla permisos con la relacion
de las entidades y las acciones */

include 'Abstract_Model_Class.php';
include 'Acciones_Model.php';
include 'Entidades_Model.php';
include 'Rol_Model.php';


class Permisos extends Abstract_Model{
	function __construct(){
		$id_entidad;
		$id_accion;
	}
	function ADD(){
		$this->query="insert into permisos (id_entidad,id_accion) values (".$this->id_entidad.",".$this->id_accion."'");
	}
	function EDIT(){

	}
	function DELETE(){
		$this->query="delete from permisos where id_entidad=".$this->id_entidad." and id_accion=".$this->id_accion;

	}
	function SEARCH(){
		$this->query="select * from permisos where id_entidad like ".$this->id_entidad." and id_accion like ".$this->id_accion;
	}
	function getById(){

	}

}

class ACL extends Abstract_Model{

	var $login;
	var $permisos;
	var $rol;

	//el contructor inicializa la creacion del objeto sesion
function __construct($login=''){
		

		if($login!=''){
			$this->login=$login;
		}else{
			if(isset($_SESSION['login'])){
				$this->login=$_SESSION['login'];
			}else{
				$this->login='';
			}
		}
		$this->db=ConnectDB();
		$rol= new Rol();
		$this->rol=$rol->getRolUsuario();
		$this->getPermisosUsuario();
	}

function __destruct(){

}
function ADD(){
	$this->query="insert into permisos_roles (id_rol,id_permiso,id_accion) values('".$this->id_rol."','".$this->id_permiso."','".$this->id_accion."')";
}

function DELETE(){
	$this->query="delete from permisos_roles where id_rol='".$this->id_rol."' and id_permiso = '".$this->id_permiso."' and id_accion='".$this->id_accion."'";
}

function EDIT(){

}
function SEARCH(){

}

//obtiene todos los permisos por usuarios
function getById(){

}

function getPermisosUsuario(){

		$this->query="select id_entidad,id_accion from permisos_roles where( id_rol='".$this->rol."')";
		$this->get_results_from_query();
		if($this->feedback===true){
			$this->permisos=$this->rows;
			
		}else{
			$this->ok=false;
			$this->code="000330";
			$this->construct_response();
			return $this->feedback;
		}

}


function Acceso($entidadAc,$accionAc){
	$acceso=false;
	foreach($this->permisos as $permiso){
				$entidad=new entidad('',$permiso["id_entidad"]);
				$accion= new accion('',$permiso['id_accion']);
				$entidad=$entidad->getById();
				$accion=$accion->getById();
				
		if($accionAc==$accion->accion && $entidadAc==$entidad->entidad){
			$acceso=true;
		}
	}
	return $acceso;

}


}