<?php

include 'Abstract_model_Class.php';

Class Rol_Model extends Abstract_model{
	var $id_rol;
	var $rol;
	var $descripcion;

 function __construct($id_rol,$rol='',$descripcion=''){
 	$this->id_rol=$id_rol;
	$this->rol=$rol;
	$this->descripcion=$descripcion;

 }

 function ADD(){

	$this->query="insert into ROLES (rol, descripcion ) values (".$this->rol.",'".$this->descripcion."'')";
	$this->execute_single_query();
	if ($this->feedback['code']==='00001')
		{
			$this->ok=true;
			$this->resource='ADD';
			$this->code  = '000311';
			$this->construct_response(); //modificacion en bd correcta
		}
		else
		{	$this->ok=false;
			$this->resource='ADD';
			$this->code  = '000315'; //error al modificar el rol en la bd
			$this->construct_response();
		}
		return $this->feedback;
 }

 function EDIT(){
	$this->query="UPDATE USUARIOS SET rol='".$this->rol."' , descripcion='".$this->descripcion."' where id_rol = "$this->id_rol;
	$this->execute_single_query();
	if ($this->feedback['code']==='00001')
		{
			$this->ok=true;
			$this->resource='ADD';
			$this->code  = '000311';
			$this->construct_response(); //modificacion en bd correcta
		}
		else
		{	$this->ok=false;
			$this->resource='ADD';
			$this->code  = '000315'; //error al modificar el rol en la bd
			$this->construct_response();
		}
		return $this->feedback;
 }


 //devuelve un rol buscaado o todos si no se envian parámetros;
 function SEARCH(){
 	$this->query="select * from ROLES where id_rol like '".$this->id_rol."' ";
	$this->get_result_from_query();
	if($this->feedback['ok']===false || $this->feedback['code']=='00007'){
		$this->ok=true;
		$this->code="000314";
		$this->construct_response();
		return $this->feedback;
	}
	return $this->rows;
 }

 function DELETE(){
	$this->query="select * from USUARIOS where id_rol=".$this->id_rol;
	get_one_result_from_query();
	if($feedback['code']=='00007'{
		//el rol está asignado a un usuario;
		$this->ok=false;
		$this->code= '000313';
		$this->construct_response();
		return $this->feedback;
	}

	$this->query="delete from roles where id_rol=".$this->id_rol;
	execute_single_query();
	
	if($this->feedback['ok']===true){
		$this->code="000055"; //Borrado realizado con exito;
		$this->ok=true;
		$this->construct_response();
		return $this->feedback;
	}else{
		$this->code="000312";
		$this->ok=false;
		$this->construct_response();
		return $this->feedback; 
		//No se ha podido añadir el rol
	}
 }

 function getById(){
	$this->query="select * from ROLES where id_rol='".$this->id_rol."'";
	$this->get_one_result_from_query();
	if($this->feedback['ok']===false || $this->feedback['code']=='00007'){
		$this->ok=true;
		$this->code="000314";
		$this->construct_response();
		return $this->feedback;
	}
	return $this->rows;

 }


//Esto pasarlo a la pantalla de usuariooooooos
 function getRolUsuario($login){
 		$this->query="select id_rol from USUARIOS where login='".$login."'";
		$this->get_one_result_from_query();

		if($this->feedback['ok']===false || $this->feedback['code']=='00007'){
			$this->ok=true;
			$this->code="000314";
			$this->construct_response();
			return $this->feedback;
		}
		$this->$id_rol=$this->rows['id_rol'];

		return $this->rows['id_rol'];
 }


function setRolUsuario($nuevo_id){
	$this->query="UPDATE USUARIOS SET id_rol = "$nuevo_id;
	$this->execute_single_query();
	if ($this->feedback['code']==='00001')
		{
			$this->ok=true;
			$this->resource='EDIT';
			$this->code  = '000311';
			$this->construct_response(); //modificacion en bd correcta
		}
		else
		{	$this->ok=false;
			$this->resource='EDIT';
			$this->code  = '000315'; //error al modificar el rol en la bd
			$this->construct_response();
		}
		return $this->feedback;
}