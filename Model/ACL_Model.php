<?php 
//session_start();
include_once "Access_DB.php";
//session_start();
class ACL{

	var $login;
	var $permisos;
	var $rol;
	var $db;

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
		$this->rol= $this->getRol();
		$this->permisos=$this->getPermisosRol();
	}

function __destruct(){

}

function getRol(){
		$query="select id_rol from USUARIOS where login='".$this->login."'";
		$sql=$this->db->query($query);
		$return= $sql->fetch_assoc();
		return $return['id_rol'];

	}

function getRolName(){
		$query="select rol from ROLES where id_rol='".$this->rol."'";
	$sql=$this->db->query($query);
	$return= $sql->fetch_assoc();
	return $return['rol'];
}


function getPermisosRol(){
	$permisos=[];
		$query="select id_perm from permisos_roles where( id_rol='".$this->rol."')";
		$sql=$this->db->query($query);
		if($sql->num_rows>0){
		foreach ($sql->fetch_assoc() as $permiso){
			$permisos[]=$this->getPermisoName($permiso);
		}
		return $permisos;
	}

}

function getPermisoName($id){
	$query="select permiso from permisos where id_perm='".$id."'";
	$sql=$this->db->query($query);
		$return= $sql->fetch_assoc();
		return $return['permiso'];

}

function getAllPermisos(){
	$permisos=[];
		$query="select * from permisos";
		$sql=$this->db->query($query);
		foreach ($sql->fetch_assoc() as $permiso){
			$permisos[]=$permiso;
		}
		return $permisos;

}

function getAllRoles(){
	$roles=array();
	$query="select * from roles";
		$sql=$this->db->query($query);
		while ($roles[]=$sql->fetch_assoc()){
			//$roles[]=$rol;
		}
		return $roles;

}

function AddRol($rol){
	$query="INSERT INTO `roles`(`rol`) VALUES ('".$rol."')";
	if($sql=$this->db->query($query)){
		return true;
	}else{
		return '000310'; 
		//No se ha podido añadir el rol
	}

}
function deleteRol($id_rol){
	$query="select * from USUARIOS where id_rol=".$id_rol;
	$sql=$this->db->query($query);
	if($sql->num_rows>1){
		//el rol está asignado a un usuario;
		return '000312';
	}
	$query="delete from roles where id_rol=".$id_rol;
		if($sql=$this->db->query($query)){
		return true;
	}else{
		return '000311'; 
		//No se ha podido añadir el rol
	}
}

function Acceso($permSolicitado){
	$acceso=false;
	foreach($this->permisos as $permiso){
		if($permiso==$permSolicitado){
			$acceso=true;
		}
	}
	return $acceso;

}



} 
