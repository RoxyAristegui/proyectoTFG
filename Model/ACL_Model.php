<?php 
//session_start();
/*include_once "Access_DB.php";
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
*/

//include_once 'Abstract_Model_Class.php';
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

function getByName(){
	
}

function getPermisosRol(){

		$this->query="select * from permisos_roles where( id_rol='".$this->rol."')";
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


function Acceso($entidadAc,$accionAc){
	$acceso=false;
	if($this->permisos!=NULL){
		foreach($this->permisos as $permiso){
					$entidad=new entidad('',$permiso["id_entidad"]);
					$accion= new accion('',$permiso['id_accion']);
					
				var_dump ($accion->accion);
				var_dump($entidad->entidad);
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
