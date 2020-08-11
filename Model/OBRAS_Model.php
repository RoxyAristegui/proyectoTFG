<?php
include_once 'Abstract_Model_Class.php';
include_once 'Validar_Model.php';

class OBRAS_Model extends Abstract_Model{

 var $codigo_obra;
 var $nombre;
 var $fecha_creacion;
 var $fecha_final;
 var $CIF;
 var $codigo_area;
 var $situacion;
 var $coste;
 var $solicitante;
 var $erroresdatos=[];

function __construct($codigo_obra,$nombre, $fecha_creacion,$fecha_final, $CIF, $codigo_area, $situacion, $coste, $solicitante){
	$this->codigo_obra=$codigo_obra;
 	$this->nombre=$nombre;
 	$this->fecha_creacion=$fecha_creacion;
 	$this->fecha_final=$fecha_final;
 	$this->CIF=$CIF;
 	$this->codigo_area=$codigo_area;
 	$this->situacion=$situacion;
 	$this->coste=$coste;
 	$this->solicitante=$solicitante;
}

function Validar_atributos(){
	$this->Comprobar_codigo_obra();
	$this->Comprobar_nombre();
	$this->Comprobar_fecha_creacion();
	$this->Comprobar_fecha_final();
	$this->Comprobar_solicitante();
	$this->Comprobar_situacion();
	$this->Comprobar_coste();
	$this->Comprobar_area();
	$this->Comprobar_CIF();
	if($this->erroresdatos==[]){
		return true;
	}else{
	return $this->erroresdatos;
	}
}

//Comprueba elcodigo de la obra
//no puede estar vacio 
//tiene solo números y menor de 11 caracteres
function Comprobar_codigo_obra(){
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


//comprueba el nombre de la obra, no puede estar vacío 
//caracteres alfanumericos con espacios

function Comprobar_nombre(){
	$validar= new Validar();
	if($validar->No_Vacio($this->nombre)===false){
		$this->code='005101';
		$this->ok=false;
		$this->resource='nombre';
		$this->construct_response();
		array_push($this->erroresdatos, $this->feedback);
	}
	
	if($validar->Es_string_espacios($this->nombre)===false){
		$this->code='005103';
		$this->ok=false;
		$this->resource='nombre';
		$this->construct_response();
		array_push($this->erroresdatos, $this->feedback);
	}


	return $this->erroresdatos;
}

//Comprueba el codigo de area
//no puede estr vacio, tiene que estar registrado en la based e datos
function Comprobar_area()
{
    $validar= new Validar();
	if($validar->No_vacio($this->codigo_area)===false){
		$this->code='005151';
		$this->ok=false;
		$this->resource='area';
		$this->construct_response();
		array_push($this->erroresdatos, $this->feedback);
	}

	if($validar->Es_alfanumerico($this->codigo_area)===false){
		$this->code='005153';
		$this->ok=false;
		$this->resource='area';
		$this->construct_response();
		array_push($this->erroresdatos, $this->feedback);
	}
	if($validar->Longitud_maxima($this->codigo_area,11)===false){
		$this->code='005152';
		$this->ok=false;
		$this->resource='area';
		$this->construct_response();
		array_push($this->erroresdatos, $this->feedback);
	}

	if($this->erroresdatos==[]){
	    include_once 'Areas_Model.php';
        $area=new Areas($this->codigo_area,'','');
        if(isset($area->getById()['code'])){

            $this->code='005073';
            $this->ok=false;
            $this->resource='codigo_area';
            $this->construct_response();
            array_push($this->erroresdatos, $this->feedback);
	    }
    }


	return $this->erroresdatos;

}
//Comprueba si existe el CIf
//puede estar vaciio
    function Comprobar_CIF(){
        $validar=new Validar();
    	if($validar->Es_alfanumerico($this->CIF)===false){
		$this->code='005153';
		$this->ok=false;
		$this->resource='cif';
		$this->construct_response();
		array_push($this->erroresdatos, $this->feedback);
	}
	if($validar->Longitud_maxima($this->CIF,11)===false){
		$this->code='005152';
		$this->ok=false;
		$this->resource='cif';
		$this->construct_response();
		array_push($this->erroresdatos, $this->feedback);
	}

if($this->CIF!='' && $this->erroresdatos==[]) {
    $prov = new PROVEEDORES_Model($this->CIF, '', '', '', '', '', '', '', '');
    $rtn = $prov->getById();
    if (isset($rtn['code'])) { //el cif no existe
        $this->code = '004072';
        $this->ok = false;
        $this->resource = 'CIF';
        $this->construct_response();
        array_push($this->erroresdatos, $this->feedback);
    }
}
	return $this->erroresdatos;
}

//Comprueba la situación e de la obra. 
//tiene solo números y máximo 2 caracteres
function Comprobar_situacion(){
	$validar= new Validar();

	if($validar->Longitud_maxima($this->situacion,2)===false){
		$this->code='005122';
		$this->ok=false;
		$this->resource='situacion';
		$this->construct_response();
		array_push($this->erroresdatos, $this->feedback);
	}
	
	if($validar->Es_numerico($this->situacion)===false){
		$this->code='005123';
		$this->ok=false;
		$this->resource='situacion';
		$this->construct_response();
		array_push($this->erroresdatos, $this->feedback);
	}

	return $this->erroresdatos;
}

//Comprueba el coste de la obra.
//tiene solo números y menor de 11 caracteres
function Comprobar_coste(){
	$validar= new Validar();
	
	if($validar->Longitud_maxima($this->coste,11)===false){
		$this->code='005132';
		$this->ok=false;
		$this->resource='coste';
		$this->construct_response();
		array_push($this->erroresdatos, $this->feedback);
	}
	if($validar->Es_numerico($this->coste)===false){
		$this->code='005133';
		$this->ok=false;
		$this->resource='coste';
		$this->construct_response();
		array_push($this->erroresdatos, $this->feedback);
	}

	return $this->erroresdatos;
}

//Comprueba el solicitnte de la obra, no puede estar vacio 
//alfanumérico con espacios menor a 120 caracteres
function Comprobar_solicitante(){
	$validar= new Validar();
	
	if($validar->Longitud_maxima($this->solicitante,120)===false){
		$this->code='005142';
		$this->ok=false;
		$this->resource='solicitante';
		$this->construct_response();
		array_push($this->erroresdatos, $this->feedback);
	}
	if($validar->Es_string_espacios($this->solicitante)===false){
		$this->code='005143';
		$this->ok=false;
		$this->resource='solicitante';
		$this->construct_response();
		array_push($this->erroresdatos, $this->feedback);
	}

	return $this->erroresdatos;
}

function Comprobar_fecha_creacion()
{
    if ($this->fecha_creacion != '') {
        $validar = new Validar();

        if ($validar->Formato_fecha($this->fecha_creacion) === false) {
            $this->code = '005163';
            $this->ok = false;
            $this->resource = 'fecha_creacion';
            $this->construct_response();
            array_push($this->erroresdatos, $this->feedback);
        }

        return $this->erroresdatos;
    }
}

function Comprobar_fecha_final()
{
    if ($this->fecha_final != '') {
        $validar = new Validar();
        if ($validar->Formato_fecha($this->fecha_final) === false) {
            $this->code = '005164';
            $this->ok = false;
            $this->resource = 'fecha_final';
            $this->construct_response();
            array_push($this->erroresdatos, $this->feedback);
        }

        return $this->erroresdatos;
    }
}

function ADD(){

	if($this->Validar_atributos()===true ){


		$this->query = "INSERT INTO OBRAS (
			codigo_obra,
			nombre,
 			fecha_creacion,
 			fecha_final,
 			CIF,
 			codigo_area,
 			situacion,
 			coste,
 			solicitante
 		)
		VALUES(
			'".$this->codigo_obra."',
 			'".$this->nombre."',
 			'".$this->fecha_creacion."',
 			'".$this->fecha_final."',
 			'".$this->CIF."',
 			'".$this->codigo_area."',
 			'".$this->situacion."',
 			'".$this->coste."',
 			'".$this->solicitante."'
	)";
	$this->execute_single_query();
			
		return $this->feedback; //operacion de insertado correcta

	}else{
		return $this->erroresdatos;
	}
}

function EDIT(){

	if($this->Validar_atributos()===true){

		$this->query = "UPDATE OBRAS SET
 	nombre='$this->nombre',
 	fecha_creacion='$this->fecha_creacion',
 	fecha_final= '$this->fecha_final',
 	CIF='$this->CIF',
 	codigo_area='$this->codigo_area',
 	situacion='$this->situacion',
 	coste='$this->coste'
 	where codigo_obra='$this->codigo_obra'";

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
    include_once 'ACTUACIONES_Model.php';
    $actuaciones = new ACTUACIONES_Model('', $this->codigo_obra, '', '');
    $actuaciones->SEARCH();
    if ($actuaciones->feedback['code'] == '00008') {
         $this->ok = false;
            $this->code = '005074'; //El proveedor tiene obras asignadas
            $this->construct_response();
            return $this->feedback;
    } else {
        $this->query = "	DELETE FROM 
   				OBRAS
   			WHERE(
   				codigo_obra = '$this->codigo_obra'
   			)
   			";
        $this->execute_single_query();

        if ($this->feedback['ok']) {
            $this->ok = true;
            $this->code = '000055'; //BOrrado realizado con exito
        } else {    //Error de gestor de base de datos
            $this->ok = false;
            $this->code = '000051';
        }
        $this->construct_response();
        return $this->feedback;
    }
}


function SEARCH(){

    $this->query = "SELECT * FROM OBRAS WHERE (
		codigo_obra LIKE '%$this->codigo_obra%' AND
	 	nombre LIKE '%$this->nombre%' AND
	 	fecha_creacion LIKE '%$this->fecha_creacion%' AND
	 	CIF LIKE '%$this->CIF%' AND
	 	codigo_area LIKE '%$this->codigo_area%' AND
		situacion LIKE '%$this->situacion%' AND
	 	coste LIKE '%$this->coste%')";

    $this->get_results_from_query();

    if ($this->feedback['code'] != '00008'){
        if($this->feedback['code']=='00007'){
            $this->ok=false;
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
			FROM OBRAS
			WHERE 
				codigo_obra = '$this->codigo_obra'
			";

	$this->get_one_result_from_query();
	
	if ($this->feedback['code'] == '00007')
	{
			$this->code= "005072"; //error de ejecucion de la sql, noe xiste obra con ese codigo
			$this->ok="false";
			$this->construct_response();
			return $this->feedback;
	}

	return $this->rows;
}

}