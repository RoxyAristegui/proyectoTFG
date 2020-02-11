<?php
// Autor : Roxy
// Fecha : 10/2/2020
// Descripción : 
//	Fichero de test de unidad de la entidad Validad
//	Saca por pantalla el resultado de los test
// incluir el modelo de la entidad Validar
	
	include '../Model/Validar_Model.php';

function validar_longitud_maxima_test(){

	global $ERRORS_array_test;
// creo array de almacen de test individual
	$USUARIOS_array_test1 = array();

// Comprobar si supera la longitud maxima
//-------------------------------------------------------------------------------

	$USUARIOS_array_test1['entidad'] = 'VALIDAR';	
	$USUARIOS_array_test1['metodo'] = 'Longitud_max';
	$USUARIOS_array_test1['error'] = 'Supera la longitud maxima';
	$USUARIOS_array_test1['error_esperado'] = 'false';
	$USUARIOS_array_test1['error_obtenido'] = '';
	$USUARIOS_array_test1['resultado'] = '';
	
	$string = '1234567';
	$usuarios = new Validar_Model();
	$USUARIOS_array_test1['error_obtenido'] = $usuarios->Longitud_maxima($string,5);
	if ($USUARIOS_array_test1['error_obtenido'] === $USUARIOS_array_test1['error_esperado'])
	{
		$USUARIOS_array_test1['resultado'] = 'OK';
	}
	else
	{
		$USUARIOS_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $USUARIOS_array_test1);

// Comprobar si es correcta la longitud
//--------------------------------------

	$USUARIOS_array_test1['entidad'] = 'VALIDAR';	
	$USUARIOS_array_test1['metodo'] = 'Longitud_max';
	$USUARIOS_array_test1['error'] = 'Longitud maxima correcta';
	$USUARIOS_array_test1['error_esperado'] = 'true';
	$USUARIOS_array_test1['error_obtenido'] = '';
	$USUARIOS_array_test1['resultado'] = '';
	
	$string = '1234';
	$usuarios = new Validar_Model();
	$USUARIOS_array_test1['error_obtenido'] = $usuarios->Longitud_maxima($string,5);
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




function validar_longitud_minima_test(){

	global $ERRORS_array_test;
// creo array de almacen de test individual
	$USUARIOS_array_test1 = array();

//-------------------------------------------------------------------------------
// 'tiene menos de la longitud correcta, string demasiado corto

	$USUARIOS_array_test1['entidad'] = 'VALIDAR';	
	$USUARIOS_array_test1['metodo'] = 'Longitud_min';
	$USUARIOS_array_test1['error'] = 'Supera la longitud minima';
	$USUARIOS_array_test1['error_esperado'] = 'false';
	$USUARIOS_array_test1['error_obtenido'] = '';
	$USUARIOS_array_test1['resultado'] = '';
	
	$string = '123';
	$usuarios = new Validar_Model();
	$USUARIOS_array_test1['error_obtenido'] = $usuarios->Longitud_minima($string,5);
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
	//'tiene la longitud minima permitida';

	$USUARIOS_array_test1['entidad'] = 'VALIDAR';	
	$USUARIOS_array_test1['metodo'] = 'Longitud_min';
	$USUARIOS_array_test1['error'] = 'Longitud minima correcta';
	$USUARIOS_array_test1['error_esperado'] = 'true';
	$USUARIOS_array_test1['error_obtenido'] = '';
	$USUARIOS_array_test1['resultado'] = '';
	
	$string = '123456';
	$usuarios = new Validar_Model();
	$USUARIOS_array_test1['error_obtenido'] = $usuarios->Longitud_minima($string,5);
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

function validar_es_string(){

}

validar_longitud_minima_test();
validar_longitud_maxima_test();