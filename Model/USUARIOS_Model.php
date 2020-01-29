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
// si todas las funciones de comprobacion de atributos individuales son true devuelve true
// si alguna es false, devuelve el array de errores de datos

function Comprobar_atributos(){
	$this->Comprobar_nombre();
	$this->comprobar_password();
	$this->Comprobar_login();
	$this->Comprobar_email();
	return $this->erroresdatos;
}

// function Comprobar_login()
// Comprueba el formato del login 
//	alfanumerico
//	mayor o igual a 5
// 	menor o igual a 15
//	no vacio
// devuelve un true o un false y rellena en caso de error el array de errores de datos
function Comprobar_login()
{
	$validacion= new Validar($this->login,'Login',$this->erroresdatos);
	$valido=$validacion->stringAlfanumerico();
	$this->erroresdatos= $valido;
	return $valido;
}


// function Comprobar_nombre()
// Comprueba el formato del login 
//	alfanumerico
//	mayor o igual a 5
// 	menor o igual a 15
//	no vacio
// devuelve un true o un false y rellena en caso de error el array de errores de datos
function Comprobar_nombre()
{
	$validacion= new Validar($this->nombre,'nombre',$this->erroresdatos);
	$valido=$validacion->stringAlfanumerico();
	$this->erroresdatos= $valido;
	return $valido;
	
}

// comprueba la pass, letras y números, entre 3 y 30 carácteres
function Comprobar_password(){
	
	$validacion= new Validar($this->password,'password',$this->erroresdatos);
	$valido=$validacion->stringAlfanumerico();
	$this->erroresdatos= $valido;
	return $valido;
}

function Comprobar_email(){
	$validacion= new Validar($this->email,'email',$this->erroresdatos);
	$valido=$validacion->EsEmail();;
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

	if($comprobar==[]){
	$this->query = "select * from USUARIOS where login = '".$this->login."' or email = '".$this->email."'";

	/*if (!$result = $this->mysqli->query($sql))
	{
		return 'Error de gestor de base de datos';
	}*/

	$this->get_results_from_query();

	if ($this->feedback['code'] == '00008'){  // existe el usuario
			//return 'Inserción fallida: el elemento ya existe';
			return '000020';
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

		if (!$this->execute_single_query()) {
			//return 'Error de gestor de base de datos';
			return '000051';

		}
		else{
			return $this->feedback['code']; //operacion de insertado correcta
		}
		
	}
	return $this->feedback['code'];	
}else{
	return $comprobar;
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

	$sql = "SELECT *
			FROM USUARIOS
			WHERE (
				login LIKE '%".$this->login."%' AND
				password LIKE '%".$this->password."%' AND
				nombre LIKE '%".$this->nombre."%' AND
				apellidos LIKE '%".$this->apellidos."%' AND
				email LIKE '%".$this->email."%'
			)
	";
	if (!$resultado = $this->mysqli->query($sql))
		{
			return 'Error de gestor de base de datos';
		}
	return $resultado;
    
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
	{
		$resultado = 'Error de gestor de base de datos';
	}
	return $resultado;
}

// funcion RellenaDatos: recupera todos los atributos de una tupla a partir de su clave
function RellenaDatos()
{
    $sql = "SELECT *
			FROM USUARIOS
			WHERE (
				(login = '$this->login') 
			)";

	$this->get_results_from_query();
	
	if ($this->feedback['code'] = '00007')
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
		$this->code  = '00052'; //modificacion en bd correcta
	}
	else
	{
		$this->code  = '00074'; //error al modificar el usuario en la bd
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
		$this->code  = '00072'; // el login no existe	
	}
	else{
		$fila = $this->rows[0];
		if ($fila['password'] == $this->password){
			$this->ok = true;
			$this->code  = '00051'; //usuario y pass correctos
		}
		else{
			$this->ok = false;
			$this->code  = '00073'; // la pass no coincide
		}
	}
	$this->construct_response();
	return $this->feedback;

}//fin metodo login

//
function Register(){

	$this->query = "select * from USUARIOS where login = '".$this->login."'";
	$this->get_results_from_query();

	if ($this->feedback['code'] = '00008'){  // el recordset vuelve con datos
		$this->code  = '00071'; // el login ya existe
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

			if ($this->feedback['code'] = '00052'){ //sql ejecutado con exito
				$this->ok = true;
				$this->code  = '00053'; //registro realizado con exito
				$this->construct_response();
			}
										
		}

	return $this->feedback;
}

}//fin de clase

?> 