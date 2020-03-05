<?php 

include 'Abstract_Model_Class.php';

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
		//Para acciones nuevas
		if($this->id_accion==''){
				$this->query="insert into ACCIONES (accion, descripcion )values ('".$this->accion."','".$this->descripcion."')";
				echo $this->query;
		$this->execute_single_query();
		if($this->feedback['ok']===true){
			$this->id_accion=$this->getIdByName();

		}
		return $this->feedback;
		}else{
			//PAra acciones que ya tienen un id_accion asignado 
			$this->query="insert into ACCIONES (id_accion,accion, descripcion )values (".$this->id_accion."'".$this->accion."','".$this->descripcion."'')";
			echo $this->query;
		$this->execute_single_query();
		return $this->feedback;
		}
	

	}

	function EDIT(){
		if($this->id_accion!=''){
			$this->query='update acciones set accion="'.$this->accion.'" , descripcion ="'.$this->descripcion.'" where id_accion="'.$this->id_accion.'"';
			$this->execute_single_query();
			echo $this->query."<br>";
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
				$this->code  = '000324'; //error al modificar el rol en la bd
				$this->construct_response();
	}
	return $this->feedback;
	}

	function DELETE(){

		$this->query="DELETE from ACCIONES where id_accion= '".$this->id_accion."'";
		echo $this->query."<br>";
		$this->execute_single_query();
		if($this->feedback['ok']==true){
			
			$this->query="delete from permisos_acciones where id_accion='".$this->id_accion."'";
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
	$this->query="select * from ACCIONES where id_accion like '".$this->id_accion."' and accion like '%".$this->accion."%'";
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
	return $this->rows;
	}

	function getIdByName(){
		$this->query="select id_accion from acciones where accion='".$this->accion."'";
	
		$this->get_one_result_from_query();
		if($this->feedback['ok']===false || $this->feedback['code']=='00007'){
		$this->ok=true;
		$this->code="000324";
		$this->construct_response();
		return $this->feedback;
	}
	$this->id_accion=$this->rows['id_accion'];
	return $this->rows['id_accion'];
	}
}
