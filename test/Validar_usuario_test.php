<?php

//vector array=($metodo,$nomError,$errorEsperado,$usuario,$funcion);
include_once('../Model/USUARIOS_Model.php');

function validarUsuarioProcesor($vectores){
global $Validacion_errors_array_test;
// creo array de almacen de test individual
	$USUARIOS_array_test1 = array();

foreach($vectores as $vector){
//comprobar bśqueda errónea
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

	array_push($Validacion_errors_array_test, $USUARIOS_array_test1);

}
}

//arreglar que al usar el mismo puto objeto se me mantienen los errores comprobados pasados....
$usuarioCorto=new USUARIOS_Model("log","pass","no","ap","","");
$usuarioLargo=new USUARIOS_Model("logeandovadsdsdsdsdsdsdsdsddsdsmos","","","","","");
$usuarioCaracteres=new USUARIOS_Model("lo gin","","","","","");
$usuarioCorrecto=new USUARIOS_Model("miusuario","password2","nombre","apellidos apellidos","email@mail.com","53604521P");

$passCorto=new USUARIOS_Model("log","pass","no","ap","","");
$passLargo=new USUARIOS_Model("","logeandovadsdsdsdsdsdsdsddsdsdsdsdsdsdsdsdsdsdsdssdsdsddsdsmosssssssssssssssss","","","","");
$passCaracteres=new USUARIOS_Model("","pass2/","nom2/","","","");

$nomCorto=new USUARIOS_Model("log","pass","no","ap","","");
$nomLargo=new USUARIOS_Model("","","logeandovadsdsdsdsdsdsdsdsddsdsmosssssssssssssssss","","","");
$nomCaracteres=new USUARIOS_Model("","","nom 2","","","");

$apeCorto=new USUARIOS_Model("log","pass","no","ap","","");
$apeLargo=new USUARIOS_Model("","","","logeandovadsdsdsdsdsdsdsdsdsdsddsdsmosssssssssssssssss","","");
$apeCaracteres=new USUARIOS_Model("","pass2/","nom 2","ape /llidos","","");

$emailMal=new USUARIOS_Model("log","pass","no","ap","email","");
$emailBien=new USUARIOS_Model("log","pass","no","ap","email@email.com","");

$dniMal=new USUARIOS_Model("log","pass","no","ap","email","66666666");
$dniBien=new USUARIOS_Model("log","pass","no","ap","email@email.com","36165166N");


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
'errorEsperado'=>array(),
'usuario'=>$usuarioCorrecto->Comprobar_login(),
],
[
'metodo'=>'Comprobar contraseña',
'nomError'=>'Longitud corta',
'errorEsperado'=>'000141',
'usuario'=>$passCorto->Comprobar_password()[0]['code'],
],
[
'metodo'=>'Comprobar contraseña',
'nomError'=>'Longitud Larga',
'errorEsperado'=>'000142',
'usuario'=>$passLargo->Comprobar_password()[0]['code'],
],
[
'metodo'=>'Comprobar contraseña',
'nomError'=>'caracteres incorrectos',
'errorEsperado'=>'000143',
'usuario'=>$passCaracteres->Comprobar_password()[0]['code'],
],
[
'metodo'=>'Comprobar contraseña',
'nomError'=>'contraseña correcto',
'errorEsperado'=>array(),
'usuario'=>$usuarioCorrecto->Comprobar_password(),
],

[
'metodo'=>'Comprobar nombre',
'nomError'=>'Longitud corta',
'errorEsperado'=>'000121',
'usuario'=>$nomCorto->Comprobar_nombre()[0]['code'],
],
[
'metodo'=>'Comprobar nombre',
'nomError'=>'Longitud Larga',
'errorEsperado'=>'000122',
'usuario'=>$nomLargo->Comprobar_nombre()[0]['code'],
],
[
'metodo'=>'Comprobar nombre',
'nomError'=>'caracteres incorrectos',
'errorEsperado'=>'000123',
'usuario'=>$nomCaracteres->Comprobar_nombre()[0]['code'],
],
[
'metodo'=>'Comprobar nombre',
'nomError'=>'nombre correcto',
'errorEsperado'=>array(),
'usuario'=>$usuarioCorrecto->Comprobar_nombre(),
],

[
'metodo'=>'Comprobar apellido',
'nomError'=>'Longitud corta',
'errorEsperado'=>'000151',
'usuario'=>$apeCorto->Comprobar_apellidos()[0]['code'],
],
[
'metodo'=>'Comprobar apellido',
'nomError'=>'Longitud Larga',
'errorEsperado'=>'000152',
'usuario'=>$apeLargo->Comprobar_apellidos()[0]['code'],
],
[
'metodo'=>'Comprobar apellido',
'nomError'=>'caracteres incorrectos',
'errorEsperado'=>'000153',
'usuario'=>$apeCaracteres->Comprobar_apellidos()[0]['code'],
],
[
'metodo'=>'Comprobar apellido',
'nomError'=>'apellidos correcto',
'errorEsperado'=>array(),
'usuario'=>$usuarioCorrecto->Comprobar_apellidos(),
],
[
'metodo'=>'Comprobar email',
'nomError'=>'email incorrecto',
'errorEsperado'=>'000161',
'usuario'=>$emailMal->Comprobar_email()[0]['code'],
],
[
'metodo'=>'Comprobar email',
'nomError'=>'email correcto',
'errorEsperado'=>array(),
'usuario'=>$emailBien->Comprobar_email(),
],
[
'metodo'=>'Comprobar dni',
'nomError'=>'dni incorrecto',
'errorEsperado'=>'000162',
'usuario'=>$dniMal->Comprobar_dni()[0]['code'],
],
[
'metodo'=>'Comprobar dni',
'nomError'=>'dni correcto',
'errorEsperado'=>array(),
'usuario'=>$dniBien->Comprobar_dni(),
],
];


validarUsuarioProcesor($vector);