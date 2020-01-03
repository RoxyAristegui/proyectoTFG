<?php

class Index {

	function __construct(){
		$this->render();
	}

	function render(){
	
		include '../Locale/Strings_SPANISH.php';
		include '../View/Header.php';
?>
		<H1> BIENVENIDO A LA ARQUITECTURA BASE DE IU' </H1>
		<BR>
<?php
		include '../View/Footer.php';
	}

}

?>