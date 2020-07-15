<?php


include_once 'Abstract_Model_Class.php';
include_once 'Validar_Model.php';

class PROVEEDORES_Model extends Abstract_Model{

var $CIF;
var $empresa;
var $direccion;
var $localidad;
var $CP;
var $email;
var $telefono;
var $movil;
var $pers_contacto;
var $login_admin;
var $erroresdatos=[];

function __construct($CIF,$empresa, $direccion, $localidad, $CP, $email, $telefono, $movil, $pers_contacto){
	$this->CIF=$CIF;
	$this->empresa=$empresa;
	$this->direccion= $direccion;
 	$this->localidad=$localidad;
 	$this->CP=$CP;
 	$this->email=$email;
 	$this->telefono=$telefono;
 	$this->movil=$movil;
 	$this->pers_contacto=$pers_contacto;
}

//funcion de destrucción del objeto: se ejecuta automaticamente
//al finalizar el script
function __destruct()
{

}


// function Validar_atributos
// se lanzan las funciones de comprobacion de atributos de usuario,
//sino hay errores devuelve true, sino el array de errores.

function Validar_atributos(){
	$this->Comprobar_empresa();
	$this->Comprobar_direccion();
	$this->Comprobar_localidad();
	$this->Comprobar_CIF();
	$this->Comprobar_CP();
	$this->Comprobar_email();
	$this->Comprobar_telefono();
	$this->Comprobar_movil();
	$this->Comprobar_pers_contacto();
	if($this->erroresdatos==[]){
		return true;
	}else{
	return $this->erroresdatos;
	}
}



//Comprueba el nombre de la empresa, no puede estar vacio 
//alfanumerico con espacios menor a 100 caracteres
function Comprobar_empresa(){
	$validar= new Validar();
	if($validar->No_Vacio($this->empresa)===false){
		$this->code='004101';
		$this->ok=false;
		$this->resource='empresa';
		$this->construct_response();
		array_push($this->erroresdatos, $this->feedback);
	}
	if($validar->Longitud_maxima($this->empresa,100)===false){
		$this->code='004102';
		$this->ok=false;
		$this->resource='empresa';
		$this->construct_response();
		array_push($this->erroresdatos, $this->feedback);
	}
	if($validar->Es_string_espacios($this->empresa)===false){
		$this->code='004103';
		$this->ok=false;
		$this->resource='empresa';
		$this->construct_response();
		array_push($this->erroresdatos, $this->feedback);
	}

	return $this->erroresdatos;
}

//Comprueba que la longitus de el CIF es mayore de 8
//alfanumerico y menor a 10 caracteres
function Comprobar_CIF(){
	$validar= new Validar();
	if($validar->Longitud_minima($this->CIF,8)===false){
		$this->code='004111';
		$this->ok=false;
		$this->resource='CIF';
		$this->construct_response();
		array_push($this->erroresdatos, $this->feedback);
	}
	if($validar->Longitud_maxima($this->CIF,10)===false){
		$this->code='004112';
		$this->ok=false;
		$this->resource='CIF';
		$this->construct_response();
		array_push($this->erroresdatos, $this->feedback);
	}
	if($validar->Es_alfanumerico($this->CIF)===false){
		$this->code='004113';
		$this->ok=false;
		$this->resource='CIF';
		$this->construct_response();
		array_push($this->erroresdatos, $this->feedback);
	}
	
	return $this->erroresdatos;
}


//Comprueba la direccion de la empresa, no puede estar vacio 
//alfanumerico con espacios menor a 100 caracteres
function Comprobar_direccion(){
	$validar= new Validar();
	if($validar->No_Vacio($this->direccion)===false){
		$this->code='004121';
		$this->ok=false;
		$this->resource='direccion';
		$this->construct_response();
		array_push($this->erroresdatos, $this->feedback);
	}
	if($validar->Longitud_maxima($this->direccion,100)===false){
		$this->code='004122';
		$this->ok=false;
		$this->resource='direccion';
		$this->construct_response();
		array_push($this->erroresdatos, $this->feedback);
	}
	if($validar->Es_string_espacios($this->direccion)===false){
		$this->code='004123';
		$this->ok=false;
		$this->resource='direccion';
		$this->construct_response();
		array_push($this->erroresdatos, $this->feedback);
	}

	return $this->erroresdatos;
}
//Comprueba la localidad de la empresa, no puede estar vacio 
//alfanumerico con espacios menor a 30 caracteres
function Comprobar_localidad(){
	$validar= new Validar();
	if($validar->No_Vacio($this->localidad)===false){
		$this->code='004131';
		$this->ok=false;
		$this->resource='localidad';
		$this->construct_response();
		array_push($this->erroresdatos, $this->feedback);
	}
	if($validar->Longitud_maxima($this->localidad,30)===false){
		$this->code='004132';
		$this->ok=false;
		$this->resource='localidad';
		$this->construct_response();
		array_push($this->erroresdatos, $this->feedback);
	}
	if($validar->Es_string_espacios($this->localidad)===false){
		$this->code='004133';
		$this->ok=false;
		$this->resource='localidad';
		$this->construct_response();
		array_push($this->erroresdatos, $this->feedback);
	}

	return $this->erroresdatos;
}

//Comprueba que la longitus de el CP es mayore de 4
//numerico y menor a 6 caracteres
function Comprobar_CP(){
	$validar= new Validar();
	if($validar->Longitud_minima($this->CP,4)===false){
		$this->code='004141';
		$this->ok=false;
		$this->resource='CP';
		$this->construct_response();
		array_push($this->erroresdatos, $this->feedback);
	}
	if($validar->Longitud_maxima($this->CP,6)===false){
		$this->code='004142';
		$this->ok=false;
		$this->resource='CP';
		$this->construct_response();
		array_push($this->erroresdatos, $this->feedback);
	}
	if($validar->Es_numerico($this->CP)===false){
		$this->code='004143';
		$this->ok=false;
		$this->resource='CP';
		$this->construct_response();
		array_push($this->erroresdatos, $this->feedback);
	}
	
	return $this->erroresdatos;
}

//Comprueba que el email de la empresa no esta vacio 
//tiene un formto correcto y menor a 100 caracteres
function Comprobar_email(){
	$validar= new Validar();
	if($validar->No_Vacio($this->email)===false){
		$this->code='004151';
		$this->ok=false;
		$this->resource='email';
		$this->construct_response();
		array_push($this->erroresdatos, $this->feedback);
	}
	if($validar->Longitud_maxima($this->email,100)===false){
		$this->code='004152';
		$this->ok=false;
		$this->resource='email';
		$this->construct_response();
		array_push($this->erroresdatos, $this->feedback);
	}
	if($validar->Formato_email($this->email)===false){
		$this->code='004153';
		$this->ok=false;
		$this->resource='email';
		$this->construct_response();
		array_push($this->erroresdatos, $this->feedback);
	}

	return $this->erroresdatos;
}

//Comprueba que el telefono de la empresa no esta vacio 
//tiene solo números y 9 caracteres
function Comprobar_telefono(){
	$validar= new Validar();
	if($validar->No_Vacio($this->telefono)===false){
		$this->code='004161';
		$this->ok=false;
		$this->resource='telefono';
		$this->construct_response();
		array_push($this->erroresdatos, $this->feedback);
	}
	if($validar->Longitud_maxima($this->telefono,10)===false){
		$this->code='004162';
		$this->ok=false;
		$this->resource='telefono';
		$this->construct_response();
		array_push($this->erroresdatos, $this->feedback);
	}
	if($validar->Longitud_minima($this->telefono,8)===false){
		$this->code='004162';
		$this->ok=false;
		$this->resource='telefono';
		$this->construct_response();
		array_push($this->erroresdatos, $this->feedback);
	}
	if($validar->Es_numerico($this->telefono)===false){
		$this->code='004162';
		$this->ok=false;
		$this->resource='telefono';
		$this->construct_response();
		array_push($this->erroresdatos, $this->feedback);
	}

	return $this->erroresdatos;
}

//Comprueba que el movil de la empresa  
//tiene solo números y no más de 9 caracteres
function Comprobar_movil(){
	$validar= new Validar();

	if($validar->Longitud_maxima($this->movil,10)===false){
		$this->code='004163';
		$this->ok=false;
		$this->resource='movil';
		$this->construct_response();
		array_push($this->erroresdatos, $this->feedback);
	}
	if($validar->Es_numerico($this->movil)===false){
		$this->code='004163';
		$this->ok=false;
		$this->resource='movil';
		$this->construct_response();
		array_push($this->erroresdatos, $this->feedback);
	}

	return $this->erroresdatos;
}

//Comprueba la persona de contacto de la empresa, no puede estar vacio 
//alfanumérico con espacios menor a 120 caracteres
function Comprobar_pers_contacto(){
	$validar= new Validar();
	if($validar->No_Vacio($this->pers_contacto)===false){
		$this->code='004171';
		$this->ok=false;
		$this->resource='pers_contacto';
		$this->construct_response();
		array_push($this->erroresdatos, $this->feedback);
	}
	if($validar->Longitud_maxima($this->pers_contacto,120)===false){
		$this->code='004172';
		$this->ok=false;
		$this->resource='pers_contacto';
		$this->construct_response();
		array_push($this->erroresdatos, $this->feedback);
	}
	if($validar->Es_string_espacios($this->pers_contacto)===false){
		$this->code='004173';
		$this->ok=false;
		$this->resource='pers_contacto';
		$this->construct_response();
		array_push($this->erroresdatos, $this->feedback);
	}

	return $this->erroresdatos;
}

function CIF_unico(){
		$this->query = "SELECT *
					FROM PROVEEDORES
					WHERE (
						(CIF = '".$this->CIF."') 
					)";
	
	$this->get_results_from_query();
	if ($this->feedback['code'] == '00008'){  // el recordset vuelve con datos
		$this->ok=false;
		$this->code  = '004071'; // el cif ya existe
		$this->construct_response();
		array_push($this->erroresdatos, $this->feedback);
		return false;
		}else {return true;}
}

function ADD(){

	if($this->Validar_atributos()===true && $this->CIF_unico()===true){

		if(isset($_SESSION['login'])){
			$admin_prov=$_SESSION['login'];
		}else{
			$admin_prov='admin';
		}

		$this->query = "INSERT INTO PROVEEDORES (
			CIF,
			empresa,
			direccion,
			localidad,
			CP,
			email,
			telefono,
			movil,
			pers_contacto,
			login_admin) 
		VALUES(
			'".$this->CIF."',
			'".$this->empresa."',
		 	'".$this->direccion."',
 			'".$this->localidad."',
 			'".$this->CP."',
 			'".$this->email."',
 			'".$this->telefono."',
 			'".$this->movil."',
 			'".$this->pers_contacto."',
 			'".$admin_prov."'
	)";
	$this->execute_single_query();
			
		return $this->feedback; //operacion de insertado correcta

	}else{
		return $this->erroresdatos;
	}
}

function EDIT(){

	if($this->Validar_atributos()===true){

		$this->query = "UPDATE PROVEEDORES SET
			empresa = '$this->empresa',
			direccion=	'$this->direccion',
			localidad='$this->localidad',
			CP=	'$this->CP',
			email='$this->email',
			telefono='$this->telefono',
			movil='$this->movil',
			pers_contacto='$this->pers_contacto'
			 WHERE CIF='$this->CIF'";
		
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

function DELETE(){

   $this->query = "	DELETE FROM 
   				PROVEEDORES
   			WHERE(
   				CIF = '$this->CIF'
   			)
   			";
	$this->execute_single_query();

   	if ($this->feedback['ok'])
	{
		$this->ok=true;
		$this->code = '000055'; //Borrado realizado con exito
	}
	else
	{	//Error de gestor de base de datos
		$this->ok=false;
		$this->code = '000051';
	}
	$this->construct_response();
	return $this->feedback;
}

function SEARCH(){

		$this->query = "SELECT * FROM PROVEEDORES WHERE (
			CIF LIKE '%$this->CIF%' AND
			empresa LIKE '%$this->empresa%' AND
			direccion LIKE '%$this->direccion%' AND
			localidad LIKE '%$this->localidad%' AND
			CP LIKE '%$this->CP%' AND
			email LIKE '%$this->email%' AND
			telefono LIKE '%$this->telefono%' AND
			movil LIKE '%$this->movil%' AND
			pers_contacto LIKE '%$this->pers_contacto%' )";
		
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


function getById(){
    $this->query = "SELECT *
			FROM PROVEEDORES
			WHERE 
				CIF = '$this->CIF'
			";

	$this->get_one_result_from_query();
	
	if ($this->feedback['code'] == '00007')
	{
			$this->code= "004072"; //error de ejecucion de la sql, no existe proveedor con ese cif
			$this->ok="false";
			$this->construct_response();
			return $this->feedback;
	}

	return $this->rows;
}

function getByAdmin($login_admin){
	   $this->query = "SELECT *
			FROM PROVEEDORES
			WHERE 
				login_admin = '".$login_admin."'
			";

	$this->get_one_result_from_query();
	
	if ($this->feedback['code'] == '00007')
	{
			$this->code= "004080"; //error de ejecucion de la sql, noe xiste usuario con ese login
			$this->ok="false";
			$this->construct_response();
			return $this->feedback;
	}

	return $this->rows;
}



}