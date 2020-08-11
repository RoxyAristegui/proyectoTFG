<?php

include_once 'Abstract_Model_Class.php';
include_once 'Validar_Model.php';
include_once 'Trabajadores_Model.php';

class ACTUACIONES_Model extends Abstract_Model{

 var $codigo_obra;
 var $id_acto;
 var $descripcion;
 var $fecha_actuacion;
 var $aceptado;
 var $cerrado;
 var $trabajadores=[];
 var $erroresdatos=[];


function __construct($id_acto,$codigo_obra,$descripcion, $fecha_actuacion,$cerrado='',$aceptado=''){
	$this->codigo_obra=$codigo_obra;
	$this->id_acto=$id_acto;
 	$this->descripcion=$descripcion;
 	$this->fecha_actuacion=$fecha_actuacion;
 	$this->cerrado=$cerrado;
 	$this->aceptado=$aceptado;

}

function Validar_atributos(){
    $this->Comprobar_codigo();
	$this->Comprobar_descripcion();
	$this->Comprobar_fecha_actuacion();

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
	if($this->erroresdatos==[]) {
        //si no hay errores comprobamos que exista el codigo.
        include_once 'OBRAS_Model.php';
        $obra = new OBRAS_Model($this->codigo_obra, '', '', '', '', '', '', '', '');
        $obra->getById();
        if ($obra->feedback['code'] == '005072') {
            //no existe el codigo de obra
            $obra->feedback;
            $this->code='005072';
            $this->ok=false;
            $this->resource='codigo_obra';
            $this->construct_response();
            array_push($this->erroresdatos, $this->feedback);
        }
    }

	return $this->erroresdatos;
}

function Comprobar_fecha_actuacion(){
    $validar=new Validar();
    if($validar->Formato_fecha($this->fecha_actuacion)===false){
        $this->code='005075';
        $this->ok=false;
        $this->resource='fecha_actuacion';
        $this->construct_response();
        array_push($this->erroresdatos, $this->feedback);
    }
       if($validar->No_vacio($this->fecha_actuacion)===false){
		$this->code='005075';
		$this->ok=false;
		$this->resource='fecha_actuacion';
		$this->construct_response();
		array_push($this->erroresdatos, $this->feedback);
	}
}


//comprueba el nombre de la obra, no puede estar vacío
//caracteres alfanumericos con espacios, sin limite de caracteres

function Comprobar_descripcion(){
	$validar= new Validar();
	if($validar->No_vacio($this->descripcion)===false){
		$this->code='005101';
		$this->ok=false;
		$this->resource='descripcion';
		$this->construct_response();
		array_push($this->erroresdatos, $this->feedback);
	}

	if($validar->Es_string_espacios($this->descripcion)===false){
		$this->code='005103';
		$this->ok=false;
		$this->resource='descripcion';
		$this->construct_response();
		array_push($this->erroresdatos, $this->feedback);
	}

	return $this->erroresdatos;
}

function ADD(){

	if($this->Validar_atributos()===true ){

		$this->query = "INSERT INTO ACTUACIONES (
			codigo_obra,
 			fecha_actuacion,
 			descripcion
 		)
		VALUES(
			'".$this->codigo_obra."',
 			'".$this->fecha_actuacion."',
 			'".$this->descripcion."'
	)";
	$this->execute_single_query();

	    $this->id_acto=$this->insert_id;
		return $this->feedback; //operacion de insertado correcta

	}else{
		return $this->erroresdatos;
	}
}

function EDIT(){

	if($this->Validar_atributos()===true ){
        $obra=$this->getById();
        if($obra['aceptado']=='1'){
            	$this->ok=true;
				$this->code = '005076';
				$this->construct_response();
				return $this->feedback;
        }
		$this->query = "UPDATE ACTUACIONES SET
 	        descripcion='$this->descripcion',
 	        fecha_actuacion='$this->fecha_actuacion',
 	        aceptado='$this->aceptado'
 	        where codigo_obra='$this->codigo_obra' and id_acto='$this->id_acto'";

			$this->execute_single_query();

			if($this->feedback['code']==00001){ //operacion de insertado correcta
				$this->ok=true;
				$this->code = '000054';
				$this->construct_response();
			}
			return $this->feedback;
	}else{

		return $this->erroresdatos;
	}
}

//funcion DELETE : comprueba que la tupla a borrar existe y una vez
// verificado la borra
function DELETE()
{
        $this->query = "	DELETE FROM 
   				ACTUACIONES
   			WHERE(
   				codigo_obra = '$this->codigo_obra' AND 
   				id_acto='$this->id_acto')
   			";
        $this->execute_single_query();

        if ($this->feedback['ok']) {


            //al borrar la obra orramos tambien sus comentarios y los trabajadores que tiene asociados.
            $this->query = "	DELETE FROM 
   				ACTUACIONES_COMENTARIOS
   			WHERE(
   				codigo_obra = '$this->codigo_obra' AND 
   				id_acto='$this->id_acto')
   			";
             $this->execute_single_query();

              $this->query = "	DELETE FROM 
   				ACTUACIONES_TRABAJADORES
   			WHERE(
   				codigo_obra = '$this->codigo_obra' AND 
   				id_acto='$this->id_acto')
   			";
             $this->execute_single_query();

             $this->ok = true;
            $this->code = '000055'; //BOrrado realizado con exito

        } else {    //Error de gestor de base de datos
            $this->ok = false;
            $this->code = '000051';
        }
        $this->construct_response();
        return $this->feedback;

}


function SEARCH(){

		$this->query = "SELECT * FROM ACTUACIONES WHERE (
			codigo_obra LIKE '%$this->codigo_obra%' AND
		 	id_acto LIKE '%$this->id_acto%' AND
		 	fecha_actuacion LIKE '%$this->fecha_actuacion%' AND
		 	descripcion LIKE '%$this->descripcion%' AND 
		 	cerrado LIKE '%$this->cerrado%' AND 
		 	aceptado LIKE '%$this->aceptado%'		 )";

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


// funcion de busqueda: recupera todos los atributos de un usuario a partir de su clave [codigo_obra]
//devuelve un array [clave]=valor;
function getById()
{
    $this->query = "SELECT *
			FROM ACTUACIONES
			WHERE 
				codigo_obra = '$this->codigo_obra' AND id_acto='$this->id_acto'
			";

	$this->get_one_result_from_query();

	if ($this->feedback['code'] == '00007')
	{
			$this->code= "000057"; //error de ejecucion de la sql, noe xiste obra con ese codigo
			$this->ok="false";
			$this->construct_response();
			return $this->feedback;
	}

	return $this->rows;
}

function CLOSE(){
    $acto=$this->getById();
    if($acto['aceptado']=='1') {
        $this->query = "UPDATE ACTUACIONES SET 	      
 	        cerrado='$this->cerrado'
 	        where codigo_obra='$this->codigo_obra' and id_acto='$this->id_acto'";

        $this->execute_single_query();

        if ($this->feedback['code'] == 00001) { //operacion de insertado correcta
            $this->ok = true;
            $this->code = '000054';
            $this->construct_response();
        }

    }else{
         $this->ok = true;
            $this->code = '005377';
            $this->construct_response();
    }
      return $this->feedback;
}

function ADDTrabajadorActuacion($dni){

		$this->query = "INSERT INTO ACTUACIONES_TRABAJADORES (
			codigo_obra,
 			id_acto,
 			DNI
 		)
		VALUES(
			'".$this->codigo_obra."',
 			'".$this->id_acto."',
 			'".$dni."'
	)";

	$this->execute_single_query();

	return $this->feedback;
}
function DELETETrabajadorActuacion($dni){

		$this->query = "DELETE FROM ACTUACIONES_TRABAJADORES where (
			codigo_obra='".$this->codigo_obra."' and
 			id_acto= '".$this->id_acto."' and
 			DNI=	'".$dni."'
 		)";
	$this->execute_single_query();

	return $this->feedback;
}
function getTrabajadoresActuacion(){

		$this->query = "select DNI from ACTUACIONES_TRABAJADORES where (
			codigo_obra='".$this->codigo_obra."' and
 			id_acto= '".$this->id_acto."' 
 		)";

	$this->get_results_from_query();

	if ($this->feedback['code'] != '00008'){
		   //no hay trabajadores asociados
			$this->code= "006073"; //no se han encontrado trabajadores
			$this->ok="false";
			$this->construct_response();
			return $this->feedback;
	}else{

        $trabajadores=[];
	    foreach($this->rows as $trabajador){
	        if(isset($trabajador['DNI'])) {
                $trab = new Trabajadores_Model($trabajador['DNI'], '');
                $trab_entero = $trab->getById();
                if (!isset($trab_entero['code'])) {
                    array_push($trabajadores, $trab_entero);
                }
            }
	    }

	    return $trabajadores;
    }


}




}