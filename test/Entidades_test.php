<?php

include_once '../Model/Entidades_Model.php';

function ADD_Entidades_test(){
		global $entidades_array_test;

// creo array de almacen de test individual
	$array_test1 = array();

// comprobar success
//-------------------------------------------------------------------------------
	
	$array_test1['entidad'] = 'entidad';	
	$array_test1['metodo'] = 'add';
	$array_test1['error'] = 'Exito';
	$array_test1['error_esperado'] = '00001';
	$array_test1['error_obtenido'] = '';
	$array_test1['resultado'] = '';
	

	$entidad = new entidad('prueba1');

	$array_test1['error_obtenido'] = $entidad->ADD()['code'];
	if ($array_test1['error_obtenido'] === $array_test1['error_esperado'])
	{
		$array_test1['resultado'] = 'OK';
	}
	else
	{
		$array_test1['resultado'] = 'FALSE';
	}

	array_push($entidades_array_test, $array_test1);
	$entidad->DELETE();
// comprobar fallo
//-------------------------------------------------------------------------------
	
	$array_test1['entidad'] = 'entidad';	
	$array_test1['metodo'] = 'add';
	$array_test1['error'] = 'Error por duplicado';
	$array_test1['error_esperado'] = '00005';
	$array_test1['error_obtenido'] = '';
	$array_test1['resultado'] = '';
	
	
	$entidad=  new entidad('error');
	$entidad->ADD();
	$array_test1['error_obtenido'] = $entidad->ADD()['code'];
	if ($array_test1['error_obtenido'] === $array_test1['error_esperado'])
	{
		$array_test1['resultado'] = 'OK';
	}
	else
	{
		$array_test1['resultado'] = 'FALSE';
	}

	array_push($entidades_array_test, $array_test1);
	$entidad->DELETE();


}

function Edit_Entidades_test(){
		global $entidades_array_test;

// creo array de almacen de test individual
	$array_test1 = array();

// comprobar success
//-------------------------------------------------------------------------------
	
	$array_test1['entidad'] = 'entidad';	
	$array_test1['metodo'] = 'edit';
	$array_test1['error'] = 'Exito';
	$array_test1['error_esperado'] = '00001';
	$array_test1['error_obtenido'] = '';
	$array_test1['resultado'] = '';
	

	$entidad = new entidad('prueba1');
	$entidad->accion='prueba2';
	$array_test1['error_obtenido'] = $entidad->Edit()['code'];
	if ($array_test1['error_obtenido'] === $array_test1['error_esperado'])
	{
		$array_test1['resultado'] = 'OK';
	}
	else
	{
		$array_test1['resultado'] = 'FALSE';
	}

	array_push($entidades_array_test, $array_test1);
	$entidad->DELETE();
// comprobar fallo
//-------------------------------------------------------------------------------
	
	$array_test1['entidad'] = 'entidad';	
	$array_test1['metodo'] = 'add';
	$array_test1['error'] = 'Error por duplicado';
	$array_test1['error_esperado'] = '00005';
	$array_test1['error_obtenido'] = '';
	$array_test1['resultado'] = '';
	
	
	$entidad=  new entidad('prueba');
	$entidad->ADD();
	$entidad->entidad='USUARIOS';
	$array_test1['error_obtenido'] = $entidad->Edit()['code'];
	if ($array_test1['error_obtenido'] === $array_test1['error_esperado'])
	{
		$array_test1['resultado'] = 'OK';
	}
	else
	{
		$array_test1['resultado'] = 'FALSE';
	}

	array_push($entidades_array_test, $array_test1);
	$entidad->DELETE();


}

function getByName_Entidades_test(){
		global $entidades_array_test;

// creo array de almacen de test individual
	$array_test1 = array();

// comprobar success
//-------------------------------------------------------------------------------
	
	$array_test1['entidad'] = 'entidad';	
	$array_test1['metodo'] = 'getIdByName';
	$array_test1['error'] = 'Exito';
	$array_test1['error_esperado'] = '999';
	$array_test1['error_obtenido'] = '';
	$array_test1['resultado'] = '';
	

	$entidad = new entidad('prueba1',999);
	$entidad->ADD();
	$entidad2 = new entidad('prueba1');
	$array_test1['error_obtenido'] = $entidad2->getByName();
	if ($array_test1['error_obtenido'] === $array_test1['error_esperado'])
	{
		$array_test1['resultado'] = 'OK';
	}
	else
	{
		$array_test1['resultado'] = 'FALSE';
	}

	array_push($entidades_array_test, $array_test1);
	$entidad->DELETE();
// comprobar fallo
//-------------------------------------------------------------------------------
	
	$array_test1['entidad'] = 'entidad';	
	$array_test1['metodo'] = 'getIdByName';
	$array_test1['error'] = 'No existe esa entidad';
	$array_test1['error_esperado'] = '000314';
	$array_test1['error_obtenido'] = '';
	$array_test1['resultado'] = '';
	
	
	$entidad=  new entidad('noexistes');
	$array_test1['error_obtenido'] = $entidad->getByName()['code'];
	if ($array_test1['error_obtenido'] === $array_test1['error_esperado'])
	{
		$array_test1['resultado'] = 'OK';
	}
	else
	{
		$array_test1['resultado'] = 'FALSE';
	}

	array_push($entidades_array_test, $array_test1);


}


function getById_Entidades_test(){
		global $entidades_array_test;

// creo array de almacen de test individual
	$array_test1 = array();

// comprobar success
//-------------------------------------------------------------------------------
	
	$array_test1['entidad'] = 'entidad';	
	$array_test1['metodo'] = 'getById';
	$array_test1['error'] = 'Exito';
	$array_test1['error_esperado'] = 'prueba1';
	$array_test1['error_obtenido'] = '';
	$array_test1['resultado'] = '';
	

	$entidad = new entidad('prueba1',77);
	$entidad->ADD();
	$entidad2= new entidad('',77);
	$array_test1['error_obtenido'] = $entidad->getById()['entidad'];
	if ($array_test1['error_obtenido'] === $array_test1['error_esperado'])
	{
		$array_test1['resultado'] = 'OK';
	}
	else
	{
		$array_test1['resultado'] = 'FALSE';
	}

	array_push( $entidades_array_test, $array_test1);
	$entidad->DELETE();
// comprobar fallo
//-------------------------------------------------------------------------------
	
	$array_test1['entidad'] = 'entidad';	
	$array_test1['metodo'] = 'getById';
	$array_test1['error'] = 'No existe esa entidad';
	$array_test1['error_esperado'] = '000314';
	$array_test1['error_obtenido'] = '';
	$array_test1['resultado'] = '';
	
	
	$entidad=  new entidad('',132);
	$array_test1['error_obtenido'] = $entidad->getById()['code'];
	if ($array_test1['error_obtenido'] === $array_test1['error_esperado'])
	{
		$array_test1['resultado'] = 'OK';
	}
	else
	{
		$array_test1['resultado'] = 'FALSE';
	}

	array_push($entidades_array_test, $array_test1);
	$entidad->DELETE();


}

ADD_Entidades_test();
Edit_Entidades_test();
getById_Entidades_test();
getByName_Entidades_test();