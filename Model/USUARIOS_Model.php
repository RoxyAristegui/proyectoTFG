<?php

//Clase : USUARIOS_Modelo
//Creado el : 22-09-2017
//Creado por: jrodeiro
// modificado en 6/11/2019 para incluir clase abstracta de modelo
//-------------------------------------------------------
include_once 'Abstract_Model_Class.php';
include 'Validar_Model.php';

class USUARIOS_Model extends Abstract_Model {

	var $login;
	var $password;
	var $nombre;
	var $apellidos;
	var $email;
	var $dni;
	var $erroresdatos;

//Constructor de la clase
//

function __construct($login,$password,$nombre,$apellidos,$email,$dni){
	$this->login = $login;
	$this->password = $password;
	$this->nombre = $nombre;
	$this->apellidos = $apellidos;
	$this->email = $email;
	$this->dni=$dni;
	$this->erroresdatos = array();

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
	$this->Comprobar_nombre();
	$this->Comprobar_apellidos();
	$this->Comprobar_password();
	$this->Comprobar_login();
	$this->Comprobar_email();
	$this->Comprobar_dni();
	if($this->erroresdatos==[]){
		return true;
	}else{
	return $this->erroresdatos;
	}
}



// Comprueba el formato del login 
//	alfanumericol, entre 3 y 15 carácteres
//	no vacio
// si se detectaron errores los añade al array de erroers
function Comprobar_login()
{

	$validar= new Validar();
	if($validar->Longitud_minima($this->login,5)===false){
		$this->code='000131';
		$this->ok=false;
		$this->resource='Login';
		$this->construct_response();
		array_push($this->erroresdatos, $this->feedback);
	}
	if($validar->Longitud_maxima($this->login,15)===false){
		$this->code='000132';
		$this->ok=false;
		$this->resource='Login';
		$this->construct_response();
		array_push($this->erroresdatos, $this->feedback);
	}
	if($validar->Es_alfanumerico($this->login)===false){
		$this->code='000133';
		$this->ok=false;
		$this->resource='Login';
		$this->construct_response();
		array_push($this->erroresdatos, $this->feedback);
	}
	return $this->erroresdatos;
}

// Comprueba el formato del nombre 
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
	if($validar->Es_string($this->nombre)===false){
		$this->code='000123';
		$this->ok=false;
		$this->resource='Nombre';
		$this->construct_response();
		array_push($this->erroresdatos, $this->feedback);
	}
	return $this->erroresdatos;
}

//Comrpeuba el formato de los apellidos, alfanumérico con espacios
function Comprobar_apellidos(){
	$validar= new Validar();
	if($validar->Longitud_minima($this->apellidos,3)===false){
		$this->code='000151';
		$this->ok=false;
		$this->resource='Apellidos';
		$this->construct_response();
		array_push($this->erroresdatos, $this->feedback);
	}
	if($validar->Longitud_maxima($this->apellidos,50)===false){
		$this->code='000152';
		$this->ok=false;
		$this->resource='Apellidos';
		$this->construct_response();
		array_push($this->erroresdatos, $this->feedback);
	}
	if($validar->Es_string_espacios($this->apellidos)===false){
		$this->code='000153';
		$this->ok=false;
		$this->resource='Apellidos';
		$this->construct_response();
		array_push($this->erroresdatos, $this->feedback);
	}
	return $this->erroresdatos;
}

// comprueba la pass, letras y números, entre 3 y 30 carácteres
// si se detectaron errores los añade al array de erroers
function Comprobar_password(){
	$validar= new Validar();
	if($validar->Longitud_minima($this->password,5)===false){
		$this->code='000141';
		$this->ok=false;
		$this->resource='Password';
		$this->construct_response();
		array_push($this->erroresdatos, $this->feedback);
	}
	if($validar->Longitud_maxima($this->password,30)===false){
		$this->code='000142';
		$this->ok=false;
		$this->resource='Password';
		$this->construct_response();
		array_push($this->erroresdatos, $this->feedback);
	}
	if($validar->Es_alfanumerico($this->password)===false){
		$this->code='000143';
		$this->ok=false;
		$this->resource='Password';
		$this->construct_response();
		array_push($this->erroresdatos, $this->feedback);
	}
	return $this->erroresdatos;
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
	return $this->erroresdatos;
}
function Comprobar_dni(){
	$validar= new Validar();
	if($validar->Longitud_minima($this->dni,8)===false){
		
		$this->code='000162';
		$this->ok=false;
		$this->resource='dni';
		$this->construct_response();
		array_push($this->erroresdatos, $this->feedback);
	}else if($validar->Longitud_maxima($this->dni,10)===false){
		$this->code='000162';
		$this->ok=false;
		$this->resource='dni';
		$this->construct_response();
		array_push($this->erroresdatos, $this->feedback);
	}else{
		if($validar->Formato_dni($this->dni)===false){
		$this->code='000162';
		$this->ok=false;
		$this->resource='dni';
		$this->construct_response();
		array_push($this->erroresdatos, $this->feedback);
	}
}
return $this->erroresdatos;
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
		$this->code  = '000076'; // el email ya existe
		$this->construct_response();
		array_push($this->erroresdatos, $this->feedback);
		return false;
		}else {return true;}
}

function dni_unico(){
		$this->query = "SELECT *
					FROM USUARIOS
					WHERE (
						(DNI = '".$this->dni."') 
					)";
	
	$this->get_results_from_query();
	if ($this->feedback['code'] == '00008'){  // el recordset vuelve con datos
		$this->ok=false;
		$this->code  = '000077'; // el dni_unico ya existe
		$this->construct_response();
		array_push($this->erroresdatos, $this->feedback);
		return false;
		}else {return true;}
}

function usuario_unico(){
	$this->dni_unico();
	$this->email_unico();
	$this->login_unico();
	if($this->erroresdatos==[]){
		return true;
	}else{
	return $this->erroresdatos;
	}
}
//Metodo ADD
//Inserta en la tabla  de la bd  los valores
// de los atributos del objeto. Comprueba si la clave/s esta vacia y si 
//existe ya en la tabla

/* TODO poner dni unico*/
function ADD()
{
	if($this->Validar_atributos()===true && $this->usuario_unico()===true){

			$this->query = "INSERT INTO USUARIOS (
				login,
				password,
				nombre,
				apellidos,
				email,
				DNI) 
					VALUES (
						'".$this->login."',
						'".$this->password."',
						'".$this->nombre."',
						'".$this->apellidos."',
						'".$this->email."',
						'".$this->dni."'
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
				email LIKE '%".$this->email."%' AND
				DNI LIKE '%".$this->dni."%'
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
		$this->code = '000055'; //BOrrado realizado con exito
	}
	else
	{	//Error de gestor de base de datos
		$this->ok=false;
		$this->code = '000051';
	}
	$this->construct_response();
	return $this->feedback;
}

// funcion de busqueda: recupera todos los atributos de un usuario a partir de su clave [login]
//devuelve un array [clave]=valor;
function getById()
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

function getByName(){
	 $this->query = "SELECT *
			FROM USUARIOS
			WHERE 
				nombre = '".$this->nombre."'
			";

	$this->get_results_from_query();
	
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
	if($this->Validar_atributos()===true){
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
			$this->code  = '000054';
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

	if($this->Validar_atributos()===true && $this->usuario_unico()===true){

//creacion de nuevo usuario, se insertan sus dato, rol user por defecto
		$this->query = 
			"INSERT INTO USUARIOS (
				login,
				password,
				nombre,
				apellidos,
				email,
				DNI) 
			VALUES (
					'".$this->login."',
					'".$this->password."',
					'".$this->nombre."',
					'".$this->apellidos."',
					'".$this->email."',
					'".$this->dni."'
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

