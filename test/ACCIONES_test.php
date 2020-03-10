<?php


include '../Model/Acciones_Model.php';
 
function Add_Accion_Test(){

	global $Acciones_array_test;

// creo array de almacen de test individual
	$array_test1 = array();

// comprobar success
//-------------------------------------------------------------------------------
	
	$array_test1['entidad'] = 'ACCIONES';	
	$array_test1['metodo'] = 'add';
	$array_test1['error'] = 'Añadido nuevo';
	$array_test1['error_esperado'] = '00008';
	$array_test1['error_obtenido'] = '';
	$array_test1['resultado'] = '';
	
	$accion_name = 'edit';
	$accion = new Accion($accion_name);
	$array_test1['error_obtenido'] = $accion->ADD()['code'];
	if ($array_test1['error_obtenido'] === $array_test1['error_esperado'])
	{
		$array_test1['resultado'] = 'OK';
	}
	else
	{
		$array_test1['resultado'] = 'FALSE';
	}

	array_push($Acciones_array_test, $array_test1);
	$accion->DELETE();
// comprobar añadir con id
	echo "segunda linea";
//-------------------------------------------------------------------------------

//comprobar error
//-------------------------------------------------------------------------------
	
	$array_test1['entidad'] = 'ACCIONES';	
	$array_test1['metodo'] = 'add';
	$array_test1['error'] = 'Error al añadir';
	$array_test1['error_esperado'] = '00006';
	$array_test1['error_obtenido'] = '';
	$array_test1['resultado'] = '';
	
	$accion_name = 'editfake';
	$accion = new Accion($accion_name);
	$accion->ADD();
	$array_test1['error_obtenido'] = $accion->ADD()['code'];
	if ($array_test1['error_obtenido'] === $array_test1['error_esperado'])
	{
		$array_test1['resultado'] = 'OK';
	}
	else
	{
		$array_test1['resultado'] = 'FALSE';
	}

	array_push($Acciones_array_test, $array_test1);
	$accion->DELETE();
}

function Edit_Accion_Test(){

	global $Acciones_array_test;

// creo array de almacen de test individual
	$array_test1 = array();

// comprobar success
//-------------------------------------------------------------------------------
	
	$array_test1['entidad'] = 'ACCIONES';	
	$array_test1['metodo'] = 'edit';
	$array_test1['error'] = 'Exito';
	$array_test1['error_esperado'] = '000054';
	$array_test1['error_obtenido'] = '';
	$array_test1['resultado'] = '';
	
	$accion_name = 'nuevo';
	$accion = new Accion('prueba1');
	$accion->ADD();
	$accion->accion=$accion_name;

	$array_test1['error_obtenido'] = $accion->Edit()['code'];
	if ($array_test1['error_obtenido'] === $array_test1['error_esperado'])
	{
		$array_test1['resultado'] = 'OK';
	}
	else
	{
		$array_test1['resultado'] = 'FALSE';
	}

	array_push($Acciones_array_test, $array_test1);
	$accion->DELETE();
// comprobar fallo
//-------------------------------------------------------------------------------
	
	$array_test1['entidad'] = 'ACCIONES';	
	$array_test1['metodo'] = 'edit';
	$array_test1['error'] = 'Error por duplicado';
	$array_test1['error_esperado'] = '000074';
	$array_test1['error_obtenido'] = '';
	$array_test1['resultado'] = '';
	
	
	$accion=  new Accion('error');
	$accion->ADD();
	$accion2 = new Accion('nuevo');
	$accion2->ADD();
	$accion->accion='nuevo';
	$array_test1['error_obtenido'] = $accion->Edit()['code'];
	if ($array_test1['error_obtenido'] === $array_test1['error_esperado'])
	{
		$array_test1['resultado'] = 'OK';
	}
	else
	{
		$array_test1['resultado'] = 'FALSE';
	}

	array_push($Acciones_array_test, $array_test1);
	$accion->DELETE();
	$accion2->DELETE();

//----Comprobar no hay id---------------------------------------------------------------------------
	
	$array_test1['entidad'] = 'ACCIONES';	
	$array_test1['metodo'] = 'edit';
	$array_test1['error'] = 'No hay id';
	$array_test1['error_esperado'] = '000324';
	$array_test1['error_obtenido'] = '';
	$array_test1['resultado'] = '';
	
	$accion = new Accion('noexistes');
	$array_test1['error_obtenido'] = $accion->Edit()['code'];
	if ($array_test1['error_obtenido'] === $array_test1['error_esperado'])
	{
		$array_test1['resultado'] = 'OK';
	}
	else
	{
		$array_test1['resultado'] = 'FALSE';
	}

	array_push($Acciones_array_test, $array_test1);
	$accion->DELETE();



}

function getByName_Acciones_test(){
		global $Acciones_array_test;

// creo array de almacen de test individual
	$array_test1 = array();

// comprobar success
//-------------------------------------------------------------------------------
	
	$array_test1['entidad'] = 'Accion';	
	$array_test1['metodo'] = 'getIdByName';
	$array_test1['error'] = 'Exito';
	$array_test1['error_esperado'] = '999';
	$array_test1['error_obtenido'] = '';
	$array_test1['resultado'] = '';
	

	$accion = new accion('prueba1',999);
	$accion->ADD();
	$accion2 = new accion('prueba1');
	$array_test1['error_obtenido'] = $accion2->getByName();
	if ($array_test1['error_obtenido'] === $array_test1['error_esperado'])
	{
		$array_test1['resultado'] = 'OK';
	}
	else
	{
		$array_test1['resultado'] = 'FALSE';
	}

	array_push($Acciones_array_test, $array_test1);
	$accion->DELETE();
// comprobar fallo
//-------------------------------------------------------------------------------
	
	$array_test1['entidad'] = 'accion';	
	$array_test1['metodo'] = 'getIdByName';
	$array_test1['error'] = 'No existe ese rol';
	$array_test1['error_esperado'] = '000314';
	$array_test1['error_obtenido'] = '';
	$array_test1['resultado'] = '';
	
	
	$accion=  new accion('prueba');
	$array_test1['error_obtenido'] = $accion->getByName()['code'];
	if ($array_test1['error_obtenido'] === $array_test1['error_esperado'])
	{
		$array_test1['resultado'] = 'OK';
	}
	else
	{
		$array_test1['resultado'] = 'FALSE';
	}

	array_push($Acciones_array_test, $array_test1);
	$accion->DELETE();


}


function getById_Acciones_Test(){
		global $Acciones_array_test;

// creo array de almacen de test individual
	$array_test1 = array();

// comprobar success
//-------------------------------------------------------------------------------
	
	$array_test1['entidad'] = 'accion';	
	$array_test1['metodo'] = 'getById';
	$array_test1['error'] = 'Exito';
	$array_test1['error_esperado'] = 'prueba1';
	$array_test1['error_obtenido'] = '';
	$array_test1['resultado'] = '';
	

	$accion = new accion('prueba1',77);
	$accion->ADD();
	$accion2= new accion('',77);
	$array_test1['error_obtenido'] = $accion2->getById();
	if ($array_test1['error_obtenido'] === $array_test1['error_esperado'])
	{
		$array_test1['resultado'] = 'OK';
	}
	else
	{
		$array_test1['resultado'] = 'FALSE';
	}

	array_push( $Acciones_array_test, $array_test1);
	$accion->DELETE();
// comprobar fallo
//-------------------------------------------------------------------------------
	
	$array_test1['entidad'] = 'accion';	
	$array_test1['metodo'] = 'getById';
	$array_test1['error'] = 'No existe ese rol';
	$array_test1['error_esperado'] = '000314';
	$array_test1['error_obtenido'] = '';
	$array_test1['resultado'] = '';
	
	
	$accion=  new accion('',132);
	$array_test1['error_obtenido'] = $accion->getById()['code'];
	if ($array_test1['error_obtenido'] === $array_test1['error_esperado'])
	{
		$array_test1['resultado'] = 'OK';
	}
	else
	{
		$array_test1['resultado'] = 'FALSE';
	}

	array_push($Acciones_array_test, $array_test1);
	$accion->DELETE();


}

Add_Accion_Test();
Edit_Accion_Test();
getById_Acciones_Test();
getByName_Acciones_test();
