<?php
include '../Model/Permisos_Model.php';
include '../Model/ACL_Model.php';

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
