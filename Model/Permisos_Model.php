<?php

/*
Esta clase define los permisos existentes, que corresponde ala tabla permisos con la relacion
de las entidades y las acciones */

//include_once 'Abstract_Model_Class.php';
include 'Acciones_Model.php';
include 'Entidades_Model.php';
include 'Rol_Model.php';


class Permisos extends Abstract_Model{
	var $id_entidad;
	var $id_accion;
	function __construct($id_entidad,$id_accion){
		$this->id_entidad=$id_entidad;
		$this->id_accion=$id_accion;
	}

	function ADD(){
		$this->query="insert into permisos (id_entidad,id_accion) values (".$this->id_entidad.",".$this->id_accion."')";
		$this->execute_single_query();
		return $this->feedback;
	}
	function EDIT(){

	}
	function DELETE(){
		$this->query="delete from permisos where id_entidad=".$this->id_entidad." and id_accion=".$this->id_accion;
		$this->execute_single_query();
		return $this->feedback;
	}
	function SEARCH(){
		
	//$this->query="select * from permisos where id_entidad like ".$this->id_entidad." and id_accion like ".$this->id_accion;
	$this->query="select * from permisos";
		$this->get_results_from_query();
		if($this->feedback['ok']===true){
			return $this->rows;
		}else{
			return $this->feedback;
		}
		
	}

	//Recoge los permisos por entidad
	function getById(){
	$this->query="select * from permisos where id_entidad = ".$this->id_entidad;
	$this->get_results_from_query();
		if($this->feedback['ok']===true){
			return $this->rows;
		}else{
			return $this->feedback;
		}
	}

	function getByName(){
		
	}

}
