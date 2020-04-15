<?php 

include_once 'Abstract_Model_Class.php';
include_once 'Validar_Model.php';

class Accion extends Abstract_Model{
	var $id_accion;
	var $accion;
	var $descripcion;
	var $erroresdatos=[];

	function __construct($accion,$id_accion='',$descripcion=''){
		$this->id_accion=$id_accion;
		$this->accion=$accion;
		$this->descripcion=$descripcion;
	}
	function __destruct(){

	}


function Validar_atributos(){
	$this->Comprobar_accion();
	$this->Comprobar_descripcion();

	if($this->erroresdatos==[]){
		return true;
	}else{
	return $this->erroresdatos;
	}
}

function Comprobar_accion()
{

	$validar= new Validar();
	if($validar->No_Vacio($this->accion)===false){
		$this->code='000125';
		$this->ok=false;
		$this->resource='accion';
		$this->construct_response();
		array_push($this->erroresdatos, $this->feedback);
	}

	if($validar->Es_alfanumerico($this->accion)===false){
		$this->code='000124';
		$this->ok=false;
		$this->resource='accion';
		$this->construct_response();
		array_push($this->erroresdatos, $this->feedback);
	}
}

function Comprobar_descripcion(){
	$validar= new Validar();
	if($validar->Es_string_espacios($this->descripcion)===false){
		$this->code='000172';
		$this->ok=false;
		$this->resource='descripcion';
		$this->construct_response();
		array_push($this->erroresdatos, $this->feedback);
	}
}

function ADD(){

	if($this->Validar_atributos()!==true){
		return $this->erroresdatos;
	}
		//primero comprobamos que la accion o está ya definida
		
	$existe=$this->getByName();
	if(gettype($existe)!="array"){
		
			//ya existe una entidad on esas caracterísiticas
			$this->ok=false;
			$this->resource='accion_ADD';
			$this->code  = '000326';
			$this->construct_response(); //error
			return $this->feedback;
		}else{

			$this->query="insert into ACCIONES (accion, descripcion )values ('".$this->accion."','".$this->descripcion."')";
			$this->execute_single_query();
			if($this->feedback['code']=='00001')
			{	//asignamos la id creada al objeto mediante la funcion getByNAme;
				
				$this->id_accion=$this->getByName();
				$this->ok=true;
				$this->resource='ADD_rol';
				$this->code  = '000321';
				$this->construct_response(); //modificacion en bd correcta
				
			}
			else
			{	$this->ok=false;
				$this->resource='ADD_rol';
				$this->code  = '000320'; //error al modificar la entidad en la bd
				$this->construct_response();
			}
		return $this->feedback;
		
	}

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
		if(is_array($existe)){
		
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

			$this->ok=true;;
			 $this->code='000323';
			 $this->construct_response();
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
	$this->query="select * from ACCIONES where id_accion like '".$this->id_accion."' or accion like '%".$this->accion."%'";
	$this->get_results_from_query();
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
		$this->query="select * from ACCIONES where accion='".$this->accion."'";
	
		$this->get_one_result_from_query();
		if($this->feedback['ok']===false || $this->feedback['code']=='00007'){
			$this->ok=true;
			$this->code="000324";
			$this->construct_response();
			return $this->feedback;
		}
	
		return $this->rows['id_accion'];
		}

		function ListaConPermiso(){
			$lista=$this->SEARCH();
			$listaConPermisos=[];

			foreach($lista as $accion){

				$this->query="select * from PERMISOS_ROLES where id_accion=".$accion['id_accion'];
				$this->get_results_from_query();
				if($this->feedback['code']=='00007'){
					$tienePermiso= "";
				}else{
					$tienePermiso= "LaAccionEstaAsignadaARol";
				}

				$na=["id_accion"=>$accion['id_accion'],"accion"=>$accion['accion'],"descripcion"=>$accion['descripcion'],"asignada"=>$tienePermiso];
				array_push($listaConPermisos,$na);
				
			}
			return $listaConPermisos;
		}
}
