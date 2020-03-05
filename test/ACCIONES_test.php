<?php


include '../Model/Acciones_Model.php';
 $Acciones_array_test=array();
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
Add_Accion_Test();
Edit_Accion_Test();
echo "<pre>";
var_dump($Acciones_array_test);
echo "</pre>";
