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
	
	$rol = new rol('rol1');
	$rol->ADD();
	$rol->rol='rol2';

	$array_test1['error_obtenido'] = $rol->EDIT()['code'];
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
	$array_test1['error_esperado'] = '000316';
	$array_test1['error_obtenido'] = '';
	$array_test1['resultado'] = '';
	
	
	$rol=  new rol('rol4');
	$rol->ADD();
	$rol2 = new rol('rol5');
	$rol2->ADD();
	$rol->rol='rol4';
	$array_test1['error_obtenido'] = $rol->EDIT()['code'];
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
	
	$rol = new rol('rol6');
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
	

	$rol = new Rol('rol7');

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
	$array_test1['error_esperado'] = '000316';
	$array_test1['error_obtenido'] = '';
	$array_test1['resultado'] = '';
	
	
	$rol=  new rol('rol8');
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

function Search_Rol_Test(){

	global $Roles_array_test;

// creo array de almacen de test individual
	$array_test1 = array();

// comprobar success
//-------------------------------------------------------------------------------
	
	$array_test1['entidad'] = 'rol';	
	$array_test1['metodo'] = 'search';
	$array_test1['error'] = 'Exito';
	$array_test1['error_esperado'] = 'array';
	$array_test1['error_obtenido'] = '';
	$array_test1['resultado'] = '';
	

	$rol = new Rol('');

	$array_test1['error_obtenido'] = gettype($rol->SEARCH());
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
	$array_test1['metodo'] = 'search';
	$array_test1['error'] = 'No se han encontrado roles';
	$array_test1['error_esperado'] = '000314';
	$array_test1['error_obtenido'] = '';
	$array_test1['resultado'] = '';
	
	
	$rol=  new rol('rol82');

	$array_test1['error_obtenido'] = $rol->SEARCH()['code'];
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



/*
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
	

	$rolUser = new Rol('');
	$login='usuarioprueba';
	$user=new USUARIOS_Model($login,'password','nombre','apellidos','e@mail.com','26711548S','2');
	$user->ADD();
	$array_test1['error_obtenido'] = $rolUser->getRolUsuario($login);
	if ($array_test1['error_obtenido'] === $array_test1['error_esperado'])
	{
		$array_test1['resultado'] = 'OK';
	}
	else
	{
		$array_test1['resultado'] = 'FALSE';
	}

	array_push($Roles_array_test, $array_test1);

	$user->DELETE();
// comprobar fallo
//-------------------------------------------------------------------------------
	
	$array_test1['entidad'] = 'rol';	
	$array_test1['metodo'] = 'getRolUser';
	$array_test1['error'] = 'no existe';
	$array_test1['error_esperado'] = '000314';
	$array_test1['error_obtenido'] = '';
	$array_test1['resultado'] = '';
	
	
	$rol=  new rol('rol9');

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
*/

function getByName_Roles_test(){
		global $Roles_array_test;

// creo array de almacen de test individual
	$array_test1 = array();

// comprobar success
//-------------------------------------------------------------------------------
	$rol= new rol('rol10');
	$rol->ADD();


	$array_test1['entidad'] = 'Rol';	
	$array_test1['metodo'] = 'getByName';
	$array_test1['error'] = 'Exito';
	$array_test1['error_esperado'] = $rol->id_rol;
	$array_test1['error_obtenido'] = '';
	$array_test1['resultado'] = '';
	
	$rol2=new Rol('rol10');

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
	$array_test1['metodo'] = 'getByName';
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
	

	$rol = new rol('prueba2');
	$rol->ADD();
	$rol2= new rol('',$rol->id_rol);
	$array_test1['error_obtenido'] = $rol2->getById()['rol'];
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
	
	
	$rol=  new rol('',13);
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



function setRolUsuario_Rol_Test(){

	global $Roles_array_test;

// creo array de almacen de test individual
	$array_test1 = array();

// comprobar success
//-------------------------------------------------------------------------------
	
	$array_test1['entidad'] = 'rol';	
	$array_test1['metodo'] = 'setRolUser';
	$array_test1['error'] = 'Exito';
	$array_test1['error_esperado'] = '000054';
	$array_test1['error_obtenido'] = '';
	$array_test1['resultado'] = '';
	

	$user=new USUARIOS_Model('usuarioprueba','password','nombre','apellidos','e@mail.com','26711548S','2');
	$user->ADD();
	$array_test1['error_obtenido'] = $user->setRol('1')['code'];
	if ($array_test1['error_obtenido'] === $array_test1['error_esperado'])
	{
		$array_test1['resultado'] = 'OK';
	}
	else
	{
		$array_test1['resultado'] = 'FALSE';
	}

	array_push($Roles_array_test, $array_test1);

	$user->DELETE();
// comprobar fallo
//-------------------------------------------------------------------------------
	
	$array_test1['entidad'] = 'rol';	
	$array_test1['metodo'] = 'setRolUser';
	$array_test1['error'] = 'no existe';
	$array_test1['error_esperado'] = '000078';
	$array_test1['error_obtenido'] = '';
	$array_test1['resultado'] = '';
	
	
	
	$user=new USUARIOS_Model('usuariopruweba','password','nombre','apellidos','e@mail.com','26711548S','2');
	
	$array_test1['error_obtenido'] = $user->setRol('5')['code'];
	if ($array_test1['error_obtenido'] === $array_test1['error_esperado'])
	{
		$array_test1['resultado'] = 'OK';
	}
	else
	{
		$array_test1['resultado'] = 'FALSE';
	}

	array_push($Roles_array_test, $array_test1);
	$user->DELETE();


}

function Delete_Rol_Test(){

	global $Roles_array_test;

// creo array de almacen de test individual
	$array_test1 = array();

// comprobar success
//-------------------------------------------------------------------------------
	
	$array_test1['entidad'] = 'rol';	
	$array_test1['metodo'] = 'DELETE';
	$array_test1['error'] = 'Exito';
	$array_test1['error_esperado'] = '000055';
	$array_test1['error_obtenido'] = '';
	$array_test1['resultado'] = '';
	

	$rol=new Rol('nuevoRol');
	$rol->ADD();
	$array_test1['error_obtenido'] = $rol->DELETE()['code'];
	if ($array_test1['error_obtenido'] === $array_test1['error_esperado'])
	{
		$array_test1['resultado'] = 'OK';
	}
	else
	{
		$array_test1['resultado'] = 'FALSE';
	}

	array_push($Roles_array_test, $array_test1);

// comprobar fallo
//-------------------------------------------------------------------------------
	
	$array_test1['entidad'] = 'rol';	
	$array_test1['metodo'] = 'DELETE';
	$array_test1['error'] = 'el Rol está asignado';
	$array_test1['error_esperado'] = '000313';
	$array_test1['error_obtenido'] = '';
	$array_test1['resultado'] = '';
	
	$rol= new Rol("nuevoRol2");
	$rol->ADD();
	$user=new USUARIOS_Model('usuariopruweba','password','nombre','apellidos','e@mail.com','26711548S',$rol->id_rol);
	$user->ADD();

	
	$array_test1['error_obtenido'] = $rol->DELETE()['code'];
	if ($array_test1['error_obtenido'] === $array_test1['error_esperado'])
	{
		$array_test1['resultado'] = 'OK';
	}
	else
	{
		$array_test1['resultado'] = 'FALSE';
	}

	array_push($Roles_array_test, $array_test1);
	$user->DELETE();



	$array_test1['entidad'] = 'rol';	
	$array_test1['metodo'] = 'DELETE';
	$array_test1['error'] = 'No se ha encontrado el rol';
	$array_test1['error_esperado'] = '000314';
	$array_test1['error_obtenido'] = '';
	$array_test1['resultado'] = '';
	
	$rol= new Rol("nuevoRol33");
	
	
	$array_test1['error_obtenido'] = $rol->DELETE()['code'];
	if ($array_test1['error_obtenido'] === $array_test1['error_esperado'])
	{
		$array_test1['resultado'] = 'OK';
	}
	else
	{
		$array_test1['resultado'] = 'FALSE';
	}

	array_push($Roles_array_test, $array_test1);
	

}



Add_rol_Test();
Edit_rol_Test();
getById_Roles_Test();
getByName_Roles_test();
Search_Rol_Test();
setRolUsuario_Rol_Test();
Delete_Rol_Test();
