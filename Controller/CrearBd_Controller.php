<?php

	include '../crearBd.php';
	include '../View/CrearBD_View.php';
	include '../View/MESSAGE_View.php';

	function get_data_form(){
		$mysql_host=$_POST["mysql_host"];
		$mysql_username=$_POST["mysql_username"];
		$mysql_pass=$_POST["mysql_pass"];

		return new crearBD($mysql_host,$mysql_username,$mysql_pass);
	}

	if(!$_POST){
		new CrearBD_View();
	}else{
		$bd=get_data_form();
		$connect=$bd->leerSQL();
		if($conect['ok']===false){
		new MESSAGE( $connect,"");
	}else{
		header('Location:../test/GENERAL_test.php');
	}

	}