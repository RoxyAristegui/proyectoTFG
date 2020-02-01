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
	$validacion= new Validar();
	$valido=$validacion->Validar_login($this->login,$this->erroresdatos);
	$this->erroresdatos= $valido;
	return $valido;
}

// Comprueba el formato del login 
//	alfanumericol, entre 3 y 30 carácteres
//	no vacio
// si se detectaron errores los añade al array de erroers
function Comprobar_nombre()
{
	$validacion= new Validar();
	$valido=$validacion->Validar_nombre($this->nombre,$this->erroresdatos);
	$this->erroresdatos= $valido;
	return $valido;
	
}

//Comrpeuba el formato de los apellidos, alfanumérico con espacios
function Comprobar_apellidos(){
	$validacion= new Validar();
	$valido=$validacion->Validar_apellidos($this->apellidos,$this->erroresdatos);
$this->erroresdatos= $valido;
	return $valido;
}

// comprueba la pass, letras y números, entre 3 y 30 carácteres
// si se detectaron errores los añade al array de erroers
function Comprobar_password(){
	
	$validacion= new Validar();
	$valido=$validacion->Validar_password($this->password,$this->erroresdatos);
	$this->erroresdatos= $valido;
	return $valido;
}

//comprueba que el email tenga un formato válido
// si se detectaron errores los añade al array de erroers
function Comprobar_email(){
	$validacion= new Validar();
	$valido=$validacion->Validar_email($this->email,$this->erroresdatos);
	$this->erroresdatos= $valido;
	return $valido;
}


//Metodo ADD
//Inserta en la tabla  de la bd  los valores
// de los atributos del objeto. Comprueba si la clave/s esta vacia y si 
//existe ya en la tabla
function ADD()
{
	$comprobar= $this->Comprobar_atributos();

	if($comprobar===true){
		$this->query = "select * from USUARIOS where login = '".$this->login."' or email = '".$this->email."'";
		$this->get_results_from_query();

		if ($this->feedback['code'] == '00008'){  // existe el usuario
				//return 'Inserción fallida: el usuario ya existe';
				return '000071';
		}else{
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
			
				return $this->feedback['code']; //operacion de insertado correcta
			
			
		}
		return $this->feedback['code'];	
	}else{
		return $this->erroresdatos;
}
}
    

//funcion de destrucción del objeto: se ejecuta automaticamente
//al finalizar el script
function __destruct()
{

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
		$resultado = 'Borrado realizado con éxito';
	}
	else
	{	//Error de gestor de base de datos
		$resultado = '000051';
	}
	return $resultado;
}

// funcion de bñusqueda: recupera todos los atributos de un usuario a partir de su clave [login]
//devuelve un array [clave]=valor;
function BuscarUsuarioPorLogin()
{
    $this->query = "SELECT *
			FROM USUARIOS
			WHERE 
				login = '$this->login'
			";

	$this->get_one_result_from_query();
	
	if ($this->feedback['code'] == '00007')
	{
			return "000072"; //error de ejecucion de la sql, noe xiste usuario con ese login
	}

	return $this->rows;
}


// funcion de bñusqueda: recupera todos los atributos de un usuario a partir de su email
//devuelve un array [clVE]=valor;
function BuscarUsuarioPorEmail()
{
    $this->query = "SELECT *
			FROM USUARIOS
			WHERE 
				email = '$this->email'
			";

	$this->get_one_result_from_query();
	
	if ($this->feedback['code'] == '00007')
	{
			return $this->feedback; //error de ejecucion de la sql de recuperación de datos
	}

	return $this->rows;
}

// funcion Edit: realizar el update de una tupla
function EDIT()
{
	$sql = "UPDATE USUARIOS
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

	if ($this->feedback['code'] == '00001')
	{
		$this->code  = '000052'; //modificacion en bd correcta
	}
	else
	{
		$this->code  = '000074'; //error al modificar el usuario en la bd
	}

	return $this->construct_response();
	
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

$comprobar=$this->Comprobar_atributos();
if($comprobar===true){
	$this->query = "select * from USUARIOS where login = '".$this->login."'";
	$this->get_results_from_query();

	if ($this->feedback['code'] == '00008'){  // el recordset vuelve con datos
		$this->ok=false;
		$this->resource="Registro";
		$this->code  = '000071'; // el login ya existe
		$this->construct_response();
		}
	else{
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
										
		}

	return $this->feedback;
	}else{
		return $this->erroresdatos;
	}
}

}//fin de clase

?> 