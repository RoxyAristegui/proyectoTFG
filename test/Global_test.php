<?php
//testing funcionalidades globales
//include '../Model/config.php';
include_once '../Model/Access_DB.php';

function ExisteBD()
{

	global $BD_errors_array_test;

// creo array de almacen de test individual
	$global_array_test = array();

// usuario o contraseña no es correcto
//-------------------------------------------------------------------------------
	$global_array_test['entidad'] = 'GENERAL';	
	$global_array_test['metodo'] = 'BD';
	$global_array_test['error'] = 'Usuario contraseña erronea';
	$global_array_test['error_esperado'] = "Access denied for user 'roxytfg'@'localhost' (using password: YES)";
	$global_array_test['error_obtenido'] = '';
	$global_array_test['resultado'] = '';

	mysqli_report(MYSQLI_REPORT_STRICT);

	try{
		$mysqli = new mysqli(host, user, 'aaaa' , BD);
	}
	catch (mysqli_sql_exception $e){
		$global_array_test['error_obtenido'] = $e->getMessage();
	}

	
   	if ($global_array_test['error_obtenido'] === $global_array_test['error_esperado'])
	{
		$global_array_test['resultado'] = 'OK';
	}
	else
	{
		$global_array_test['resultado'] = 'FALSE';
	}

	array_push($BD_errors_array_test, $global_array_test);


	//NO existe la BD
	//------------------------------------------

	$global_array_test['entidad'] = 'GENERAL';	
	$global_array_test['metodo'] = 'BD';
	$global_array_test['error'] = 'No existe la bd';
	$global_array_test['error_esperado'] = "Access denied for user 'roxytfg'@'localhost' to database 'bd'";
	$global_array_test['error_obtenido'] = '';
	$global_array_test['resultado'] = '';

	try{
		$mysqli = new mysqli(host, user, pass , 'bd');
	}
	catch (mysqli_sql_exception $e){
		$global_array_test['error_obtenido'] = $e->getMessage();
	}


   	if ((strpos($global_array_test['error_esperado'],$global_array_test['error_obtenido'])) === false)
	{
		$global_array_test['resultado'] = 'FALSE';
	}
	else
	{
		$global_array_test['resultado'] = 'OK';
	}

	array_push($BD_errors_array_test, $global_array_test);

//comprobar que si existe la base de datos y los datos son correctos
    
	$global_array_test['entidad'] = 'GENERAL';	
	$global_array_test['metodo'] = 'BD';
	$global_array_test['error'] = 'Base de datos correcta';
	$global_array_test['error_esperado'] = "object";
	$global_array_test['error_obtenido'] = '';
	$global_array_test['resultado'] = '';

	try{
		$mysqli = connectDB();

		$global_array_test['error_obtenido'] = gettype($mysqli);	
	}
	catch (mysqli_sql_exception $e){
		$global_array_test['error_obtenido'] = $e->getMessage();
	}



   	if ((strpos($global_array_test['error_esperado'],$global_array_test['error_obtenido'])) === false)
	{
		$global_array_test['resultado'] = 'FALSE';
	}
	else
	{
		$global_array_test['resultado'] = 'OK';
	}

	array_push($BD_errors_array_test, $global_array_test);



}




function ExistenTablas()
{

}

ExisteBD();

?>
