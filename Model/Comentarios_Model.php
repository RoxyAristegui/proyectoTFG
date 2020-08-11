<?php

include_once 'Abstract_Model_Class.php';
include_once 'Validar_Model.php';
include_once 'ACTUACIONES_Model.php';

class Comentarios_Model extends Abstract_Model{

 var $codigo_obra;
 var $id_acto;
 var $id_coment;
 var $login;
 var $fotos=[];
 var $descripcion;
 var $erroresdatos=[];

 function __construct($id_coment,$codigo_obra,$id_acto,$login,$fotos,$descripcion)
 {
     $this->codigo_obra=$codigo_obra;
     $this->id_acto=$id_acto;
     $this->id_coment=$id_coment;
     $this->login=$login;
     $this->fotos=$fotos;
     $this->descripcion=$descripcion;
 }

  function Validar_atributos(){
     $this->Comprobar_id_acto();
     $this->Comprobar_codigo();
     $this->Comprobar_login();
     $this->Comprobar_descripcion();

	if($this->erroresdatos==[]){
		return true;
	}else{
	return $this->erroresdatos;
	}
 }


//Comprueba elcodigo de la obra
//no puede estar vacio
//tiene solo números y menor de 11 caracteres
function Comprobar_codigo(){
	$validar= new Validar();
	if($validar->No_vacio($this->codigo_obra)===false){
		$this->code='005111';
		$this->ok=false;
		$this->resource='codigo_obra';
		$this->construct_response();
		array_push($this->erroresdatos, $this->feedback);
	}

	if($validar->Longitud_maxima($this->codigo_obra,11)===false){
		$this->code='005112';
		$this->ok=false;
		$this->resource='codigo_obra';
		$this->construct_response();
		array_push($this->erroresdatos, $this->feedback);
	}

	if($validar->Es_numerico($this->codigo_obra)===false){
		$this->code='005113';
		$this->ok=false;
		$this->resource='codigo_obra';
		$this->construct_response();
		array_push($this->erroresdatos, $this->feedback);
	}

	return $this->erroresdatos;
}
//Comprueba el id de la actuacion
//no puede estar vacio
//tiene solo números y menor de 11 caracteres
function Comprobar_id_acto(){
	$validar= new Validar();
	if($validar->No_vacio($this->id_acto)===false){
		$this->code='005111';
		$this->ok=false;
		$this->resource='id_acto';
		$this->construct_response();
		array_push($this->erroresdatos, $this->feedback);
	}

	if($validar->Longitud_maxima($this->id_acto,11)===false){
		$this->code='005112';
		$this->ok=false;
		$this->resource='id_acto';
		$this->construct_response();
		array_push($this->erroresdatos, $this->feedback);
	}

	if($validar->Es_numerico($this->id_acto)===false){
		$this->code='005113';
		$this->ok=false;
		$this->resource='id_acto';
		$this->construct_response();
		array_push($this->erroresdatos, $this->feedback);
	}

	return $this->erroresdatos;
}

//Comprueba el login
//no puede estar vacio
//tiene solo números y menor de 11 caracteres
function Comprobar_login(){
	$validar= new Validar();
	if($validar->No_vacio($this->login)===false){
		$this->code='005111';
		$this->ok=false;
		$this->resource='login';
		$this->construct_response();
		array_push($this->erroresdatos, $this->feedback);
	}

	if($validar->Longitud_maxima($this->login,25)===false){
		$this->code='005112';
		$this->ok=false;
		$this->resource='login';
		$this->construct_response();
		array_push($this->erroresdatos, $this->feedback);
	}

	if($validar->Es_string($this->login)===false){
		$this->code='005113';
		$this->ok=false;
		$this->resource='login';
		$this->construct_response();
		array_push($this->erroresdatos, $this->feedback);
	}

	return $this->erroresdatos;
}
//Comprueba el login
//no puede estar vacio
function Comprobar_descripcion(){
	$validar= new Validar();
	if($validar->No_vacio($this->descripcion)===false){
		$this->code='005111';
		$this->ok=false;
		$this->resource='descripcion';
		$this->construct_response();
		array_push($this->erroresdatos, $this->feedback);
	}


	if($validar->Es_string_espacios($this->descripcion)===false){
		$this->code='005113';
		$this->ok=false;
		$this->resource='descripcion';
		$this->construct_response();
		array_push($this->erroresdatos, $this->feedback);
	}

	return $this->erroresdatos;
}
     function ADD(){
        if($this->Validar_atributos()===true ){

            $this->query = "INSERT INTO ACTUACIONES_COMENTARIOS (
                codigo_obra,
                id_acto,
                fotos,
                login,
                descripcion
            )
            VALUES(
                '".$this->codigo_obra."',
                '".$this->id_acto."',
                '".$this->fotos."',
                  '".$this->login."',
                    '".$this->descripcion."'
            )";
            $this->execute_single_query();

            $this->id_coment=$this->insert_id;
            return $this->feedback; //operacion de insertado correcta

        }else{
            return $this->erroresdatos;
        }
    }


     function SEARCH()
    {
		$this->query = "SELECT * FROM ACTUACIONES_COMENTARIOS WHERE (
			codigo_obra LIKE '%$this->codigo_obra%' AND
		 	id_acto LIKE '%$this->id_acto%' AND
		 	id_coment LIKE '%$this->id_coment%' AND
		 	descripcion LIKE '%$this->descripcion%' AND 
		 	login LIKE '%$this->login%'		 )";

			$this->get_results_from_query();

			if ($this->feedback['code'] != '00008'){
		            if($this->feedback['code']=='00007'){
					$this->ok=true;
					$this->code = '000056';
					$this->construct_response();
				}

			return $this->feedback; //error de ejecucion de la sql de recuperación de datos
	}

	return $this->rows;

    }

     function EDIT()
    {
        // TODO: Implement EDIT() method.
    }

     function DELETE()
    {
        // TODO: Implement DELETE() method.
    }


     function getById()
    {
        // TODO: Implement getById() method.
    }
}
