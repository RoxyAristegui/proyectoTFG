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
	$array_test1['error_esperado'] = '000321';
	$array_test1['error_obtenido'] = '';
	$array_test1['resultado'] = '';
	
	$accion_name = 'accion1';
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
//-------------------------------------------------------------------------------

//comprobar error
//-------------------------------------------------------------------------------
	
	$array_test1['entidad'] = 'ACCIONES';	
	$array_test1['metodo'] = 'add';
	$array_test1['error'] = 'Añadir duplicado';
	$array_test1['error_esperado'] = '000326';
	$array_test1['error_obtenido'] = '';
	$array_test1['resultado'] = '';
	
	$accion_name = 'accion2';
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
	
	$accion_name = 'accion3';
	$accion = new Accion('accion4');
	$accion->ADD();
	$accion->accion=$accion_name;

	$array_test1['error_obtenido'] = $accion->EDIT()['code'];
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
	$array_test1['error_esperado'] = '000326';
	$array_test1['error_obtenido'] = '';
	$array_test1['resultado'] = '';
	
	
	$accion=  new Accion('accion5');
	$accion->ADD();
	$accion2 = new Accion('accion6');
	$accion2->ADD();
	$accion->accion='accion6';
	$array_test1['error_obtenido'] = $accion->EDIT()['code'];
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
	
	$accion = new Accion('accion7');
	$array_test1['error_obtenido'] = $accion->EDIT()['code'];
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
	

	$accion = new accion('accion8');
	$accion->ADD();

	$array_test1['entidad'] = 'Accion';	
	$array_test1['metodo'] = 'getByName';
	$array_test1['error'] = 'Exito';
	$array_test1['error_esperado'] = $accion->id_accion;
	$array_test1['error_obtenido'] = '';
	$array_test1['resultado'] = '';
	

	$accion2 = new accion('accion8');
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
	$array_test1['error'] = 'No existe esa accion';
	$array_test1['error_esperado'] = '000324';
	$array_test1['error_obtenido'] = '';
	$array_test1['resultado'] = '';
	
	
	$accion=  new accion('accion9');
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
	$array_test1['error_esperado'] = 'accion10';
	$array_test1['error_obtenido'] = '';
	$array_test1['resultado'] = '';
	

	$accion = new accion('accion10');
	$accion->ADD();

	$accion2= new accion('',$accion->id_accion);
	$array_test1['error_obtenido'] = $accion2->getById()['accion'];
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
	$array_test1['error'] = 'No existe esa accion';
	$array_test1['error_esperado'] = '000324';
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
