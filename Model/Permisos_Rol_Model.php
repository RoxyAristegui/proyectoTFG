<?php 

include_once 'Abstract_Model_Class.php';

class Permisos_Rol extends Abstract_Model{
		var $id_entidad;
	var $id_accion;
	var $id_rol;
	function __construct($id_rol,$id_entidad='',$id_accion=''){
		$this->id_entidad=$id_entidad;
		$this->id_accion=$id_accion;
		$this->id_rol=$id_rol;
	}

function ADD(){
	$this->query="INSERT into PERMISOS_ROLES (id_rol,id_entidad,id_accion) values('".$this->id_rol."','".$this->id_entidad."','".$this->id_accion."')";
	$this->execute_single_query();
	return $this->feedback;
}

function DELETE(){
	$this->query="DELETE from PERMISOS_ROLES where id_rol=".$this->id_rol." and id_entidad=".$this->id_entidad." and id_accion=".$this->id_accion;
	$this->execute_single_query();
	return $this->feedback;
}

function EDIT(){

}
function SEARCH(){

}

function getByName(){}

	function getById(){

		$this->query="select * from PERMISOS_ROLES where (id_rol='".$this->id_rol."')";
		$this->get_results_from_query();
		$permisos=array();
		if($this->feedback['ok']===true){
			foreach($this->rows as $row){
				$permiso=["id_entidad"=>$row['id_entidad'],"id_accion"=>$row['id_accion']];
			array_push($permisos, $permiso);
			}
		
			return $permisos;
		
		}else{
			$this->ok=false;
			$this->code="000330";
			$this->resource='getPermisosRol';	
			$this->construct_response();
			return $this->feedback;
		}
	}
}