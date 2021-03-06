<?php 

include_once 'Abstract_Model_Class.php';

include_once 'Validar_Model.php';

Class Entidad extends Abstract_Model{
	var $id_entidad;
	var $entidad;
	var $desccripcion;
	var $erroresdatos=[];

function __construct($entidad,$id_entidad='',$descripcion=''){
		$this->id_entidad=$id_entidad;
		$this->entidad=$entidad;
		$this->descripcion=$descripcion;

	}


function Validar_atributos(){
	$this->Comprobar_entidad();
	$this->Comprobar_descripcion();

	if($this->erroresdatos==[]){
		return true;
	}else{
	return $this->erroresdatos;
	}
}

function Comprobar_entidad()
{

	$validar= new Validar();
	if($validar->No_Vacio($this->entidad)===false){
		$this->code='000125';
		$this->ok=false;
		$this->resource='entidad';
		$this->construct_response();
		array_push($this->erroresdatos, $this->feedback);
	}

	if($validar->Es_alfanumerico($this->entidad)===false){
		$this->code='000124';
		$this->ok=false;
		$this->resource='entidad';
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
	
	$existe=$this->getByName();
	if(gettype($existe)!="array"){
		
			//ya existe una entidad on esas caracterísiticas
			$this->ok=false;
			$this->resource='entidad_ADD';
			$this->code  = '000346';
			$this->construct_response(); //error
			return $this->feedback;
	}else{

			$this->query="insert into ENTIDADES (entidad, descripcion )values ('".$this->entidad."','".$this->descripcion."')";
			$this->execute_single_query();
			if($this->feedback['code']=='00001')
			{	//asignamos la id creada al objeto mediante la funcion getByNAme;
				
				$this->id_entidad=$this->getByName();
				$this->ok=true;
				$this->resource='ADD_rol';
				$this->code  = '000341';
				$this->construct_response(); //modificacion en bd correcta
				
			}
			else
			{	$this->ok=false;
				$this->resource='ADD_rol';
				$this->code  = '000340'; //error al modificar la entidad en la bd
				$this->construct_response();
			}
			
			return $this->feedback;
	}


	}

	function EDIT(){

		
		if($this->id_entidad==''){
			$this->ok=false;
			$this->code='000344'; //No se ha podido ha encontrado la entidad
			$this->resource='Edit_Entidad';
			$this->construct_response();
			return $this->feedback;
		}

		//comprobamos si el nombre que le vamos a poner ya está creado. 
		
		$existe=$this->getByName();

		//si no lo está, gettype devolverá un array
		if(gettype($existe)=="array"){

			$this->query='update ENTIDADES set entidad="'.$this->entidad.'" , descripcion ="'.$this->descripcion.'" where id_entidad="'.$this->id_entidad.'"';
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
		}else{
				//ya existe una entidad on esas caracterísiticas
			$this->ok=false;
			$this->resource='entidad_ADD';
			$this->code  = '000346';
			$this->construct_response(); //error
			return $this->feedback;
		}
}
	function DELETE(){

		if($this->id_entidad==''){
			$this->ok=false;
					$this->resource='entidad_DEL';
					$this->code  = '000344';
					$this->construct_response(); //no se ha encontrado la entidad
					return $this->feedback;
		}
		$this->query="DELETE from ENTIDADES where id_entidad= '".$this->id_entidad."'";
		$this->execute_single_query();
		
		if($this->feedback['ok']==true){
			//borrado de las relaciones;
			$this->query="DELETE from PERMISOS where id_entidad='".$this->id_entidad."'";
			$this->execute_single_query();
			$this->query="DELETE from PERMISOS_ROLES where id_entidad=".$this->id_entidad;
			$this->execute_single_query();

			$this->ok=false;;
			$this->code='000343';
		 	$this->construct_response();
			return $this->feedback;
		}else{
		 $this->ok=false;;
		 $this->code='000342';
		 $this->construct_response();
		 return $this->feedback;
		}
	} 

	function SEARCH(){
	$this->query="select * from ENTIDADES where id_entidad like '".$this->id_entidad."' or entidad like '%".$this->entidad."%'";

	$this->get_results_from_query();
	if($this->feedback['ok']===false || $this->feedback['code']=='00007'){
		$this->ok=false;
		$this->code="000344";
		$this->construct_response();
		return $this->feedback;
	}
	return $this->rows;
	}

	
	function getById(){
	$this->query="select * from ENTIDADES where id_entidad = '".$this->id_entidad."' ";
	$this->get_one_result_from_query();
	if($this->feedback['ok']===false || $this->feedback['code']=='00007'){
		$this->ok=false;
		$this->code="000344";
		$this->construct_response();
		return $this->feedback;
	}
	$this->entidad=$this->rows['entidad'];
	$this->descripcion=$this->rows['descripcion'];
	return $this->rows;
	}

	function getByName(){
		$this->query="select * from ENTIDADES where entidad='".$this->entidad."'";
	
		$this->get_one_result_from_query();
		if($this->feedback['ok']===false || $this->feedback['code']=='00007'){
		$this->ok=false;
		$this->code="000344";
		$this->construct_response();
		return $this->feedback;
	}
	
	return $this->rows['id_entidad'];
	}


	function ListaConPermiso(){
		$lista=$this->SEARCH();
		$listaConPermisos=[];

		foreach($lista as $entidad){

			$this->query="select * from PERMISOS_ROLES where id_entidad=".$entidad['id_entidad'];
			$this->get_results_from_query();
			if($this->feedback['code']=='00007'){
				$tienePermiso= "";
			}else{
				$tienePermiso= "LaEntidadEstaAsignadaARol";
			}

			$na=["id_entidad"=>$entidad['id_entidad'],"entidad"=>$entidad['entidad'],"descripcion"=>$entidad['descripcion'],"asignada"=>$tienePermiso];
			array_push($listaConPermisos,$na);
			
		}
		return $listaConPermisos;
	}
}