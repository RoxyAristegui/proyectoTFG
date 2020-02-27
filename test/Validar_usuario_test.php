<?php

//vector array=($metodo,$nomError,$errorEsperado,$usuario,$funcion);
include_once('../Model/USUARIOS_Model.php');

function validarUsuarioProcesor($vectores){
global $ERRORS_array_test;
// creo array de almacen de test individual
	$USUARIOS_array_test1 = array();

foreach($vectores as $vector){
//comprobar bśqueda errónea
	var_dump($vector);
		$USUARIOS_array_test1['entidad'] = 'ValidarUsuario';	
	$USUARIOS_array_test1['metodo'] = $vector['metodo'];
	$USUARIOS_array_test1['error'] = $vector['nomError'];
	$USUARIOS_array_test1['error_esperado'] = $vector['errorEsperado'];
	$USUARIOS_array_test1['error_obtenido'] = '';
	$USUARIOS_array_test1['resultado'] = '';
	$USUARIOS_array_test1['error_obtenido'] = $vector['usuario'];
	if ($USUARIOS_array_test1['error_obtenido'] === $USUARIOS_array_test1['error_esperado'])
	{
		$USUARIOS_array_test1['resultado'] = 'OK';
	}	else	{
		$USUARIOS_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $USUARIOS_array_test1);

}
}

//arreglar que al usar el mismo puto objeto se me mantienen los errores comprobados pasados....
$usuarioCorto=new USUARIOS_Model("log","pass","no","ap","","");

$usuarioLargo=new USUARIOS_Model("logeandovadsdsdsdsdsdsdsdsddsdsmos","passwordmegacontraseñalargalarguisima","dasdasdsadasdasdasdasdadsasdasdsad","","","");
$usuarioCaracteres=new USUARIOS_Model("lo gin","pass ","nom bre","apelli2","","");
$usuarioCorrecto=new USUARIOS_Model("miusuario","password2","nombre","apellidos","email@mail.com","53604521P");

$vector=[
[
'metodo'=>'Comprobar login',
'nomError'=>'Longitud corta',
'errorEsperado'=>'000131',
'usuario'=>$usuarioCorto->Comprobar_login()[0]['code'],
],
[
'metodo'=>'Comprobar login',
'nomError'=>'Longitud Larga',
'errorEsperado'=>'000132',
'usuario'=>$usuarioLargo->Comprobar_login()[0]['code'],
],
[
'metodo'=>'Comprobar login',
'nomError'=>'caracteres incorrectos',
'errorEsperado'=>'000133',
'usuario'=>$usuarioCaracteres->Comprobar_login()[0]['code'],
],
[
'metodo'=>'Comprobar login',
'nomError'=>'login correcto',
'errorEsperado'=>'array',
'usuario'=>gettype($usuarioCorrecto->Comprobar_login()),
],

[
'metodo'=>'Comprobar nombre',
'nomError'=>'Longitud corta',
'errorEsperado'=>'000121',
'usuario'=>$usuarioCorto->Comprobar_nombre()[0]['code'],
],
[
'metodo'=>'Comprobar nombre',
'nomError'=>'Longitud Larga',
'errorEsperado'=>'000122',
'usuario'=>$usuarioLargo->Comprobar_nombre()[0]['code'],
],
[
'metodo'=>'Comprobar nombre',
'nomError'=>'caracteres incorrectos',
'errorEsperado'=>'000123',
'usuario'=>$usuarioCaracteres->Comprobar_nombre()[0]['code'],
],
[
'metodo'=>'Comprobar nombre',
'nomError'=>'lombregin correcto',
'errorEsperado'=>'array',
'usuario'=>gettype($usuarioCorrecto->Comprobar_nombre()),
],

[
'metodo'=>'Comprobar apellido',
'nomError'=>'Longitud corta',
'errorEsperado'=>'000151',
'usuario'=>$usuarioCorto->Comprobar_apellidos()[0]['code'],
],
[
'metodo'=>'Comprobar apellido',
'nomError'=>'Longitud Larga',
'errorEsperado'=>'000152',
'usuario'=>$usuarioLargo->Comprobar_apellidos()[0]['code'],
],
[
'metodo'=>'Comprobar a`pellido',
'nomError'=>'caracteres incorrectos',
'errorEsperado'=>'000153',
'usuario'=>$usuarioCaracteres->Comprobar_apellidos()[0]['code'],
],
[
'metodo'=>'Comprobar apellido',
'nomError'=>'lombregin correcto',
'errorEsperado'=>'array',
'usuario'=>gettype($usuarioCorrecto->Comprobar_apellidos()),
],

];
validarUsuarioProcesor($vector);