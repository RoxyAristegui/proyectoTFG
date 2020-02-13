<?php

//Clase : USUARIOS_Modelo
//Creado el : 22-09-2017
//Creado por: jrodeiro
// modificado en 6/11/2019 para incluir clase abstracta de modelo
//-------------------------------------------------------
include 'Abstract_Model_Class.php';
include 'Validar_Model.php';

class USUARIOS_Model extends Abstract_Model {

	var $login;
	var $password;
	var $nombre;
	var $apellidos;
	var $email;
	var $mysqli;
	var $erroresdatos;

//Constructor de la clase
//

function __construct($login,$password,$nombre,$apellidos,$email){
	$this->login = $login;
	$this->password = $password;
	$this->nombre = $nombre;
	$this->apellidos = $apellidos;
	$this->email = $email;
	$this->erroresdatos = array();

	//$this->Comprobar_atributos();

	include_once '../Model/Access_DB.php';
	$this->mysqli = ConnectDB();

}


//funcion de destrucción del objeto: se ejecuta automaticamente
//al finalizar el script
function __destruct()
{

}


// function Comprobar_atributos
// se lanzan las funciones de comprobacion de atributos de usuario,
//sino hay errores devuelve true, sino el array de errores.

function Comprobar_atributos(){
	$this->Comprobar_nombre();
	$this->Comprobar_apellidos();
	$this->Comprobar_password();
	$this->Comprobar_login();
	$this->Comprobar_email();
	if($this->erroresdatos==[]){
		return true;
	}else{
	return $this->erroresdatos;
	}
}



// Comprueba el formato del login 
//	alfanumericol, entre 3 y 30 carácteres
//	no vacio
// si se detectaron errores los añade al array de erroers
function Comprobar_login()
{

	$validar= new Validar();
	if($validar->Longitud_minima($this->nombre,5)===false){
		$this->code='000131';
		$this->ok=false;
		$this->resource='Login';
		$this->construct_response();
		array_push($this->erroresdatos, $this->feedback);
	}
	if($validar->Longitud_maxima($this->nombre,30)===false){
		$this->code='000132';
		$this->ok=false;
		$this->resource='Login';
		$this->construct_response();
		array_push($this->erroresdatos, $this->feedback);
	}
	if($validar->Es_alfanumerico($string)===false){
		$this->code='000133';
		$this->ok=false;
		$this->resource='Login';
		$this->construct_response();
		array_push($this->erroresdatos, $this->feedback);
	}
}

// Comprueba el formato del login 
//	alfanumericol, entre 3 y 30 carácteres
//	no vacio
// si se detectaron errores los añade al array de erroers
function Comprobar_nombre()
{
	$validar= new Validar();
	if($validar->Longitud_minima($this->nombre,3)===false){
		$this->code='000121';
		$this->ok=false;
		$this->resource='Nombre';
		$this->construct_response();
		array_push($this->erroresdatos, $this->feedback);
	}
	if($validar->Longitud_maxima($this->nombre,30)===false){
		$this->code='000122';
		$this->ok=false;
		$this->resource='Nombre';
		$this->construct_response();
		array_push($this->erroresdatos, $this->feedback);
	}
	if($validar->Es_string($string)===false){
		$this->code='000123';
		$this->ok=false;
		$this->resource='Nombre';
		$this->construct_response();
		array_push($this->erroresdatos, $this->feedback);
	}
	
}

//Comrpeuba el formato de los apellidos, alfanumérico con espacios
function Comprobar_apellidos(){
	$validar= new Validar();
	if($validar->Longitud_minima($this->nombre,3)===false){
		$this->code='000151';
		$this->ok=false;
		$this->resource='Apellidos';
		$this->construct_response();
		array_push($this->erroresdatos, $this->feedback);
	}
	if($validar->Longitud_maxima($this->nombre,50)===false){
		$this->code='000152';
		$this->ok=false;
		$this->resource='Apellidos';
		$this->construct_response();
		array_push($this->erroresdatos, $this->feedback);
	}
	if($validar->Es_string_espacios($string)===false){
		$this->code='000153';
		$this->ok=false;
		$this->resource='Apellidos';
		$this->construct_response();
		array_push($this->erroresdatos, $this->feedback);
	}
}

// comprueba la pass, letras y números, entre 3 y 30 carácteres
// si se detectaron errores los añade al array de erroers
function Comprobar_password(){
	$validar= new Validar();
	if($validar->Longitud_minima($this->nombre,5)===false){
		$this->code='000141';
		$this->ok=false;
		$this->resource='Password';
		$this->construct_response();
		array_push($this->erroresdatos, $this->feedback);
	}
	if($validar->Longitud_maxima($this->nombre,30)===false){
		$this->code='000142';
		$this->ok=false;
		$this->resource='Password';
		$this->construct_response();
		array_push($this->erroresdatos, $this->feedback);
	}
	if($validar->Es_alfanumerico($string)===false){
		$this->code='000143';
		$this->ok=false;
		$this->resource='Password';
		$this->construct_response();
		array_push($this->erroresdatos, $this->feedback);
	}
}

//comprueba que el email tenga un formato válido
// si se detectaron errores los añade al array de erroers
function Comprobar_email(){
	$validar= new Validar();
	if($validar->Formato_email($this->email)===false){
		$this->code='000161';
		$this->ok=false;
		$this->resource='email';
		$this->construct_response();
		array_push($this->erroresdatos, $this->feedback);
	}
	
}

//inserta un error en el array de errores si el login ya existe
function login_unico(){
	$this->query = "SELECT *
					FROM USUARIOS
					WHERE (
						(login = '".$this->login."') 
					)";
	
	$this->get_results_from_query();
	if ($this->feedback['code'] == '00008'){  // el recordset vuelve con datos
		$this->ok=false;
		$this->code  = '000071'; // el login ya existe
		$this->construct_response();
		array_push($this->erroresdatos, $this->feedback);
		return false;
		}else {return true;}
}


//inserta un error en el array de errores si el email ya existe
function email_unico(){
		$this->query = "SELECT *
					FROM USUARIOS
					WHERE (
						(email = '".$this->email."') 
					)";
	
	$this->get_results_from_query();
	if ($this->feedback['code'] == '00008'){  // el recordset vuelve con datos
		$this->ok=false;
		$this->code  = '000076'; // el login ya existe
		$this->construct_response();
		array_push($this->erroresdatos, $this->feedback);
		return false;
		}else {return true;}
}


//Metodo ADD
//Inserta en la tabla  de la bd  los valores
// de los atributos del objeto. Comprueba si la clave/s esta vacia y si 
//existe ya en la tabla
function ADD()
{
	if($this->Comprobar_atributos() && $this->email_unico() & $this->login_unico()){

			$this->query = "INSERT INTO USUARIOS (
				login,
				password,
				nombre,
				apellidos,
				email) 
					VALUES (
						'".$this->login."',
						'".$this->password."',
						'".$this->nombre."',
						'".$this->apellidos."',
						'".$this->email."'
						)";

			$this->execute_single_query();
			
				return $this->feedback; //operacion de insertado correcta
	
	}else{
		return $this->erroresdatos;
	}
}
    


//funcion SEARCH: hace una búsqueda en la tabla con
//los datos proporcionados. Si van vacios devuelve todos
function SEARCH()
{
    $this->query = "SELECT *
			FROM USUARIOS
			WHERE (
				login LIKE '%".$this->login."%' AND
				password LIKE '%".$this->password."%' AND
				nombre LIKE '%".$this->nombre."%' AND
				apellidos LIKE '%".$this->apellidos."%' AND
				email LIKE '%".$this->email."%'
			)
	";
	$this->get_results_from_query();
	if ($this->feedback['code'] == '00007')
	{
			return $this->feedback; //error de ejecucion de la sql de recuperación de datos
	}

	return $this->rows;

}

//funcion DELETE : comprueba que la tupla a borrar existe y una vez
// verificado la borra
function DELETE()
{
   $this->query = "	DELETE FROM 
   				USUARIOS
   			WHERE(
   				login = '$this->login'
   			)
   			";
	$this->execute_single_query();

   	if ($this->feedback['ok'])
	{
		$this->ok=true;
		$this->code = '000075'; //BOrrado realizado con exito
	}
	else
	{	//Error de gestor de base de datos
		$this->ok=false;
		$this->code = '000051';
	}
	$this->construct_response();
	return $this->feedback;
}

// funcion de bñusqueda: recupera todos los atributos de un usuario a partir de su clave [login]
//devuelve un array [clave]=valor;
function BuscarPorClave()
{
    $this->query = "SELECT *
			FROM USUARIOS
			WHERE 
				login = '$this->login'
			";

	$this->get_one_result_from_query();
	
	if ($this->feedback['code'] == '00007')
	{
			$this->code= "000072"; //error de ejecucion de la sql, noe xiste usuario con ese login
			$this->ok="false";
			$this->construct_response();
			return $this->feedback;
	}

	return $this->rows;
}


// funcion de bñusqueda: recupera todos los atributos de un usuario a partir de su email
//devuelve un array [clVE]=valor;
function BuscarPorEmail()
{
    $this->query = "SELECT *
			FROM USUARIOS
			WHERE 
				email = '$this->email'
			";

	$this->get_one_result_from_query();
	
	if ($this->feedback['code'] == '00007')
	{
		$this->code="000075";
		$this->ok=false; // no existe usuario con ese email
		$this->construct_response();
			return $this->feedback; 
	}

	return $this->rows;
}

// funcion Edit: realizar el update de una tupla
function EDIT()
{
	if($this->Comprobar_atributos()===true){
		$this->query = "UPDATE USUARIOS
				SET 
					password = '$this->password',
					nombre = '$this->nombre',
					apellidos = '$this->apellidos',
					email = '$this->email'
				WHERE (
					login = '$this->login'
				)
				";

		$this->execute_single_query();

		if ($this->feedback['code']==='00001')
		{
			$this->ok=true;
			$this->resource='EDIT';
			$this->code  = '000053';
			$this->construct_response(); //modificacion en bd correcta
		}
		else
		{	$this->ok=false;
			$this->resource='EDIT';
			$this->code  = '000074'; //error al modificar el usuario en la bd
			$this->construct_response();
		}

		return $this->feedback;
	
		
	}else{
		return $this->erroresdatos;
	}
}


// funcion login: realiza la comprobación de si existe el usuario en la bd y despues si la pass
// es correcta para ese usuario. Si es asi devuelve true, en cualquier otro caso devuelve el 
// error correspondiente
function login(){

	$this->query = "SELECT *
					FROM USUARIOS
					WHERE (
						(login = '".$this->login."') 
					)";
	
	$this->get_results_from_query();
	
	if ($this->feedback['code'] == '00007'){
		$this->ok = false;
		$this->code  = '000072'; // el login no existe	
	}
	else{
		$fila = $this->rows[0];
		if ($fila['password'] == $this->password){
			$this->ok = true;
			$this->code  = '000010'; //usuario y pass correctos
		}
		else{
			$this->ok = false;
			$this->code  = '000073'; // la pass no coincide
		}
	}
	$this->construct_response();
	return $this->feedback;

}//fin metodo login

//
function Register(){

	if($this->Comprobar_atributos()===true & $this->email_unico() & $this->login_unico()){

		$this->query = 
			"INSERT INTO USUARIOS (
				login,
				password,
				nombre,
				apellidos,
				email) 
			VALUES (
					'".$this->login."',
					'".$this->password."',
					'".$this->nombre."',
					'".$this->apellidos."',
					'".$this->email."'
					)";
							
		$this->execute_single_query();

		if ($this->feedback['code'] = '000052'){ //sql ejecutado con exito
			$this->ok = true;
			$this->code  = '000053'; //registro realizado con exito
			$this->construct_response();
		}
									

		return $this->feedback;
	}else{
		return $this->erroresdatos;
	}
}

}//fin de clase

?> 