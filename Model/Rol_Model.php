<?php

include_once 'Abstract_Model_Class.php';

Class Rol extends Abstract_model{
	var $id_rol;
	var $rol;
	var $descripcion;

 function __construct($rol,$id_rol='',$descripcion=''){
 	$this->id_rol=$id_rol;
	$this->rol=$rol;
	$this->descripcion=$descripcion;

 }

 function __destruct(){

 }

 function ADD(){

	$existe=$this->getByName();
	if(gettype($existe)=="array"){
		
		$this->query="insert into ROLES (rol, descripcion ) values ('".$this->rol."','".$this->descripcion."')";	
		$this->execute_single_query();
		if ($this->feedback['code']==='00001')
		{	//asignamos la id creada al objeto mediante la funcion getByNAme;
			
			$this->id_rol=$this->getByName();
			$this->ok=true;
			$this->resource='ADD_rol';
			$this->code  = '000311';
			$this->construct_response(); //modificacion en bd correcta
			
		}
		else
		{	$this->ok=false;
			$this->resource='ADD_rol';
			$this->code  = '000315'; //error al modificar el rol en la bd
			$this->construct_response();
		}
		
	}else{
		$this->ok=false;
			$this->resource='ADD_rol';
			$this->code  = '000316'; //error al modificar el rol en la bd
			$this->construct_response();
	}
	return $this->feedback;
 }

 function EDIT(){


if($this->id_rol==''){
	$this->ok=false;
		$this->code='000314'; //No se ha podido modificar el rol
		$this->resource='Edit_rol_no';
		$this->construct_response();
		return $this->feedback;
}

//comprobamos si el nombre que le vamos a poner ya está creado. 
$existe=$this->getByName();

//si existiera un rol con ese nombre devolvería un número, sino devuelve el array de error.
if(is_array($existe)){
	$this->query="UPDATE ROLES SET rol='".$this->rol."' , descripcion='".$this->descripcion."' where id_rol = '".$this->id_rol."'";
	$this->execute_single_query();
	if ($this->feedback['code']==='00001')
		{
			$this->ok=true;
			$this->resource='Edit_rol';
			$this->code  = '000311';
			$this->construct_response(); //modificacion en bd correcta
		}
		else
		{	$this->ok=false;
			$this->resource='Edit_rol';
			$this->code  = '000315'; //error al modificar el rol en la bd
			$this->construct_response();
		}
		

	}else{
		$this->ok=false;
			$this->resource='Edit_rol';
			$this->code  = '000316'; //ya existe un rol con ese nombre
			$this->construct_response();
		
	}
	return $this->feedback;
 }


 //devuelve un rol buscaado o todos si no se envian parámetros;
 function SEARCH(){
 	$this->query="select * from ROLES where id_rol like '".$this->id_rol."' or rol like '%".$this->rol."%' ";
	$this->get_results_from_query();
	if($this->feedback['ok']===false || $this->feedback['code']=='00007'){
		$this->ok=false;
		$this->code="000314";
		$this->construct_response();
		return $this->feedback;
	}
	return $this->rows;
 }


 function DELETE(){
 	if($this->id_rol!=''){
	$existe=$this->SEARCH();
	if(isset($existe->rows)){
			//el rol está asignado a un usuario;
		$this->ok=false;
		$this->code= '000313';
		$this->construct_response();
		return $this->feedback;
	}

	$this->query='delete from ROLES where id_rol='.$this->id_rol;
	$this->execute_single_query();
	
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
		//No se ha podido eliminar el rol
	}
}else{
	$this->code="000314";
		$this->ok=false;
		$this->construct_response();
		return $this->feedback; 
}

}

 function getById(){
	$this->query="select * from ROLES where id_rol='".$this->id_rol."'";
	$this->get_one_result_from_query();
	if($this->feedback['ok']===false || $this->feedback['code']=='00007'){
		$this->ok=false;
		$this->code="000314";
		$this->construct_response();
		return $this->feedback;
	}
	$this->rol=$this->rows['rol'];
	$this->descripcion=$this->rows['descripcion'];
	return $this->rows;

 }

function getByName(){
		$this->query="select * from roles where rol='".$this->rol."'";
	
		$this->get_one_result_from_query();
		if($this->feedback['ok']===false || $this->feedback['code']=='00007'){
		$this->ok=false;
		$this->code="000314";
		$this->construct_response();
		return $this->feedback;
	}
	
	return $this->rows['id_rol'];
	}


//Esto pasarlo a la pantalla de usuariooooooos
 function getRolUsuario($login){
 		$this->query="select id_rol from USUARIOS where login='".$login."'";
		$this->get_one_result_from_query();

		if($this->feedback['ok']===false || $this->feedback['code']=='00007'){
			$this->ok=false;
			$this->code="000314";
			$this->construct_response();
			return $this->feedback;
		}
	
		$this->id_rol=$this->rows['id_rol'];
		return $this->rows['id_rol'];
 }


function setRolUsuario($login){
	$this->query="UPDATE USUARIOS SET id_rol = ".$this->id_rol." where login='".$login."'";
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

}
