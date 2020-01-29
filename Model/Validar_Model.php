<?php

class Validar{

//valor del campo
	var $campo;
	//nombre del campo
	var $string;
	var $erroresdatos;

	function __construct($campo,$string,$erroresdatos){
		$this->campo=$campo;
		$this->string=$string;
		$this->erroresdatos=$erroresdatos;
	}
	function __destruct(){

	}

	function stringAlfanumerico(){
		

		if (strlen($this->campo)<3)
		{
		//	$error = 'Error en nombre: longitud menor que 3';
			$error='000021';

			array_push($this->erroresdatos,["codigo"=>$error,"campo"=>$this->string]);
		
		}
		if (strlen($this->campo)>30)
		{
			//$error = 'Error en nombre: longitud mayor de 30';
		$error='000022';

			array_push($this->erroresdatos,["codigo"=>$error,"campo"=>$this->string]);
			
		}
		if (!preg_match("^([a-zA-Z])^",$this->campo)){
			//solo alfanumerícos
			$error = '000023';

			array_push($this->erroresdatos,["codigo"=>$error,"campo"=>$this->string]);
		
		}
		
		return $this->erroresdatos;
	}

	function EsEmail(){
		 if (!filter_var($this->campo, FILTER_VALIDATE_EMAIL)){ //email incorrecto
      	$error='000024';
			array_push($this->erroresdatos,["codigo"=>$error,"campo"=>$this->string]);
		}
		return $this->erroresdatos;
	
	}

		


}