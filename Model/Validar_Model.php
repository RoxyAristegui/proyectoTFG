<?php

class Validar{


	function __construct(){
	
	}
	function __destruct(){
}

function Validar_nombre($string,$errores){

	if (strlen($string)<3){
		//la longitud debe ser mayor de 3
		$error='000121';
		array_push($errores, $error);
	}
	if (strlen($string)>30){
			//$error = 'Error en nombre: longitud mayor de 30';
			$error='000122';
		array_push($errores, $error);
	}

	//solo se admiten carácteres alfanuméricos 
	if (preg_match('/[^a-zA-Z]/',$string)){
			//solo alfanumerícos
			$error = '000123';
		array_push($errores, $error);
	}
	return $errores;
}

function Validar_login($string,$errores){
//la longitud debe ser mayor de 5
	if (strlen($string)<5){
		$error='000131';
		array_push($errores, $error);
	}
	if (strlen($string)>30){
			//$error = 'Error en nombre: longitud mayor de 30';
			$error='000132';
		array_push($errores, $error);
	}

	//solo se admiten carácteres alfanuméricos 
	if (preg_match('/[^a-zA-Z0-9]/',$string)){
			//solo alfanumerícos
			$error = '000133';
		array_push($errores, $error);
	}
	return $errores;
}

function Validar_password($string,$errores){

//la longitud debe ser mayor de 5
	if (strlen($string)<5){
		$error='000141';
		array_push($errores, $error);
	}
	if (strlen($string)>30){
			//$error = 'Error en nombre: longitud mayor de 30';
			$error='000142';
		array_push($errores, $error);
	}

	//solo se admiten carácteres alfanuméricos 
	if (preg_match('/[^a-zA-Z0-9]/',$string)){
			//solo alfanumerícos
			$error = '000143';
		array_push($errores, $error);
	}
	return $errores;
}

function Validar_apellidos($string,$errores){
	//la longitud debe ser mayor de 3
	if (strlen($string)<3){
		$error='000151';
		array_push($errores, $error);
	}
	if (strlen($string)>50){
			//$error = 'Error en nombre: longitud mayor de 30';
			$error='000152';
		array_push($errores, $error);
	}
	//solo se admiten carácteres alfanuméricos y espacios
	if (preg_match('/[^a-zA-Z0-9\s]/',$string)){
			//solo alfanumerícos
			$error = '000153';
		array_push($errores, $error);
	}
	return $errores;
}

function Validar_email($string,$errores){

	 if (filter_var($string, FILTER_VALIDATE_EMAIL)==false){ //email incorrecto
      	$error='000161';
      	array_push($errores, $error);
	}
	return $errores;
}


}