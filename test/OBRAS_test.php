<?php
include_once '../Model/OBRAS_Model.php';

function OBRAS_ADD_test()
{

	global $OBRAS_array_test;
// creo array de almacen de test individual
	$array_test1 = array();

// comprobar success
//-------------------------------------------------------------------------------

	$array_test1['entidad'] = 'obras';
	$array_test1['metodo'] = 'add';
	$array_test1['error'] = 'Exito';
	$array_test1['error_esperado'] = '00001';
	$array_test1['error_obtenido'] = '';
	$array_test1['resultado'] = '';


	$obra= new OBRAS_Model('12345679','obra','','','','1','','','');
	$array_test1['error_obtenido'] = $obra->ADD()['code'];
	if ($array_test1['error_obtenido'] === $array_test1['error_esperado'])
	{
		$array_test1['resultado'] = 'OK';
	}
	else
	{
		$array_test1['resultado'] = 'FALSE';
	}

	array_push($OBRAS_array_test, $array_test1);
	$obra->DELETE();
// comprobar fallo

	$array_test1['entidad'] = 'obras';
	$array_test1['metodo'] = 'add';
	$array_test1['error'] = 'No existe el area';
	$array_test1['error_esperado'] = '005073';
	$array_test1['error_obtenido'] = '';
	$array_test1['resultado'] = '';


	$obra= new OBRAS_Model('12345679','obra','','','','5','','','');
	$array_test1['error_obtenido'] = $obra->ADD()[0]['code'];
	if ($array_test1['error_obtenido'] === $array_test1['error_esperado'])
	{
		$array_test1['resultado'] = 'OK';
	}
	else
	{
		$array_test1['resultado'] = 'FALSE';
	}

	array_push($OBRAS_array_test, $array_test1);
	$obra->DELETE();


// comprobar fallo

	$array_test1['entidad'] = 'obras';
	$array_test1['metodo'] = 'add';
	$array_test1['error'] = 'No existe el CIF';
	$array_test1['error_esperado'] = '004072';
	$array_test1['error_obtenido'] = '';
	$array_test1['resultado'] = '';


	$obra= new OBRAS_Model('12345679','obra','','','2','1','','','');
	$array_test1['error_obtenido'] = $obra->ADD()[0]['code'];
	if ($array_test1['error_obtenido'] === $array_test1['error_esperado'])
	{
		$array_test1['resultado'] = 'OK';
	}
	else
	{
		$array_test1['resultado'] = 'FALSE';
	}

	array_push($OBRAS_array_test, $array_test1);
	$obra->DELETE();

}

function OBRAS_EDIT_test()
{
    global $OBRAS_array_test;
// creo array de almacen de test individual
    $array_test1 = array();

// comprobar success
//-------------------------------------------------------------------------------

    $array_test1['entidad'] = 'obras';
    $array_test1['metodo'] = 'edit';
    $array_test1['error'] = 'Exito';
    $array_test1['error_esperado'] = '000054';
    $array_test1['error_obtenido'] = '';
    $array_test1['resultado'] = '';

    $obra = new OBRAS_Model('12345679', 'obra', '', '', '', '1', '', '', '');
    $obra->ADD();
    $obra->fecha_creacion='2020-10-02';

    $array_test1['error_obtenido'] = $obra->EDIT()['code'];
    if ($array_test1['error_obtenido'] === $array_test1['error_esperado']) {
        $array_test1['resultado'] = 'OK';
    } else {
        $array_test1['resultado'] = 'FALSE';
    }

    array_push($OBRAS_array_test, $array_test1);
    $obra->DELETE();
// comprobar fallo

    $array_test1['entidad'] = 'obras';
    $array_test1['metodo'] = 'edit';
    $array_test1['error'] = 'No existe el area';
    $array_test1['error_esperado'] = '005073';
    $array_test1['error_obtenido'] = '';
    $array_test1['resultado'] = '';


    $obra = new OBRAS_Model('12345679', 'obra', '', '', '', '1', '', '', '');
   $obra->ADD();
   $obra->codigo_area='2';
    $array_test1['error_obtenido'] = $obra->EDIT()[0]['code'];
    if ($array_test1['error_obtenido'] === $array_test1['error_esperado']) {
        $array_test1['resultado'] = 'OK';
    } else {
        $array_test1['resultado'] = 'FALSE';
    }

    array_push($OBRAS_array_test, $array_test1);
    $obra->DELETE();

// comprobar fallo

	$array_test1['entidad'] = 'obras';
	$array_test1['metodo'] = 'edit';
	$array_test1['error'] = 'No existe el CIF';
	$array_test1['error_esperado'] = '004072';
	$array_test1['error_obtenido'] = '';
	$array_test1['resultado'] = '';


	$obra= new OBRAS_Model('12345679','obra','','','','1','','','');
	$obra->ADD();
	$obra->CIF='2';
	$array_test1['error_obtenido'] = $obra->EDIT()[0]['code'];
	if ($array_test1['error_obtenido'] === $array_test1['error_esperado'])
	{
		$array_test1['resultado'] = 'OK';
	}
	else
	{
		$array_test1['resultado'] = 'FALSE';
	}

	array_push($OBRAS_array_test, $array_test1);
	$obra->DELETE();

}


function OBRAS_DELETE_test()
{
    global $OBRAS_array_test;
// creo array de almacen de test individual
    $array_test1 = array();

// comprobar success
//-------------------------------------------------------------------------------

    $array_test1['entidad'] = 'obras';
    $array_test1['metodo'] = 'delete';
    $array_test1['error'] = 'Exito';
    $array_test1['error_esperado'] = '000055';
    $array_test1['error_obtenido'] = '';
    $array_test1['resultado'] = '';

    $obra = new OBRAS_Model('12345679', 'obra', '', '', '', '1', '', '', '');
    $obra->ADD();

    $array_test1['error_obtenido'] = $obra->DELETE()['code'];
    if ($array_test1['error_obtenido'] === $array_test1['error_esperado']) {
        $array_test1['resultado'] = 'OK';
    } else {
        $array_test1['resultado'] = 'FALSE';
    }

    array_push($OBRAS_array_test, $array_test1);

// comprobar fallo

    $array_test1['entidad'] = 'obras';
    $array_test1['metodo'] = 'delete';
    $array_test1['error'] = 'Tiene actuaciones';
    $array_test1['error_esperado'] = '005074';
    $array_test1['error_obtenido'] = '';
    $array_test1['resultado'] = '';


    $obra = new OBRAS_Model('12345679', 'obra', '', '', '', '1', '', '', '');
   $obra->ADD();
   $acto=new ACTUACIONES_Model('1','12345679','sasasa','01/01/2020');
   $acto->ADD();
    $array_test1['error_obtenido'] = $obra->DELETE()['code'];
    if ($array_test1['error_obtenido'] === $array_test1['error_esperado']) {
        $array_test1['resultado'] = 'OK';
    } else {
        $array_test1['resultado'] = 'FALSE';
    }

    array_push($OBRAS_array_test, $array_test1);
    $obra->DELETE();

}

function OBRAS_SEARCH_test()
{
    global $OBRAS_array_test;
// creo array de almacen de test individual
    $array_test1 = array();

// comprobar success
//-------------------------------------------------------------------------------

    $array_test1['entidad'] = 'obras';
    $array_test1['metodo'] = 'search';
    $array_test1['error'] = 'Exito';
    $array_test1['error_esperado'] = '00008';
    $array_test1['error_obtenido'] = '';
    $array_test1['resultado'] = '';

    $obra = new OBRAS_Model('12345679', 'obra', '', '', '', '1', '', '', '');
    $obra->ADD();

    $obras= new OBRAS_Model('','','','','','','','','');
    $obras->SEARCH();
    $array_test1['error_obtenido'] = $obras->feedback['code'];
    if ($array_test1['error_obtenido'] === $array_test1['error_esperado']) {
        $array_test1['resultado'] = 'OK';
    } else {
        $array_test1['resultado'] = 'FALSE';
    }

    array_push($OBRAS_array_test, $array_test1);
$obra->DELETE();


// comprobar fallo

    $array_test1['entidad'] = 'obras';
    $array_test1['metodo'] = 'search';
    $array_test1['error'] = 'No encontrado';
    $array_test1['error_esperado'] = '000056';
    $array_test1['error_obtenido'] = '';
    $array_test1['resultado'] = '';


    $obra = new OBRAS_Model('44', '', '', '', '', '', '', '', '');

    $array_test1['error_obtenido'] = $obra->SEARCH()['code'];
    if ($array_test1['error_obtenido'] === $array_test1['error_esperado']) {
        $array_test1['resultado'] = 'OK';
    } else {
        $array_test1['resultado'] = 'FALSE';
    }

    array_push($OBRAS_array_test, $array_test1);
    $obra->DELETE();

    //comprobar busqueda con parametros

    $array_test1['entidad'] = 'obras';
    $array_test1['metodo'] = 'search_by_CIF';
    $array_test1['error'] = 'Exito';
    $array_test1['error_esperado'] = '00008';
    $array_test1['error_obtenido'] = '';
    $array_test1['resultado'] = '';

    $prov= new PROVEEDORES_Model('123456795','potente','aqui','aca','36155','e@mail.com','986876678','','dsds');
    $prov->ADD();
    $obra = new OBRAS_Model('111111111', 'obra', '', '', '123456795', '1', '', '', '');
    $obra->ADD();

    $obras= new OBRAS_Model('','','','','123456795','','','','');
    $obras->SEARCH();
    $array_test1['error_obtenido'] = $obras->feedback['code'];
    if ($array_test1['error_obtenido'] === $array_test1['error_esperado']) {
        $array_test1['resultado'] = 'OK';
    } else {
        $array_test1['resultado'] = 'FALSE';
    }

    array_push($OBRAS_array_test, $array_test1);
$obra->DELETE();

}


function OBRAS_getById_test()
{
    global $OBRAS_array_test;
// creo array de almacen de test individual
    $array_test1 = array();

// comprobar success
//-------------------------------------------------------------------------------

    $array_test1['entidad'] = 'obras';
    $array_test1['metodo'] = 'getById';
    $array_test1['error'] = 'Exito';
    $array_test1['error_esperado'] = '00008';
    $array_test1['error_obtenido'] = '';
    $array_test1['resultado'] = '';

    $obra = new OBRAS_Model('12345679', 'obra', '', '', '', '1', '', '', '');
    $obra->ADD();

    $obras = new OBRAS_Model('12345679', '', '', '', '', '', '', '', '');
    $obras->getById();
    $array_test1['error_obtenido'] = $obras->feedback['code'];
    if ($array_test1['error_obtenido'] === $array_test1['error_esperado']) {
        $array_test1['resultado'] = 'OK';
    } else {
        $array_test1['resultado'] = 'FALSE';
    }

    array_push($OBRAS_array_test, $array_test1);
    $obra->DELETE();


// comprobar fallo

    $array_test1['entidad'] = 'obras';
    $array_test1['metodo'] = 'getById';
    $array_test1['error'] = 'No encontrado';
    $array_test1['error_esperado'] = '005072';
    $array_test1['error_obtenido'] = '';
    $array_test1['resultado'] = '';


    $obra = new OBRAS_Model('44', '', '', '', '', '', '', '', '');

    $array_test1['error_obtenido'] = $obra->getById()['code'];
    if ($array_test1['error_obtenido'] === $array_test1['error_esperado']) {
        $array_test1['resultado'] = 'OK';
    } else {
        $array_test1['resultado'] = 'FALSE';
    }

    array_push($OBRAS_array_test, $array_test1);

}
OBRAS_ADD_test();
OBRAS_EDIT_test();
OBRAS_DELETE_test();
OBRAS_SEARCH_test();
OBRAS_getById_test();