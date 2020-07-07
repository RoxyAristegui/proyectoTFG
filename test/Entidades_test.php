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
	$array_test1['error_esperado'] = '000341';
	$array_test1['error_obtenido'] = '';
	$array_test1['resultado'] = '';
	

	$entidad = new entidad('entidad1');

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
	$array_test1['error_esperado'] = '000346';
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
	$array_test1['error_esperado'] = '000054';
	$array_test1['error_obtenido'] = '';
	$array_test1['resultado'] = '';
	

	$entidad = new entidad('entidad2');
	$entidad->ADD();
	$entidad->entidad='entidad3';
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
	$array_test1['metodo'] = 'edit';
	$array_test1['error'] = 'Error por duplicado';
	$array_test1['error_esperado'] = '000346';
	$array_test1['error_obtenido'] = '';
	$array_test1['resultado'] = '';
	
	
	$entidad=  new entidad('entidad4');
	$entidad->ADD();
	$entidad2= new entidad('entidad5');
	$entidad2->ADD();
	$entidad2->entidad='entidad4';
	$array_test1['error_obtenido'] = $entidad2->EDIT()['code'];
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
	$entidad2->DELETE();


}
function Delete_Entidades_test(){
		global $entidades_array_test;

// creo array de almacen de test individual
	$array_test1 = array();

// comprobar success
//-------------------------------------------------------------------------------
	
	$array_test1['entidad'] = 'entidad';	
	$array_test1['metodo'] = 'DELETE';
	$array_test1['error'] = 'Exito';
	$array_test1['error_esperado'] = '000343';
	$array_test1['error_obtenido'] = '';
	$array_test1['resultado'] = '';
	

	$entidad = new entidad('entidad1');
	$entidad->ADD();

	$array_test1['error_obtenido'] = $entidad->DELETE()['code'];
	if ($array_test1['error_obtenido'] === $array_test1['error_esperado'])
	{
		$array_test1['resultado'] = 'OK';
	}
	else
	{
		$array_test1['resultado'] = 'FALSE';
	}

	array_push($entidades_array_test, $array_test1);
	
// comprobar fallo
//-------------------------------------------------------------------------------
	
	$array_test1['entidad'] = 'entidad';	
	$array_test1['metodo'] = 'DELETE';
	$array_test1['error'] = 'No se ha encontrado';
	$array_test1['error_esperado'] = '000344';
	$array_test1['error_obtenido'] = '';
	$array_test1['resultado'] = '';
	
	
	$entidad=  new Entidad('error');
	$array_test1['error_obtenido'] = $entidad->DELETE()['code'];
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
	$entidad = new Entidad('prueba1');
	$entidad->ADD();
	$id=$entidad->getByName();

	$array_test1['entidad'] = 'entidad';	
	$array_test1['metodo'] = 'getIdByName';
	$array_test1['error'] = 'Exito';
	$array_test1['error_esperado'] = $id;
	$array_test1['error_obtenido'] = '';
	$array_test1['resultado'] = '';
	
	$entidad2 = new Entidad('prueba1');
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
	$array_test1['error_esperado'] = '000344';
	$array_test1['error_obtenido'] = '';
	$array_test1['resultado'] = '';
	
	
	$entidad=  new Entidad('noexistes');
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
	

	$entidad = new Entidad('prueba1');
	$entidad->ADD();
	$entidad2= new Entidad('',$entidad->id_entidad);
	$array_test1['error_obtenido'] = $entidad2->getById()['entidad'];
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
	$array_test1['error_esperado'] = '000344';
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
Delete_Entidades_test();