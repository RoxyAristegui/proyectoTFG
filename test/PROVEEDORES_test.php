<?php 

include '../Model/PROVEEDORES_Model.php';



function PROVEEDORES_ADD_test()
{

	global $PROV_array_test;
// creo array de almacen de test individual
	$array_test1 = array();

// comprobar success
//-------------------------------------------------------------------------------
	
	$array_test1['entidad'] = 'proveedores';	
	$array_test1['metodo'] = 'add';
	$array_test1['error'] = 'Exito';
	$array_test1['error_esperado'] = '00001';
	$array_test1['error_obtenido'] = '';
	$array_test1['resultado'] = '';
	
	$prov = new PROVEEDORES_Model('123456789','empresita','aqui','alli','35432','email@mail.com','999888999','987654321','pepe');


	$array_test1['error_obtenido'] = $prov->ADD()['code'];
	if ($array_test1['error_obtenido'] === $array_test1['error_esperado'])
	{
		$array_test1['resultado'] = 'OK';
	}
	else
	{
		$array_test1['resultado'] = 'FALSE';
	}

	array_push($PROV_array_test, $array_test1);
	$prov->DELETE();
// comprobar fallo


// el CIF ya existe
//-------------------------------------------------------------------------------
	
	$array_test1['entidad'] = 'proveedores';	
	$array_test1['metodo'] = 'add';
	$array_test1['error'] = 'CIF ya existe';
	$array_test1['error_esperado'] = '004071';
	$array_test1['error_obtenido'] = '';
	$array_test1['resultado'] = '';
	
	$prov = new PROVEEDORES_Model('123456789','empresita','aqui','alli','35432','email@mail.com','999888999','987654321','pepe');
	$prov->ADD();

	$array_test1['error_obtenido'] = $prov->ADD()[0]['code'];
	if ($array_test1['error_obtenido'] === $array_test1['error_esperado'])
	{
		$array_test1['resultado'] = 'OK';
	}
	else
	{
		$array_test1['resultado'] = 'FALSE';
	}

	array_push($PROV_array_test, $array_test1);
	$prov->DELETE();
// comprobar fallo

}


function PROVEEDORES_EDIT_test()
{

	global $PROV_array_test;
// creo array de almacen de test individual
	$array_test1 = array();

// comprobar success
//-------------------------------------------------------------------------------
	
	$array_test1['entidad'] = 'proveedores';	
	$array_test1['metodo'] = 'edit';
	$array_test1['error'] = 'Exito';
	$array_test1['error_esperado'] = '000054';
	$array_test1['error_obtenido'] = '';
	$array_test1['resultado'] = '';
	
	$prov = new PROVEEDORES_Model('123456789','empresita','aqui','alli','35432','email@mail.com','999888999','987654321','pepe');
	$prov->ADD();
	$prov2 = new PROVEEDORES_Model('123456789','noempresa','enotrolado','alla','35433','nemail@mail.com','999888999','987654321','pepe');

	$array_test1['error_obtenido'] = $prov2->EDIT()['code'];
	if ($array_test1['error_obtenido'] === $array_test1['error_esperado'])
	{
		$array_test1['resultado'] = 'OK';
	}
	else
	{
		$array_test1['resultado'] = 'FALSE';
	}

	array_push($PROV_array_test, $array_test1);
	$prov2->DELETE();
// comprobar fallo

}

function PROVEEDORES_DELETE_test()
{

	global $PROV_array_test;
// creo array de almacen de test individual
	$array_test1 = array();

// comprobar success
//-------------------------------------------------------------------------------
	
	$array_test1['entidad'] = 'proveedores';	
	$array_test1['metodo'] = 'delete';
	$array_test1['error'] = 'Exito';
	$array_test1['error_esperado'] = '000055';
	$array_test1['error_obtenido'] = '';
	$array_test1['resultado'] = '';
	
	$prov = new PROVEEDORES_Model('123456789','empresita','aqui','alli','35432','email@mail.com','999888999','987654321','pepe');
	$prov->ADD();
	
	$array_test1['error_obtenido'] = $prov->DELETE()['code'];
	if ($array_test1['error_obtenido'] === $array_test1['error_esperado'])
	{
		$array_test1['resultado'] = 'OK';
	}
	else
	{
		$array_test1['resultado'] = 'FALSE';
	}

	array_push($PROV_array_test, $array_test1);

// comprobar fallo
//-------------------------------------------------------------------------------

	$array_test1['entidad'] = 'proveedores';
	$array_test1['metodo'] = 'delete';
	$array_test1['error'] = 'Error';
	$array_test1['error_esperado'] = '004073';
	$array_test1['error_obtenido'] = '';
	$array_test1['resultado'] = '';

	include_once '../Model/OBRAS_Model.php';
	$prov = new PROVEEDORES_Model('123456789','empresita','aqui','alli','35432','email@mail.com','999888999','987654321','pepe');
	$prov->ADD();
	$obra= new OBRAS_Model('1234567891','prueba','','','123456789','1','','','');
    $obra->ADD();
	$array_test1['error_obtenido'] = $prov->DELETE()['code'];
	if ($array_test1['error_obtenido'] === $array_test1['error_esperado'])
	{
		$array_test1['resultado'] = 'OK';
	}
	else
	{
		$array_test1['resultado'] = 'FALSE';
	}
	array_push($PROV_array_test, $array_test1);

    $obra->DELETE();
	$prov->DELETE();

}

function PROVEEDORES_SEARCH_test()
{

	global $PROV_array_test;
// creo array de almacen de test individual
	$array_test1 = array();

// comprobar success
//-------------------------------------------------------------------------------
	
	$array_test1['entidad'] = 'proveedores';	
	$array_test1['metodo'] = 'search';
	$array_test1['error'] = 'Exito';
	$array_test1['error_esperado'] = 'array';
	$array_test1['error_obtenido'] = '';
	$array_test1['resultado'] = '';
	
	$prov = new PROVEEDORES_Model('123456789','empresita','aqui','alli','35432','email@mail.com','999888999','987654321','pepe');
	$prov->ADD();
	$array_test1['error_obtenido'] = gettype($prov->SEARCH());
	if ($array_test1['error_obtenido'] === $array_test1['error_esperado'])
	{
		$array_test1['resultado'] = 'OK';
	}
	else
	{
		$array_test1['resultado'] = 'FALSE';
	}

	array_push($PROV_array_test, $array_test1);
	$prov->DELETE();
// comprobar fallo

// comprobar success
//-------------------------------------------------------------------------------
	
	$array_test1['entidad'] = 'proveedores';	
	$array_test1['metodo'] = 'search';
	$array_test1['error'] = 'No se ha encontrado';
	$array_test1['error_esperado'] = '000056';
	$array_test1['error_obtenido'] = '';
	$array_test1['resultado'] = '';
    $prov = new PROVEEDORES_Model('33','empresita','aqui','alli','35432','email@mail.com','999888999','987654321','pepe');

	$array_test1['error_obtenido'] = $prov->SEARCH()['code'];
	if ($array_test1['error_obtenido'] === $array_test1['error_esperado'])
	{
		$array_test1['resultado'] = 'OK';
	}
	else
	{
		$array_test1['resultado'] = 'FALSE';
	}

	array_push($PROV_array_test, $array_test1);
	
}


function PROVEEDORES_getById_test()
{

	global $PROV_array_test;
// creo array de almacen de test individual
	$array_test1 = array();

// comprobar success
//-------------------------------------------------------------------------------
	
	$array_test1['entidad'] = 'proveedores';	
	$array_test1['metodo'] = 'getByid';
	$array_test1['error'] = 'Exito';
	$array_test1['error_esperado'] = 'array';
	$array_test1['error_obtenido'] = '';
	$array_test1['resultado'] = '';
	
	$prov = new PROVEEDORES_Model('123456789','empresita','aqui','alli','35432','email@mail.com','999888999','987654321','pepe');
	$prov->ADD();
	$array_test1['error_obtenido'] = gettype($prov->getByid());
	if ($array_test1['error_obtenido'] === $array_test1['error_esperado'])
	{
		$array_test1['resultado'] = 'OK';
	}
	else
	{
		$array_test1['resultado'] = 'FALSE';
	}

	array_push($PROV_array_test, $array_test1);
	$prov->DELETE();
// comprobar fallo

// comprobar success
//-------------------------------------------------------------------------------
	
	$array_test1['entidad'] = 'proveedores';	
	$array_test1['metodo'] = 'getById';
	$array_test1['error'] = 'No se ha encontrado';
	$array_test1['error_esperado'] = '004072';
	$array_test1['error_obtenido'] = '';
	$array_test1['resultado'] = '';
	
	$prov = new PROVEEDORES_Model('123456789','empresita','aqui','alli','35432','email@mail.com','999888999','987654321','pepe');
	
	$array_test1['error_obtenido'] = $prov->getById()['code'];
	if ($array_test1['error_obtenido'] === $array_test1['error_esperado'])
	{
		$array_test1['resultado'] = 'OK';
	}
	else
	{
		$array_test1['resultado'] = 'FALSE';
	}

	array_push($PROV_array_test, $array_test1);
	


}

PROVEEDORES_ADD_test();
PROVEEDORES_EDIT_test();
PROVEEDORES_DELETE_test();
PROVEEDORES_SEARCH_test();
PROVEEDORES_getById_test();