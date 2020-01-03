<?php

include 'pruebaabstracto.php';

class pruebaobjeto extends pruebaabstracto{
	
	function get(){
		echo 'no hago nada en la funcion get';
	}

	function set(){
		echo 'no hago nada en la funcion set';
	}
}

$objeto = new pruebaobjeto;
$objeto->echotexto();

$objeto->get();
$objeto->set();
?>