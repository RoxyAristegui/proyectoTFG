<?php
include_once '../Model/ACTUACIONES_Model.php';
include_once '../Model/OBRAS_Model.php';

$obra= new OBRAS_Model('12345678','obra','','','','1','','','');
	$obra->ADD();
function ACTUACIONES_ADD_test()
{

    global $ACTUACIONES_array_test;
// creo array de almacen de test individual
    $array_test1 = array();

// comprobar success
//-------------------------------------------------------------------------------

    $array_test1['entidad'] = 'actuacion';
    $array_test1['metodo'] = 'add';
    $array_test1['error'] = 'Exito';
    $array_test1['error_esperado'] = '00001';
    $array_test1['error_obtenido'] = '';
    $array_test1['resultado'] = '';


    $actuaciones= new ACTUACIONES_Model('','12345678','Hacer cosas','2021-01-20');
    $array_test1['error_obtenido'] = $actuaciones->ADD()['code'];
    if ($array_test1['error_obtenido'] === $array_test1['error_esperado'])
    {
        $array_test1['resultado'] = 'OK';
    }
    else
    {
        $array_test1['resultado'] = 'FALSE';
    }

    array_push($ACTUACIONES_array_test, $array_test1);
    $actuaciones->DELETE();


// comprobar fallo

    $array_test1['entidad'] = 'actuaciones';
    $array_test1['metodo'] = 'add';
    $array_test1['error'] = 'No existe la obra';
    $array_test1['error_esperado'] = '005072';
    $array_test1['error_obtenido'] = '';
    $array_test1['resultado'] = '';


    $actuaciones= new ACTUACIONES_Model('','222222222','Hacer cosas','2000-10-10');
    $array_test1['error_obtenido'] = $actuaciones->ADD()[0]['code'];
    if ($array_test1['error_obtenido'] === $array_test1['error_esperado'])
    {
        $array_test1['resultado'] = 'OK';
    }
    else
    {
        $array_test1['resultado'] = 'FALSE';
    }

    array_push($ACTUACIONES_array_test, $array_test1);
    $actuaciones->DELETE();



}

function ACTUACIONES_EDIT_test()
{

	global $ACTUACIONES_array_test;
// creo array de almacen de test individual
	$array_test1 = array();

// comprobar success
//-------------------------------------------------------------------------------

	$array_test1['entidad'] = 'actuacion';
	$array_test1['metodo'] = 'edit';
	$array_test1['error'] = 'Exito';
	$array_test1['error_esperado'] = '000054';
	$array_test1['error_obtenido'] = '';
	$array_test1['resultado'] = '';


	$actuaciones= new ACTUACIONES_Model('','12345678','Hacer cosas','2020-01-01');
	$actuaciones->ADD();
	$actuaciones->fecha_actuacion='2021-01-01';

	$array_test1['error_obtenido'] = $actuaciones->EDIT()['code'];
	if ($array_test1['error_obtenido'] === $array_test1['error_esperado'])
	{
		$array_test1['resultado'] = 'OK';
	}
	else
	{
		$array_test1['resultado'] = 'FALSE';
	}

	array_push($ACTUACIONES_array_test, $array_test1);
	$actuaciones->DELETE();


// comprobar fallo

	$array_test1['entidad'] = 'actuaciones';
	$array_test1['metodo'] = 'edit';
	$array_test1['error'] = 'Ya aceptado';
	$array_test1['error_esperado'] = '005076';
	$array_test1['error_obtenido'] = '';
	$array_test1['resultado'] = '';

	$actuaciones= new ACTUACIONES_Model('','12345678','Hacer cosas','2000-01-01');
	$actuaciones->ADD();
	$actuaciones->aceptado="1";
	$actuaciones->EDIT();
	$actuaciones->descripcion='otras cosas';
	$array_test1['error_obtenido'] = $actuaciones->EDIT()['code'];
	if ($array_test1['error_obtenido'] === $array_test1['error_esperado'])
	{
		$array_test1['resultado'] = 'OK';
	}
	else
	{
		$array_test1['resultado'] = 'FALSE';
	}

	array_push($ACTUACIONES_array_test, $array_test1);
	$actuaciones->DELETE();

}
function ACTUACIONES_DELETE_test(){

	global $ACTUACIONES_array_test;
// creo array de almacen de test individual
	$array_test1 = array();

// comprobar success
//-------------------------------------------------------------------------------

	$array_test1['entidad'] = 'actuacion';
	$array_test1['metodo'] = 'delete';
	$array_test1['error'] = 'Exito';
	$array_test1['error_esperado'] = '000055';
	$array_test1['error_obtenido'] = '';
	$array_test1['resultado'] = '';


	$actuaciones= new ACTUACIONES_Model('','12345678','Hacer cosas','2000-10-10');
	$actuaciones->ADD();

	$array_test1['error_obtenido'] = $actuaciones->DELETE()['code'];
	if ($array_test1['error_obtenido'] === $array_test1['error_esperado'])
	{
		$array_test1['resultado'] = 'OK';
	}
	else
	{
		$array_test1['resultado'] = 'FALSE';
	}

	array_push($ACTUACIONES_array_test, $array_test1);
	$actuaciones->DELETE();
}

function ACTUACIONES_getById_test()
{
	global $ACTUACIONES_array_test;
// creo array de almacen de test individual
	$array_test1 = array();

// comprobar success
//-------------------------------------------------------------------------------

	$array_test1['entidad'] = 'actuacion';
	$array_test1['metodo'] = 'getById';
	$array_test1['error'] = 'Exito';
	$array_test1['error_esperado'] = '00008';
	$array_test1['error_obtenido'] = '';
	$array_test1['resultado'] = '';


	$actuaciones= new ACTUACIONES_Model('','12345678','Hacer cosas','2000-10-10');
	$actuaciones->ADD();
    $actuaciones->getById();
	$array_test1['error_obtenido'] = $actuaciones->feedback['code'];
	if ($array_test1['error_obtenido'] === $array_test1['error_esperado'])
	{
		$array_test1['resultado'] = 'OK';
	}
	else
	{
		$array_test1['resultado'] = 'FALSE';
	}

	array_push($ACTUACIONES_array_test, $array_test1);
	$actuaciones->DELETE();

	$array_test1 = array();

// comprobar error
//-------------------------------------------------------------------------------

	$array_test1['entidad'] = 'actuacion';
	$array_test1['metodo'] = 'getById';
	$array_test1['error'] = 'No se ha encontrado';
	$array_test1['error_esperado'] = '000057';
	$array_test1['error_obtenido'] = '';
	$array_test1['resultado'] = '';


	$actuaciones= new ACTUACIONES_Model('','12345678','Hacer cosas','2000-10-10');


	$array_test1['error_obtenido'] = $actuaciones->getById()['code'];
	if ($array_test1['error_obtenido'] === $array_test1['error_esperado'])
	{
		$array_test1['resultado'] = 'OK';
	}
	else
	{
		$array_test1['resultado'] = 'FALSE';
	}

	array_push($ACTUACIONES_array_test, $array_test1);
	$actuaciones->DELETE();
}


function ACTUACIONES_SEARCH_test()
{
	global $ACTUACIONES_array_test;
// creo array de almacen de test individual
	$array_test1 = array();

// comprobar success
//-------------------------------------------------------------------------------

	$array_test1['entidad'] = 'actuacion';
	$array_test1['metodo'] = 'SEARCH';
	$array_test1['error'] = 'Exito';
	$array_test1['error_esperado'] = '00008';
	$array_test1['error_obtenido'] = '';
	$array_test1['resultado'] = '';


	$actuacion= new ACTUACIONES_Model('','12345678','Hacer cosas','2000-10-10');
	$actuacion->ADD();
	$actuaciones= new ACTUACIONES_Model('','','','');

    $actuaciones->SEARCH();
	$array_test1['error_obtenido'] = $actuaciones->feedback['code'];
	if ($array_test1['error_obtenido'] === $array_test1['error_esperado'])
	{
		$array_test1['resultado'] = 'OK';
	}
	else
	{
		$array_test1['resultado'] = 'FALSE';
	}

	array_push($ACTUACIONES_array_test, $array_test1);
	$actuacion->DELETE();

	$array_test1 = array();

// comprobar error
//-------------------------------------------------------------------------------

	$array_test1['entidad'] = 'actuacion';
	$array_test1['metodo'] = 'SEARCH';
	$array_test1['error'] = 'No se ha encontrado';
	$array_test1['error_esperado'] = '000056';
	$array_test1['error_obtenido'] = '';
	$array_test1['resultado'] = '';


	$actuaciones= new ACTUACIONES_Model('','333333333','Hacer cosas','2000-10-10');


	$array_test1['error_obtenido'] = $actuaciones->SEARCH()['code'];
	if ($array_test1['error_obtenido'] === $array_test1['error_esperado'])
	{
		$array_test1['resultado'] = 'OK';
	}
	else
	{
		$array_test1['resultado'] = 'FALSE';
	}

	array_push($ACTUACIONES_array_test, $array_test1);
	$actuaciones->DELETE();
}
ACTUACIONES_ADD_test();
ACTUACIONES_EDIT_test();
ACTUACIONES_DELETE_test();
ACTUACIONES_getById_test();
ACTUACIONES_SEARCH_test();

    $obra->DELETE();