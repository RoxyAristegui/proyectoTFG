<?php 

include_once '../Model/Rol_Model.php';
include_once '../Model/USUARIOS_Model.php';

function Edit_rol_Test(){

	global $Roles_array_test;

// creo array de almacen de test individual
	$array_test1 = array();

// comprobar success
//-------------------------------------------------------------------------------
	
	$array_test1['entidad'] = 'roles';	
	$array_test1['metodo'] = 'edit';
	$array_test1['error'] = 'Exito';
	$array_test1['error_esperado'] = '000311';
	$array_test1['error_obtenido'] = '';
	$array_test1['resultado'] = '';
	
	$rol_name = 'nuevo';
	$rol = new rol('prueba1');
	$rol->ADD();
	$rol->rol=$rol_name;

	$array_test1['error_obtenido'] = $rol->Edit()['code'];
	if ($array_test1['error_obtenido'] === $array_test1['error_esperado'])
	{
		$array_test1['resultado'] = 'OK';
	}
	else
	{
		$array_test1['resultado'] = 'FALSE';
	}

	array_push($Roles_array_test, $array_test1);
	$rol->DELETE();
// comprobar fallo
//-------------------------------------------------------------------------------
	
	$array_test1['entidad'] = 'roles';	
	$array_test1['metodo'] = 'edit';
	$array_test1['error'] = 'Error por duplicado';
	$array_test1['error_esperado'] = '000315';
	$array_test1['error_obtenido'] = '';
	$array_test1['resultado'] = '';
	
	
	$rol=  new rol('error');
	$rol->ADD();
	$rol2 = new rol('nuevo');
	$rol2->ADD();
	$rol->rol='nuevo';
	$array_test1['error_obtenido'] = $rol->Edit()['code'];
	if ($array_test1['error_obtenido'] === $array_test1['error_esperado'])
	{
		$array_test1['resultado'] = 'OK';
	}
	else
	{
		$array_test1['resultado'] = 'FALSE';
	}

	array_push($Roles_array_test, $array_test1);
	$rol->DELETE();
	$rol2->DELETE();

//----Comprobar no hay id---------------------------------------------------------------------------
	
	$array_test1['entidad'] = 'roles';	
	$array_test1['metodo'] = 'edit';
	$array_test1['error'] = 'No hay id';
	$array_test1['error_esperado'] = '000314';
	$array_test1['error_obtenido'] = '';
	$array_test1['resultado'] = '';
	
	$rol = new rol('noexistes');
	$array_test1['error_obtenido'] = $rol->Edit()['code'];
	if ($array_test1['error_obtenido'] === $array_test1['error_esperado'])
	{
		$array_test1['resultado'] = 'OK';
	}
	else
	{
		$array_test1['resultado'] = 'FALSE';
	}

	array_push($Roles_array_test, $array_test1);
	$rol->DELETE();



}

function Add_Rol_Test(){

	global $Roles_array_test;

// creo array de almacen de test individual
	$array_test1 = array();

// comprobar success
//-------------------------------------------------------------------------------
	
	$array_test1['entidad'] = 'rol';	
	$array_test1['metodo'] = 'add';
	$array_test1['error'] = 'Exito';
	$array_test1['error_esperado'] = '000311';
	$array_test1['error_obtenido'] = '';
	$array_test1['resultado'] = '';
	

	$rol = new Rol('prueba1');

	$array_test1['error_obtenido'] = $rol->ADD()['code'];
	if ($array_test1['error_obtenido'] === $array_test1['error_esperado'])
	{
		$array_test1['resultado'] = 'OK';
	}
	else
	{
		$array_test1['resultado'] = 'FALSE';
	}

	array_push($Roles_array_test, $array_test1);
	$rol->DELETE();
// comprobar fallo
//-------------------------------------------------------------------------------
	
	$array_test1['entidad'] = 'rol';	
	$array_test1['metodo'] = 'add';
	$array_test1['error'] = 'Error por duplicado';
	$array_test1['error_esperado'] = '000315';
	$array_test1['error_obtenido'] = '';
	$array_test1['resultado'] = '';
	
	
	$rol=  new rol('error');
	$rol->ADD();
	$array_test1['error_obtenido'] = $rol->ADD()['code'];
	if ($array_test1['error_obtenido'] === $array_test1['error_esperado'])
	{
		$array_test1['resultado'] = 'OK';
	}
	else
	{
		$array_test1['resultado'] = 'FALSE';
	}

	array_push($Roles_array_test, $array_test1);
	$rol->DELETE();


}



function getRolUsuario_Rol_Test(){

	global $Roles_array_test;

// creo array de almacen de test individual
	$array_test1 = array();

// comprobar success
//-------------------------------------------------------------------------------
	
	$array_test1['entidad'] = 'rol';	
	$array_test1['metodo'] = 'getRolUser';
	$array_test1['error'] = 'Exito';
	$array_test1['error_esperado'] = '2';
	$array_test1['error_obtenido'] = '';
	$array_test1['resultado'] = '';
	

	$rol = new Rol('');
	$login='usuarioPrueba';
	$user=new USUARIOS_Model($login,'password','nombre','apellidos','e@mail.com','26711548S');
	$user->ADD();

	$array_test1['error_obtenido'] = $rol->getRolUsuario($login);
	if ($array_test1['error_obtenido'] === $array_test1['error_esperado'])
	{
		$array_test1['resultado'] = 'OK';
	}
	else
	{
		$array_test1['resultado'] = 'FALSE';
	}

	array_push($Roles_array_test, $array_test1);
	$rol->DELETE();
	$user->DELETE();
// comprobar fallo
//-------------------------------------------------------------------------------
	
	$array_test1['entidad'] = 'rol';	
	$array_test1['metodo'] = 'getRolUser';
	$array_test1['error'] = 'no existe';
	$array_test1['error_esperado'] = '000314';
	$array_test1['error_obtenido'] = '';
	$array_test1['resultado'] = '';
	
	
	$rol=  new rol('error');

	$array_test1['error_obtenido'] = $rol->getRolUsuario('')['code'];
	if ($array_test1['error_obtenido'] === $array_test1['error_esperado'])
	{
		$array_test1['resultado'] = 'OK';
	}
	else
	{
		$array_test1['resultado'] = 'FALSE';
	}

	array_push($Roles_array_test, $array_test1);
	//$rol->DELETE();


}


function getByName_Roles_test(){
		global $Roles_array_test;

// creo array de almacen de test individual
	$array_test1 = array();

// comprobar success
//-------------------------------------------------------------------------------
	
	$array_test1['entidad'] = 'Rol';	
	$array_test1['metodo'] = 'getIdByName';
	$array_test1['error'] = 'Exito';
	$array_test1['error_esperado'] = '999';
	$array_test1['error_obtenido'] = '';
	$array_test1['resultado'] = '';
	

	$rol = new rol('prueba1',999);
	$rol->ADD();
	$rol2= new rol('prueba1');
	$array_test1['error_obtenido'] = $rol2->getByName();
	if ($array_test1['error_obtenido'] === $array_test1['error_esperado'])
	{
		$array_test1['resultado'] = 'OK';
	}
	else
	{
		$array_test1['resultado'] = 'FALSE';
	}

	array_push($Roles_array_test, $array_test1);
	$rol->DELETE();
// comprobar fallo
//-------------------------------------------------------------------------------
	
	$array_test1['entidad'] = 'rol';	
	$array_test1['metodo'] = 'getIdByName';
	$array_test1['error'] = 'No existe ese rol';
	$array_test1['error_esperado'] = '000314';
	$array_test1['error_obtenido'] = '';
	$array_test1['resultado'] = '';
	
	
	$rol=  new rol('prueba');
	$array_test1['error_obtenido'] = $rol->getByName()['code'];
	if ($array_test1['error_obtenido'] === $array_test1['error_esperado'])
	{
		$array_test1['resultado'] = 'OK';
	}
	else
	{
		$array_test1['resultado'] = 'FALSE';
	}

	array_push($Roles_array_test, $array_test1);
	//$rol->DELETE();


}


function getById_Roles_Test(){
		global $Roles_array_test;

// creo array de almacen de test individual
	$array_test1 = array();

// comprobar success
//-------------------------------------------------------------------------------
	
	$array_test1['entidad'] = 'rol';	
	$array_test1['metodo'] = 'getById';
	$array_test1['error'] = 'Exito';
	$array_test1['error_esperado'] = 'prueba2';
	$array_test1['error_obtenido'] = '';
	$array_test1['resultado'] = '';
	

	$rol = new rol('prueba2',77);
	$rol->ADD();
	$rol2= new rol('',77);
	$array_test1['error_obtenido'] = $rol2->getById();
	if ($array_test1['error_obtenido'] === $array_test1['error_esperado'])
	{
		$array_test1['resultado'] = 'OK';
	}
	else
	{
		$array_test1['resultado'] = 'FALSE';
	}

	array_push($Roles_array_test, $array_test1);
	$rol->DELETE();
// comprobar fallo
//-------------------------------------------------------------------------------
	
	$array_test1['entidad'] = 'rol';	
	$array_test1['metodo'] = 'getById';
	$array_test1['error'] = 'No existe ese rol';
	$array_test1['error_esperado'] = '000314';
	$array_test1['error_obtenido'] = '';
	$array_test1['resultado'] = '';
	
	
	$rol=  new rol('',132);
	$array_test1['error_obtenido'] = $rol->getById()['code'];
	if ($array_test1['error_obtenido'] === $array_test1['error_esperado'])
	{
		$array_test1['resultado'] = 'OK';
	}
	else
	{
		$array_test1['resultado'] = 'FALSE';
	}

	array_push($Roles_array_test, $array_test1);
	//$rol->DELETE();


}


getById_Roles_Test();
getByName_Roles_test();

Add_rol_Test();
Edit_rol_Test();
getRolUsuario_Rol_Test();

