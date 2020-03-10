<?php 

include_once 'Abstract_Model_Class.php';

class Accion extends Abstract_Model{
	var $id_accion;
	var $accion;
	var $descripcion;

	function __construct($accion,$id_accion='',$descripcion=''){
		$this->id_accion=$id_accion;
		$this->accion=$accion;
		$this->descripcion=$descripcion;
	}
	function __destruct(){

	}

	function ADD(){
		
		//primero comprobamos que la accion o está ya definida
		$this->getByName();
		
		if($this->feedback['ok']===true){
			//ya existe una entidad on esas caracterísiticas
			$this->ok=false;
			$this->resource='accion_ADD';
			$this->code  = '000326';
			$this->construct_response(); //error
			return $this->feedback;
		}
		
		$this->query="insert into ACCIONES (accion, descripcion )values ('".$this->accion."','".$this->descripcion."')";
		$this->execute_single_query();
		if($this->feedback['ok']===true){
			$this->getByName();

		}
		return $this->feedback;
		
	

	}

	function EDIT(){

		if($this->id_accion==''){
			$this->ok=false;
				$this->resource='accion_Edit';
				$this->code  = '000324';
				$this->construct_response(); //no se ha encontrado la accion
				return $this->feedback;
		}

		$id_accion=$this->id_accion;
		$existe=$this->getByName();
		//comprueba si ya existe otra accion con el mismo nombre que vamos a actualizar
		if( $existe==$id_accion){
		
			$this->query='update acciones set accion="'.$this->accion.'" , descripcion ="'.$this->descripcion.'" where id_accion="'.$this->id_accion.'"';
			$this->execute_single_query();
			if ($this->feedback['code']==='00001')
			{
				$this->ok=true;
				$this->resource='accion_Edit';
				$this->code  = '000054';
				$this->construct_response(); //modificacion en bd correcta
			}
			else
			{
				$this->ok=false;
				$this->resource='accion_Edit';
				$this->code  = '000074'; //error al modificar el rol en la bd
				$this->construct_response();
			}			

		}else{
				$this->ok=false;
				$this->resource='accion_Edit';
				$this->code  = '000326'; //error al modificar el rol en la bd
				$this->construct_response();
	}
	return $this->feedback;
	}

	function DELETE(){
		if($this->id_accion==''){
			$this->ok=false;
			$this->resource='accion_ADD';
			$this->code  = '000324';
			$this->construct_response(); //error no se ha encontrado la accion
			return $this->feedback;
		}
		$this->query="DELETE from ACCIONES where id_accion= '".$this->id_accion."'";
		
		$this->execute_single_query();
		if($this->feedback['ok']==true){
			
			$this->query="delete from permisos where id_accion='".$this->id_accion."'";
			$this->execute_single_query();
			$this->query="delete from permisos_roles where id_accion=".$this->id_accion;
			$this->execute_single_query();
			 return $this->feedback;
				//}

			}else{
		//}
		 $this->ok=false;;
		 $this->code='000322';
		 $this->construct_response();
		 return $this->feedback;
		}
	} 

	function SEARCH(){
	$this->query="select * from ACCIONES where id_accion like '".$this->id_accion."' or accion like '".$this->accion."'";
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
	$this->query="select * from ACCIONES where id_accion = '".$this->id_accion."' ";
	$this->get_one_result_from_query();
	if($this->feedback['ok']===false || $this->feedback['code']=='00007'){
		$this->ok=true;
		$this->code="000324";
		$this->construct_response();
		return $this->feedback;
	}
	$this->accion=$this->rows['accion'];
	$this->descripcion=$this->rows['descripcion'];
	return $this->rows;
	}

	function getByName(){
		$this->query="select * from acciones where accion='".$this->accion."'";
	
		$this->get_one_result_from_query();
		if($this->feedback['ok']===false || $this->feedback['code']=='00007'){
			$this->ok=true;
			$this->code="000324";
			$this->construct_response();
			return $this->feedback;
		}
		$this->id_accion=$this->rows['id_accion'];
		$this->descripcion=$this->rows['descripcion'];
		return $this->rows['id_accion'];
		}
}
