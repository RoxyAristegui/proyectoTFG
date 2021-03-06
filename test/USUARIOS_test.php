<?php
// Autor : jrodeiro
// Fecha : 23/9/2019
// Descripción : 
//	Fichero de test de unidad de la entidad USUARIOS
//	Saca por pantalla el resultado de los test
// incluir el modelo de la entidad USUARIOS
	include '../Model/USUARIOS_Model.php';

// function USUARIOS_Login_test()
// Valida:
//		login no existente
//		password no correcta para el login
//		login correcto

function USUARIOS_login_test()
{

	global $ERRORS_array_test;
// creo array de almacen de test individual
	$USUARIOS_array_test1 = array();

// Comprobar el login no existe
//-------------------------------------------------------------------------------
	
	$USUARIOS_array_test1['entidad'] = 'USUARIOS';	
	$USUARIOS_array_test1['metodo'] = 'login';
	$USUARIOS_array_test1['error'] = 'El login no existe';
	$USUARIOS_array_test1['error_esperado'] = '000072';
	$USUARIOS_array_test1['error_obtenido'] = '';
	$USUARIOS_array_test1['resultado'] = '';
	
	$login = 'loginerror';
	$usuarios = new USUARIOS_Model($login,'','','','','');
	$USUARIOS_array_test1['error_obtenido'] = $usuarios->login()['code'];
	if ($USUARIOS_array_test1['error_obtenido'] === $USUARIOS_array_test1['error_esperado'])
	{
		$USUARIOS_array_test1['resultado'] = 'OK';
	}
	else
	{
		$USUARIOS_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $USUARIOS_array_test1);

// Comprobar La password para este usuario no es correcta
//-------------------------------------------------------------------------------

	$USUARIOS_array_test1['entidad'] = 'USUARIOS';	
	$USUARIOS_array_test1['metodo'] = 'login';
	$USUARIOS_array_test1['error'] = 'La password para este usuario no es correcta';
	$USUARIOS_array_test1['error_esperado'] = '000073';
	$USUARIOS_array_test1['error_obtenido'] = '';
	$USUARIOS_array_test1['resultado'] = '';
	
	// Relleno los datos de usuario	
	$login = 'miusuario';
	$password = 'mipassword';
	$nombre = 'minombre'; 
	$apellidos = 'miapellido';
	$email = 'miemail@uvigo.es';
	$dni='84133440S';
// creo el modelo
	$usuarios = new USUARIOS_Model($login,$password,$nombre,$apellidos,$email,$dni);
// inserto la tupla
	$usuarios->ADD();


// cambio la password en el objeto modelo usuario
	$usuarios->password = 'passwordfalsa';

	$USUARIOS_array_test1['error_obtenido'] = $usuarios->login()['code'];
	if ($USUARIOS_array_test1['error_obtenido'] === $USUARIOS_array_test1['error_esperado'])
	{
		$USUARIOS_array_test1['resultado'] = 'OK';
	}
	else
	{
		$USUARIOS_array_test1['resultado'] = 'FALSE';
	}
	
	array_push($ERRORS_array_test, $USUARIOS_array_test1);		
// elimino la tupla
	$usuarios->DELETE();

// Comprobar login exitoso
//-------------------------------------------------------------------------------


	$USUARIOS_array_test1['entidad'] = 'USUARIOS';	
	$USUARIOS_array_test1['metodo'] = 'login';
	$USUARIOS_array_test1['error'] = 'Login Correcto';
	$USUARIOS_array_test1['error_esperado'] = '000010';
	$USUARIOS_array_test1['error_obtenido'] = '';
	$USUARIOS_array_test1['resultado'] = '';

// Relleno los datos de usuario	
	$login = 'miusuario';
	$password = 'mipassword';
	$nombre = 'minombre'; 
	$apellidos = 'miapellido2';
	$email = 'miemail@uvigo.es';
	$dni='84133440S';
// creo el modelo
	$usuarios = new USUARIOS_Model($login,$password,$nombre,$apellidos,$email,$dni);
// inserto la tupla
	$usuarios->ADD();
// pruebo el login
	$USUARIOS_array_test1['error_obtenido'] = $usuarios->login()['code'];
	if ($USUARIOS_array_test1['error_obtenido'] === $USUARIOS_array_test1['error_esperado'])
	{
		$USUARIOS_array_test1['resultado'] = 'OK';
	}
	else
	{
		$USUARIOS_array_test1['resultado'] = 'FALSE';
	}
	
	array_push($ERRORS_array_test, $USUARIOS_array_test1);	
// elimino la tupla
	$usuarios->DELETE();


}

function USUARIOS_Delete_Test(){
	global $ERRORS_array_test;
// creo array de almacen de test individual
	$USUARIOS_array_test1 = array();


	$USUARIOS_array_test1['entidad'] = 'USUARIOS';	
	$USUARIOS_array_test1['metodo'] = 'DELETE';
	$USUARIOS_array_test1['error'] = 'Eliminación Correcta';
	$USUARIOS_array_test1['error_esperado'] = '000055';
	$USUARIOS_array_test1['error_obtenido'] = '';
	$USUARIOS_array_test1['resultado'] = '';

// Relleno los datos de usuario	
	$login = 'miusuario';
	$password = 'mipassword';
	$nombre = 'minombre'; 
	$apellidos = 'miapellido2';
	$email = 'miemail@uvigo.es';
	$dni='84133440S';
// creo el modelo
	$usuarios = new USUARIOS_Model($login,$password,$nombre,$apellidos,$email,$dni);
// inserto la tupla
	$usuarios->ADD();
// elimino
	$USUARIOS_array_test1['error_obtenido'] = $usuarios->DELETE()['code'];
	if ($USUARIOS_array_test1['error_obtenido'] === $USUARIOS_array_test1['error_esperado'])
	{
		$USUARIOS_array_test1['resultado'] = 'OK';
	}
	else
	{
		$USUARIOS_array_test1['resultado'] = 'FALSE';
	}
	
	array_push($ERRORS_array_test, $USUARIOS_array_test1);	


}





// function USUARIOS_Register_test()
// Valida:
//		usuario ya existe
//		el usuario no existe, inserción correcta
//		

function USUARIOS_Registrar_test()
{

	global $ERRORS_array_test;
// creo array de almacen de test individual
	$USUARIOS_array_test1 = array();

// Comprobar el login existe
	$USUARIOS_array_test1['entidad'] = 'USUARIOS';	
	$USUARIOS_array_test1['metodo'] = 'Registrar';
	$USUARIOS_array_test1['error'] = 'El login ya existe';
	$USUARIOS_array_test1['error_esperado'] = '000071';
	$USUARIOS_array_test1['error_obtenido'] = '';
	$USUARIOS_array_test1['resultado'] = '';
	
	// Relleno los datos de usuario	
	$login = 'miusuario';
	$password = 'mipassword';
	$nombre = 'minombre'; 
	$apellidos = 'miapellido';
	$email = 'miemail@uvigo.es';
	$dni='84133440S';
// creo el modelo
	$usuarios = new USUARIOS_Model($login,$password,$nombre,$apellidos,$email,$dni);
// inserto la tupla
	$usuarios->ADD();
	$usuarios->email="otroemail@mail.com";
	$usuarios->dni="53604521P";

	$USUARIOS_array_test1['error_obtenido'] = $usuarios->register()[0]["code"];
	if ($USUARIOS_array_test1['error_obtenido'] === $USUARIOS_array_test1['error_esperado'])
	{
		$USUARIOS_array_test1['resultado'] = 'OK';
	}
	else
	{
		$USUARIOS_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $USUARIOS_array_test1);

	$usuarios->DELETE();	

// Comprobar el dni existe
	$USUARIOS_array_test1['entidad'] = 'USUARIOS';	
	$USUARIOS_array_test1['metodo'] = 'Registrar';
	$USUARIOS_array_test1['error'] = 'El dni ya existe';
	$USUARIOS_array_test1['error_esperado'] = '000077';
	$USUARIOS_array_test1['error_obtenido'] = '';
	$USUARIOS_array_test1['resultado'] = '';
	
	// Relleno los datos de usuario	
	$login = 'miusuario';
	$password = 'mipassword';
	$nombre = 'minombre'; 
	$apellidos = 'miapellido';
	$email = 'miemail@uvigo.es';
	$dni='84133440S';
// creo el modelo
	$usuarios = new USUARIOS_Model($login,$password,$nombre,$apellidos,$email,$dni);
// inserto la tupla
	$usuarios->ADD();

	$usuarios2 = new USUARIOS_Model("otrologin",$password,$nombre,$apellidos,"otroemail@mail.com",$dni);

	$USUARIOS_array_test1['error_obtenido'] = $usuarios2->register()[0]["code"];
	if ($USUARIOS_array_test1['error_obtenido'] === $USUARIOS_array_test1['error_esperado'])
	{
		$USUARIOS_array_test1['resultado'] = 'OK';
	}
	else
	{
		$USUARIOS_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $USUARIOS_array_test1);

	$usuarios->DELETE();	

// Comprobar el dni existe
	$USUARIOS_array_test1['entidad'] = 'USUARIOS';	
	$USUARIOS_array_test1['metodo'] = 'Registrar';
	$USUARIOS_array_test1['error'] = 'El email ya existe';
	$USUARIOS_array_test1['error_esperado'] = '000076';
	$USUARIOS_array_test1['error_obtenido'] = '';
	$USUARIOS_array_test1['resultado'] = '';
	
	// Relleno los datos de usuario	
	$login = 'miusuario';
	$password = 'mipassword';
	$nombre = 'minombre'; 
	$apellidos = 'miapellido';
	$email = 'miemail@uvigo.es';
	$dni='84133440S';
// creo el modelo
	$usuarios = new USUARIOS_Model($login,$password,$nombre,$apellidos,$email,$dni);
// inserto la tupla
	$usuarios->ADD();

	$usuarios2 = new USUARIOS_Model("otrologin",$password,$nombre,$apellidos,$email,'08117487M');

	$USUARIOS_array_test1['error_obtenido'] = $usuarios2->register()[0]["code"];
	if ($USUARIOS_array_test1['error_obtenido'] === $USUARIOS_array_test1['error_esperado'])
	{
		$USUARIOS_array_test1['resultado'] = 'OK';
	}
	else
	{
		$USUARIOS_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $USUARIOS_array_test1);

	$usuarios->DELETE();

// Comprobar Inserción realizada con éxito
	$USUARIOS_array_test1['entidad'] = 'USUARIOS';	
	$USUARIOS_array_test1['metodo'] = 'Registrar';
	$USUARIOS_array_test1['error'] = 'Inserción realizada con éxito';
	$USUARIOS_array_test1['error_esperado'] = '000053';
	$USUARIOS_array_test1['error_obtenido'] = '';
	$USUARIOS_array_test1['resultado'] = '';
	
	$login = 'prueba1';
	$password = 'pruebita';
	$nombre = 'superprueba'; 
	$apellidos = 'probando';
	$email = 'proba@uvigo.es';
	$dni='84133440S';

	$usuarios = new USUARIOS_Model($login,$password,$nombre,$apellidos,$email,$dni);
	$USUARIOS_array_test1['error_obtenido'] = $usuarios->register()["code"];
	if ($USUARIOS_array_test1['error_obtenido'] === $USUARIOS_array_test1['error_esperado'])
	{
		$USUARIOS_array_test1['resultado'] = 'OK';
	}
	else
	{
		$USUARIOS_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $USUARIOS_array_test1);

	$usuarios->DELETE();


}

// function USUARIOS_add_test()
// Valida:
//		usuario ya existe
//		el usuario no existe
//		

function USUARIOS_ADD_test()
{

	global $ERRORS_array_test;
// creo array de almacen de test individual
	$USUARIOS_array_test1 = array();

// Comprobar el login existe
	$USUARIOS_array_test1['entidad'] = 'USUARIOS';	
	$USUARIOS_array_test1['metodo'] = 'ADD';
	$USUARIOS_array_test1['error'] = 'El login ya existe';
	$USUARIOS_array_test1['error_esperado'] = '000071';
	$USUARIOS_array_test1['error_obtenido'] = '';
	$USUARIOS_array_test1['resultado'] = '';
	
	// Relleno los datos de usuario	
	$login = 'miusuario';
	$password = 'mipassword';
	$nombre = 'minombre'; 
	$apellidos = 'miapellido';
	$email = 'miemail@uvigo.es';
	$dni='84133440S';
// creo el modelo
	$usuarios = new USUARIOS_Model($login,$password,$nombre,$apellidos,$email,$dni);
// inserto la tupla
	$usuarios->ADD();

	$usuarios->email="otroemail@mail.com";
	$usuarios->dni="53604521P";

	$USUARIOS_array_test1['error_obtenido'] = $usuarios->ADD()[0]['code'];
	if ($USUARIOS_array_test1['error_obtenido'] === $USUARIOS_array_test1['error_esperado'])
	{
		$USUARIOS_array_test1['resultado'] = 'OK';
	}
	else
	{
		$USUARIOS_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $USUARIOS_array_test1);

	$usuarios->DELETE();	

// Comprobar el dni existe
	$USUARIOS_array_test1['entidad'] = 'USUARIOS';	
	$USUARIOS_array_test1['metodo'] = 'ADD';
	$USUARIOS_array_test1['error'] = 'El dni ya existe';
	$USUARIOS_array_test1['error_esperado'] = '000077';
	$USUARIOS_array_test1['error_obtenido'] = '';
	$USUARIOS_array_test1['resultado'] = '';
	
	// Relleno los datos de usuario	
	$login = 'miusuario';
	$password = 'mipassword';
	$nombre = 'minombre'; 
	$apellidos = 'miapellido';
	$email = 'miemail@uvigo.es';
	$dni='84133440S';
// creo el modelo
	$usuarios = new USUARIOS_Model($login,$password,$nombre,$apellidos,$email,$dni);
// inserto la tupla
	$usuarios->ADD();
	$usuarios2= new USUARIOS_Model("otrologin",$password,$nombre,$apellidos,"otroemail@mail.com",$dni);

	$USUARIOS_array_test1['error_obtenido'] = $usuarios2->ADD()[0]["code"];
	if ($USUARIOS_array_test1['error_obtenido'] === $USUARIOS_array_test1['error_esperado'])
	{
		$USUARIOS_array_test1['resultado'] = 'OK';
	}
	else
	{
		$USUARIOS_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $USUARIOS_array_test1);

	$usuarios->DELETE();
	$usuarios2->DELETE();


// Comprobar email existe
	$USUARIOS_array_test1['entidad'] = 'USUARIOS';	
	$USUARIOS_array_test1['metodo'] = 'ADD';
	$USUARIOS_array_test1['error'] = 'El email ya existe';
	$USUARIOS_array_test1['error_esperado'] = '000076';
	$USUARIOS_array_test1['error_obtenido'] = '';
	$USUARIOS_array_test1['resultado'] = '';
	
	$login = 'miusuario';
	$password = 'mipassword';
	$nombre = 'minombre'; 
	$apellidos = 'miapellido';
	$email = 'miemail@uvigo.es';
	$dni='84133440S';

	$usuarios = new USUARIOS_Model($login,$password,$nombre,$apellidos,$email,$dni);
	$usuarios->ADD();

	$usuarios2=  new USUARIOS_Model('miusuario2',$password,$nombre,$apellidos,$email,'08117487M');

	$USUARIOS_array_test1['error_obtenido'] = $usuarios2->ADD()[0]['code'];

	if ($USUARIOS_array_test1['error_obtenido'] === $USUARIOS_array_test1['error_esperado'])
	{
		$USUARIOS_array_test1['resultado'] = 'OK';
	}
	else
	{
		$USUARIOS_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $USUARIOS_array_test1);	

	$usuarios->DELETE();
	$usuarios2->DELETE();

// Comprobar Inserción realizada con éxito
	$USUARIOS_array_test1['entidad'] = 'USUARIOS';	
	$USUARIOS_array_test1['metodo'] = 'ADD';
	$USUARIOS_array_test1['error'] = 'Inserción realizada con éxito';
	$USUARIOS_array_test1['error_esperado'] = '00001';
	$USUARIOS_array_test1['error_obtenido'] = '';
	$USUARIOS_array_test1['resultado'] = '';
	
	$login = 'prueba1';
	$password = 'prueba';
	$nombre = 'proooo'; 
	$apellidos = 'bando bando';
	$email = 'preuba@uvigo.es';
	$dni='84133440S';

	$usuarios = new USUARIOS_Model($login,$password,$nombre,$apellidos,$email,$dni);
	$USUARIOS_array_test1['error_obtenido'] = $usuarios->ADD()['code'];
	if ($USUARIOS_array_test1['error_obtenido'] === $USUARIOS_array_test1['error_esperado'])
	{
		$USUARIOS_array_test1['resultado'] = 'OK';
	}else{
		$USUARIOS_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $USUARIOS_array_test1);

	$usuarios->DELETE();


}

function USUARIOS_EDIT_test(){
	
	global $ERRORS_array_test;
// creo array de almacen de test individual
	$USUARIOS_array_test1 = array();

// Comprobar Loginno existe
		$USUARIOS_array_test1['entidad'] = 'USUARIOS';	
	$USUARIOS_array_test1['metodo'] = 'EDIT';
	$USUARIOS_array_test1['error'] = 'Ya existe un usuario con ese email';
	$USUARIOS_array_test1['error_esperado'] = '000076';
	$USUARIOS_array_test1['error_obtenido'] = '';
	$USUARIOS_array_test1['resultado'] = '';

		$login = 'responsable';
	$password = 'mipassword';
	$nombre = 'minombre'; 
	$apellidos = 'miapellido2';
	$email = 'admin@uvigo.es';
	$dni='84133440S';

	$usuarios = new USUARIOS_Model($login,$password,$nombre,$apellidos,$email,$dni);
	$USUARIOS_array_test1['error_obtenido'] = $usuarios->EDIT()['code'];
	if ($USUARIOS_array_test1['error_obtenido'] === $USUARIOS_array_test1['error_esperado'])
	{
		$USUARIOS_array_test1['resultado'] = 'OK';
	}
	else
	{
		$USUARIOS_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $USUARIOS_array_test1);

	
//-------------------------------------------------------------------------------

// Comprobar edidicion correcta
	$USUARIOS_array_test1['entidad'] = 'USUARIOS';	
	$USUARIOS_array_test1['metodo'] = 'EDIT';
	$USUARIOS_array_test1['error'] = 'Modificar correcta';
	$USUARIOS_array_test1['error_esperado'] = '000054';
	$USUARIOS_array_test1['error_obtenido'] = '';
	$USUARIOS_array_test1['resultado'] = '';

		$login = 'miusuario';
	$password = 'mipassword';
	$nombre = 'minombre'; 
	$apellidos = 'miapellido2';
	$email = 'miemailnueevo@uvigo.es';
	$dni='84133440S';

	$usuarios = new USUARIOS_Model($login,$password,$nombre,$apellidos,$email,$dni);
	$usuarios->ADD();
	$nombre = 'otronombre'; 
	$usuarios2=new  USUARIOS_Model($login,$password,$nombre,$apellidos,$email,$dni);

	$USUARIOS_array_test1['error_obtenido'] = $usuarios2->EDIT()['code'];
	if ($USUARIOS_array_test1['error_obtenido'] === $USUARIOS_array_test1['error_esperado'])
	{
		$USUARIOS_array_test1['resultado'] = 'OK';
	}
	else
	{
		$USUARIOS_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $USUARIOS_array_test1);

	//$usuarios->DELETE();
	$usuarios2->DELETE();

}


function USUARIOS_SEARCH_test(){

	global $ERRORS_array_test;
// creo array de almacen de test individual
	$USUARIOS_array_test1 = array();

//comprobar bśqueda errónea
		$USUARIOS_array_test1['entidad'] = 'USUARIOS';	
	$USUARIOS_array_test1['metodo'] = 'SEARCH';
	$USUARIOS_array_test1['error'] = 'Error al realizar una búsqueda';
	$USUARIOS_array_test1['error_esperado'] = '000056';
	$USUARIOS_array_test1['error_obtenido'] = '';
	$USUARIOS_array_test1['resultado'] = '';

		$login = 'miusuario';
	$password = 'mipassword';
	$nombre = 'minombre'; 
	$apellidos = 'miapellido2';
	$email = 'miemail@uvigo.es';
	$dni='84133440S';

	$usuarios = new USUARIOS_Model($login,$password,$nombre,$apellidos,'','');
	$USUARIOS_array_test1['error_obtenido'] = $usuarios->SEARCH()["code"];
	if ($USUARIOS_array_test1['error_obtenido'] === $USUARIOS_array_test1['error_esperado'])
	{
		$USUARIOS_array_test1['resultado'] = 'OK';
	}	else	{
		$USUARIOS_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $USUARIOS_array_test1);

	$usuarios->DELETE();


//comprobar búsqueda correcta
		$USUARIOS_array_test1['entidad'] = 'USUARIOS';	
	$USUARIOS_array_test1['metodo'] = 'SEARCH';
	$USUARIOS_array_test1['error'] = 'Devuelve el recordset';
	$USUARIOS_array_test1['error_esperado'] = 'array';
	$USUARIOS_array_test1['error_obtenido'] = '';
	$USUARIOS_array_test1['resultado'] = '';

		$login = 'miusuario';
	$password = 'mipassword';
	$nombre = 'minombre'; 
	$apellidos = 'miapellido2';
	$email = 'miemail@uvigo.es';

	$usuarios= new  USUARIOS_Model($login,$password,$nombre,$apellidos,$email,$dni);
	$usuarios->ADD();
	$buscar= new  USUARIOS_Model($login,'','','','','');
	$USUARIOS_array_test1['error_obtenido'] = gettype($buscar->SEARCH());
	if ($USUARIOS_array_test1['error_obtenido'] === $USUARIOS_array_test1['error_esperado'])
	{
		$USUARIOS_array_test1['resultado'] = 'OK';
	}
	else
	{
		$USUARIOS_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $USUARIOS_array_test1);

	$usuarios->DELETE();
	$buscar->DELETE();
}

function USUARIOS_BuscarUsuarioPorClave_test()
{

	global $ERRORS_array_test;
// creo array de almacen de test individual
	$USUARIOS_array_test1 = array();

// Comprobar el login no existe
//--------------------------------------------------
	$USUARIOS_array_test1['entidad'] = 'USUARIOS';	
	$USUARIOS_array_test1['metodo'] = 'BuscarPorClave';
	$USUARIOS_array_test1['error'] = 'El usuario no existe';
	$USUARIOS_array_test1['error_esperado'] = '000072';
	$USUARIOS_array_test1['error_obtenido'] = '';
	$USUARIOS_array_test1['resultado'] = '';
	
	// Relleno los datos de usuario	
	$login = 'noexistes';
	
// creo el modelo
	$usuarios = new USUARIOS_Model($login,'','','','','');


	$USUARIOS_array_test1['error_obtenido'] = $usuarios->getById()['code'];
	if ($USUARIOS_array_test1['error_obtenido'] === $USUARIOS_array_test1['error_esperado'])
	{
		$USUARIOS_array_test1['resultado'] = 'OK';
	}
	else
	{
		$USUARIOS_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $USUARIOS_array_test1);

// Comprobar devuelve recordset
//----------------------------------------------
	$USUARIOS_array_test1['entidad'] = 'USUARIOS';	
	$USUARIOS_array_test1['metodo'] = 'BuscarPorClave';
	$USUARIOS_array_test1['error'] = 'Devuelve el recordset';
	$USUARIOS_array_test1['error_esperado'] = 'array';
	$USUARIOS_array_test1['error_obtenido'] = '';
	$USUARIOS_array_test1['resultado'] = '';
	
	$login = 'prueba1';
	$password = 'prueba';
	$nombre = 'proooo'; 
	$apellidos = 'bando bando';
	$email = 'preuba@uvigo.es';
	$dni='84133440S';

	$usuarios = new USUARIOS_Model($login,$password,$nombre,$apellidos,$email,$dni);
	$USUARIOS_array_test1['error_obtenido'] = $usuarios->ADD();


	$USUARIOS_array_test1['error_obtenido'] = gettype($usuarios->getById());
	if ($USUARIOS_array_test1['error_obtenido'] === $USUARIOS_array_test1['error_esperado'])
	{
		$USUARIOS_array_test1['resultado'] = 'OK';
	}
	else
	{
		$USUARIOS_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $USUARIOS_array_test1);

	$usuarios->DELETE();

}


function USUARIOS_BuscarUsuarioPorEmail_test()
{

	global $ERRORS_array_test;
// creo array de almacen de test individual
	$USUARIOS_array_test1 = array();

// Comprobar el email no existe
//--------------------------------------------------
	$USUARIOS_array_test1['entidad'] = 'USUARIOS';	
	$USUARIOS_array_test1['metodo'] = 'BuscarUsuarioEmail';
	$USUARIOS_array_test1['error'] = 'El usuario a rellenar no existe';
	$USUARIOS_array_test1['error_esperado'] = '000075';
	$USUARIOS_array_test1['error_obtenido'] = '';
	$USUARIOS_array_test1['resultado'] = '';
	
	// Relleno los datos de usuario	
	$email = 'noexistes';
	
// creo el modelo
	$usuarios = new USUARIOS_Model('','','','',$email,'');


	$USUARIOS_array_test1['error_obtenido'] = $usuarios->getByEmail()['code'];
	if ($USUARIOS_array_test1['error_obtenido'] === $USUARIOS_array_test1['error_esperado'])
	{
		$USUARIOS_array_test1['resultado'] = 'OK';
	}
	else
	{
		$USUARIOS_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $USUARIOS_array_test1);

// Comprobar devuelve recordset
//----------------------------------------------
	$USUARIOS_array_test1['entidad'] = 'USUARIOS';	
	$USUARIOS_array_test1['metodo'] = 'BuscarUsuarioEmail';
	$USUARIOS_array_test1['error'] = 'Devuelve el recordset';
	$USUARIOS_array_test1['error_esperado'] = 'array';
	$USUARIOS_array_test1['error_obtenido'] = '';
	$USUARIOS_array_test1['resultado'] = '';
	
	$login = 'prueba1';
	$password = 'prueba';
	$nombre = 'proooo'; 
	$apellidos = 'bando bando';
	$email = 'preuba@uvigo.es';
	$dni='84133440S';

	$usuarios = new USUARIOS_Model($login,$password,$nombre,$apellidos,$email,$dni);
	$USUARIOS_array_test1['error_obtenido'] = $usuarios->ADD();


	$USUARIOS_array_test1['error_obtenido'] = gettype($usuarios->getByEmail());
	if ($USUARIOS_array_test1['error_obtenido'] === $USUARIOS_array_test1['error_esperado'])
	{
		$USUARIOS_array_test1['resultado'] = 'OK';
	}
	else
	{
		$USUARIOS_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $USUARIOS_array_test1);

	$usuarios->DELETE();

}

	USUARIOS_login_test();
	USUARIOS_Registrar_test();
	USUARIOS_ADD_test();
	USUARIOS_EDIT_test();
	USUARIOS_SEARCH_test();
	USUARIOS_BuscarUsuarioPorClave_test();
	USUARIOS_BuscarUsuarioPorEmail_test();
	USUARIOS_Delete_Test();

?>


