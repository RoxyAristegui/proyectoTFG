<?php 

include 'Abstract_Model_Class.php';

Class Entidades extends Abstract_Model{
	$id_entidad;
	$entidad;
	$desccripcion;
		function __construct($entidad,$id_entidad='',$descripcion=''){
		$this->id_entidad=$id_entidad;
		$this->entidad=$entidad;
		$this->descripcion=$descripcion;
	}

	function ADD(){

		$this->query="insert into Entidades (entidad, descripcion )values ('".$this->entidad."','".$this->descripcion."'')";
		$this->execute_single_query();
		return $this->feedback;	

	}

	function EDIT(){
		$this->query='update Entdades set entidad="'.$this->entidad.'" , descripcion ="'.$this->descripcion.'" where id_entidad="'.$id_entidad.'"';
		$this->execute_single_query();
	if ($this->feedback['code']==='00001')
		{
			$this->ok=true;
			$this->resource='entidad_Edit';
			$this->code  = '000054';
			$this->construct_response(); //modificacion en bd correcta
		}
		else
		{	$this->ok=false;
			$this->resource='entidad_Edit';
			$this->code  = '000074'; //error al modificar el rol en la bd
			$this->construct_response();
		}
		return $this->feedback;
	}

	function DELETE(){

		$this->query="DELETE from entidadES where id_entidad= '".$this->entidad."'";
		$this->execute_single_query();

		if($this->feedback['ok']==true){
			//borrado de las relaciones;
			$this->query="delete from permisos_entidades where id_entidad='".$this->id_entidad."'";
			$this->execute_single_query();
			$this->query="delete from permisos_roles where id_entidad=".$this->id_entidad;
			$this->execute_single_query();
			
		}
		 $this->ok=false;;
		 $this->code='000322';
		 $this->construct_response();
		 return $this->feedback;
		
	} 

	function SEARCH(){
	$this->query="select * from ENTIDADES where id_entidad like '".$this->id_entidad."' and entidad like '%".$this->entidad."%'";
	$this->get_result_from_query();
	if($this->feedback['ok']===false || $this->feedback['code']=='00007'){
		$this->ok=true;
		$this->code="000324";
		$this->construct_response();
		return $this->feedback;
	}
	return $this->rows;
	}

	
	function getById(){
	$this->query="select * from ENTIDADES where id_entidad = '".$this->id_entidad."' ";
	$this->get_result_from_query();
	if($this->feedback['ok']===false || $this->feedback['code']=='00007'){
		$this->ok=true;
		$this->code="000324";
		$this->construct_response();
		return $this->feedback;
	}
	return $this->rows;
	}
}