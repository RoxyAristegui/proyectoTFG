<?php
if($_POST['idioma']){
	$_COOKIE["idioma"]=$_POST['idioma'];
}else{
	if(!isset($_COOKIE["idioma"])){
		$_COOKIE['idioma']='ESPANISH';
	}
}
header('Location:' . $_SERVER["HTTP_REFERER"]);