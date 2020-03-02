<?php
// Autor : Roxy
// Fecha : 10/2/2020
// Descripción : 
//	Fichero de test de unidad de la entidad Validad
//	Saca por pantalla el resultado de los test
// incluir el modelo de la entidad Validar
	
	include_once'../Model/Validar_Model.php';

function validar_longitud_maxima_test(){

	global $Validacion_errors_array_test;
// creo array de almacen de test individual
	$USUARIOS_array_test1 = array();

// Comprobar si supera la longitud maxima
//-------------------------------------------------------------------------------

	$USUARIOS_array_test1['entidad'] = 'VALIDAR';	
	$USUARIOS_array_test1['metodo'] = 'Longitud_max';
	$USUARIOS_array_test1['error'] = 'Supera la longitud maxima';
	$USUARIOS_array_test1['error_esperado'] = false;
	$USUARIOS_array_test1['error_obtenido'] = '';
	$USUARIOS_array_test1['resultado'] = '';
	
	$string = '1234567';
	$validar = new Validar();
	$USUARIOS_array_test1['error_obtenido'] = $validar->Longitud_maxima($string,5);
	if ($USUARIOS_array_test1['error_obtenido'] === $USUARIOS_array_test1['error_esperado'])
	{
		$USUARIOS_array_test1['resultado'] = 'OK';
	}
	else
	{
		$USUARIOS_array_test1['resultado'] = 'FALSE';
	}

	array_push($Validacion_errors_array_test, $USUARIOS_array_test1);

// Comprobar si es correcta la longitud
//--------------------------------------

	$USUARIOS_array_test1['entidad'] = 'VALIDAR';	
	$USUARIOS_array_test1['metodo'] = 'Longitud_max';
	$USUARIOS_array_test1['error'] = 'Longitud maxima correcta';
	$USUARIOS_array_test1['error_esperado'] = true;
	$USUARIOS_array_test1['error_obtenido'] = '';
	$USUARIOS_array_test1['resultado'] = '';
	
	$string = '1234';
	$validar = new Validar();
	$USUARIOS_array_test1['error_obtenido'] = $validar->Longitud_maxima($string,5);
	if ($USUARIOS_array_test1['error_obtenido'] === $USUARIOS_array_test1['error_esperado'])
	{
		$USUARIOS_array_test1['resultado'] = 'OK';
	}
	else
	{
		$USUARIOS_array_test1['resultado'] = 'FALSE';
	}

	array_push($Validacion_errors_array_test, $USUARIOS_array_test1);

	
}




function validar_longitud_minima_test(){

	global $Validacion_errors_array_test;
// creo array de almacen de test individual
	$USUARIOS_array_test1 = array();

//-------------------------------------------------------------------------------
// 'tiene menos de la longitud correcta, string demasiado corto

	$USUARIOS_array_test1['entidad'] = 'VALIDAR';	
	$USUARIOS_array_test1['metodo'] = 'Longitud_min';
	$USUARIOS_array_test1['error'] = 'Supera la longitud minima';
	$USUARIOS_array_test1['error_esperado'] = false;
	$USUARIOS_array_test1['error_obtenido'] = '';
	$USUARIOS_array_test1['resultado'] = '';
	
	$string = '123';
	$validar = new Validar();
	$USUARIOS_array_test1['error_obtenido'] = $validar->Longitud_minima($string,5);
	if ($USUARIOS_array_test1['error_obtenido'] === $USUARIOS_array_test1['error_esperado'])
	{
		$USUARIOS_array_test1['resultado'] = 'OK';
	}
	else
	{
		$USUARIOS_array_test1['resultado'] = 'FALSE';
	}

	array_push($Validacion_errors_array_test, $USUARIOS_array_test1);

//-------------------------------------------------------------------------------
	//'tiene la longitud minima permitida';

	$USUARIOS_array_test1['entidad'] = 'VALIDAR';	
	$USUARIOS_array_test1['metodo'] = 'Longitud_min';
	$USUARIOS_array_test1['error'] = 'Longitud minima correcta';
	$USUARIOS_array_test1['error_esperado'] = true;
	$USUARIOS_array_test1['error_obtenido'] = '';
	$USUARIOS_array_test1['resultado'] = '';
	
	$string = '123456';
	$validar = new Validar();
	$USUARIOS_array_test1['error_obtenido'] = $validar->Longitud_minima($string,5);
	if ($USUARIOS_array_test1['error_obtenido'] === $USUARIOS_array_test1['error_esperado'])
	{
		$USUARIOS_array_test1['resultado'] = 'OK';
	}
	else
	{
		$USUARIOS_array_test1['resultado'] = 'FALSE';
	}

	array_push($Validacion_errors_array_test, $USUARIOS_array_test1);
}

function validar_es_string_test(){

	global $Validacion_errors_array_test;
// creo array de almacen de test individual
	$USUARIOS_array_test1 = array();

// Comprobar si el string no tiene solo letras
//-------------------------------------------------------------------------------

	$USUARIOS_array_test1['entidad'] = 'VALIDAR';	
	$USUARIOS_array_test1['metodo'] = 'es string';
	$USUARIOS_array_test1['error'] = 'caracteres incorrectos';
	$USUARIOS_array_test1['error_esperado'] = false;
	$USUARIOS_array_test1['error_obtenido'] = '';
	$USUARIOS_array_test1['resultado'] = '';
	
	$string = '123sa4567';
	$validar = new Validar();
	$USUARIOS_array_test1['error_obtenido'] = $validar->Es_string($string);
	if ($USUARIOS_array_test1['error_obtenido'] === $USUARIOS_array_test1['error_esperado'])
	{
		$USUARIOS_array_test1['resultado'] = 'OK';
	}
	else
	{
		$USUARIOS_array_test1['resultado'] = 'FALSE';
	}

	array_push($Validacion_errors_array_test, $USUARIOS_array_test1);

// Comprobar si los carácteres son correctos
//--------------------------------------

	$USUARIOS_array_test1['entidad'] = 'VALIDAR';	
	$USUARIOS_array_test1['metodo'] = 'es_string';
	$USUARIOS_array_test1['error'] = 'caracteres correctos';
	$USUARIOS_array_test1['error_esperado'] = true;
	$USUARIOS_array_test1['error_obtenido'] = '';
	$USUARIOS_array_test1['resultado'] = '';
	
	$string = 'abcd';
	$validar = new Validar();
	$USUARIOS_array_test1['error_obtenido'] = $validar->Es_string($string);
	if ($USUARIOS_array_test1['error_obtenido'] === $USUARIOS_array_test1['error_esperado'])
	{
		$USUARIOS_array_test1['resultado'] = 'OK';
	}
	else
	{
		$USUARIOS_array_test1['resultado'] = 'FALSE';
	}

	array_push($Validacion_errors_array_test, $USUARIOS_array_test1);

	
}

function validar_es_alfanumerico_test(){
		global $Validacion_errors_array_test;
// creo array de almacen de test individual
	$USUARIOS_array_test1 = array();

// Comprobar si el string no tiene solo letras y numeros
//-------------------------------------------------------------------------------

	$USUARIOS_array_test1['entidad'] = 'VALIDAR';	
	$USUARIOS_array_test1['metodo'] = 'alfanumerico';
	$USUARIOS_array_test1['error'] = 'caracteres incorrectos';
	$USUARIOS_array_test1['error_esperado'] = false;
	$USUARIOS_array_test1['error_obtenido'] = '';
	$USUARIOS_array_test1['resultado'] = '';
	
	$string = '123sa4567./';
	$validar = new Validar();
	$USUARIOS_array_test1['error_obtenido'] = $validar->Es_alfanumerico($string);
	if ($USUARIOS_array_test1['error_obtenido'] === $USUARIOS_array_test1['error_esperado'])
	{
		$USUARIOS_array_test1['resultado'] = 'OK';
	}
	else
	{
		$USUARIOS_array_test1['resultado'] = 'FALSE';
	}

	array_push($Validacion_errors_array_test, $USUARIOS_array_test1);

// Comprobar si los carácteres son correctos
//--------------------------------------

	$USUARIOS_array_test1['entidad'] = 'VALIDAR';	
	$USUARIOS_array_test1['metodo'] = 'alfanumerico';
	$USUARIOS_array_test1['error'] = 'caracteres correctos';
	$USUARIOS_array_test1['error_esperado'] = true;
	$USUARIOS_array_test1['error_obtenido'] = '';
	$USUARIOS_array_test1['resultado'] = '';
	
	$string = 'abcd23';
	$validar = new Validar();
	$USUARIOS_array_test1['error_obtenido'] = $validar->Es_alfanumerico($string);
	if ($USUARIOS_array_test1['error_obtenido'] === $USUARIOS_array_test1['error_esperado'])
	{
		$USUARIOS_array_test1['resultado'] = 'OK';
	}
	else
	{
		$USUARIOS_array_test1['resultado'] = 'FALSE';
	}

	array_push($Validacion_errors_array_test, $USUARIOS_array_test1);

}

function validar_es_string_espacios_test(){
		global $Validacion_errors_array_test;
// creo array de almacen de test individual
	$USUARIOS_array_test1 = array();

// Comprobar si el string no tiene solo letras
//-------------------------------------------------------------------------------

	$USUARIOS_array_test1['entidad'] = 'VALIDAR';	
	$USUARIOS_array_test1['metodo'] = 'es string espcios';
	$USUARIOS_array_test1['error'] = 'caracteres incorrectos';
	$USUARIOS_array_test1['error_esperado'] = false;
	$USUARIOS_array_test1['error_obtenido'] = '';
	$USUARIOS_array_test1['resultado'] = '';
	
	$string = '123sa4567 ds./ds';
	$validar = new Validar();
	$USUARIOS_array_test1['error_obtenido'] = $validar->Es_string_espacios($string);
	if ($USUARIOS_array_test1['error_obtenido'] === $USUARIOS_array_test1['error_esperado'])
	{
		$USUARIOS_array_test1['resultado'] = 'OK';
	}
	else
	{
		$USUARIOS_array_test1['resultado'] = 'FALSE';
	}

	array_push($Validacion_errors_array_test, $USUARIOS_array_test1);

// Comprobar si los carácteres son correctos
//--------------------------------------

	$USUARIOS_array_test1['entidad'] = 'VALIDAR';	
	$USUARIOS_array_test1['metodo'] = 'es_string espacios';
	$USUARIOS_array_test1['error'] = 'caracteres correctos';
	$USUARIOS_array_test1['error_esperado'] = true;
	$USUARIOS_array_test1['error_obtenido'] = '';
	$USUARIOS_array_test1['resultado'] = '';
	
	$string = 'abcd dsd';
	$validar = new Validar();
	$USUARIOS_array_test1['error_obtenido'] = $validar->Es_string_espacios($string);
	if ($USUARIOS_array_test1['error_obtenido'] === $USUARIOS_array_test1['error_esperado'])
	{
		$USUARIOS_array_test1['resultado'] = 'OK';
	}
	else
	{
		$USUARIOS_array_test1['resultado'] = 'FALSE';
	}

	array_push($Validacion_errors_array_test, $USUARIOS_array_test1);

}

function validar_formato_email_test(){
	global $Validacion_errors_array_test;
// creo array de almacen de test individual
	$USUARIOS_array_test1 = array();

// Comprobar si el string no tiene solo letras
//-------------------------------------------------------------------------------

	$USUARIOS_array_test1['entidad'] = 'VALIDAR';	
	$USUARIOS_array_test1['metodo'] = 'email';
	$USUARIOS_array_test1['error'] = 'caracteres incorrectos';
	$USUARIOS_array_test1['error_esperado'] = false;
	$USUARIOS_array_test1['error_obtenido'] = '';
	$USUARIOS_array_test1['resultado'] = '';
	
	$string = '123sa4567';
	$validar = new Validar();
	$USUARIOS_array_test1['error_obtenido'] = $validar->Formato_email($string);
	if ($USUARIOS_array_test1['error_obtenido'] === $USUARIOS_array_test1['error_esperado'])
	{
		$USUARIOS_array_test1['resultado'] = 'OK';
	}
	else
	{
		$USUARIOS_array_test1['resultado'] = 'FALSE';
	}

	array_push($Validacion_errors_array_test, $USUARIOS_array_test1);

// Comprobar si los carácteres son correctos
//--------------------------------------

	$USUARIOS_array_test1['entidad'] = 'VALIDAR';	
	$USUARIOS_array_test1['metodo'] = 'email';
	$USUARIOS_array_test1['error'] = 'caracteres correctos';
	$USUARIOS_array_test1['error_esperado'] = true;
	$USUARIOS_array_test1['error_obtenido'] = '';
	$USUARIOS_array_test1['resultado'] = '';
	
	$string = 'usuario@email.com';
	$validar = new Validar();
	$USUARIOS_array_test1['error_obtenido'] = $validar->Formato_email($string);
	if ($USUARIOS_array_test1['error_obtenido'] === $USUARIOS_array_test1['error_esperado'])
	{
		$USUARIOS_array_test1['resultado'] = 'OK';
	}
	else
	{
		$USUARIOS_array_test1['resultado'] = 'FALSE';
	}

	array_push($Validacion_errors_array_test, $USUARIOS_array_test1);

}


validar_longitud_minima_test();
validar_longitud_maxima_test();
validar_es_string_test();
validar_es_alfanumerico_test();
validar_es_string_espacios_test();
validar_formato_email_test();

?>