<?php 

abstract class pruebaabstracto{
	
	private static $db_host = 'host';
	private static $db_user = 'user';
	private static $db_pass = 'pass';
	protected $db_name = 'BD';
	protected $query;
	private $conn;
	public $ok = true;
	public $code = '00000';
	
# métodos abstractos para ABM de clases que hereden

	abstract protected function get();
	abstract protected function set();
	/*abstract protected function EDIT();
	abstract protected function DELETE();
	abstract protected function ADD();
	abstract protected function SEARCH();
	abstract protected function SEARCHONE();
	abstract protected function login();
	abstract protected function Register();
	abstract protected function attributes_validation();*/
	
# los siguientes métodos pueden definirse con exactitud y
# no son abstractos

# Almacenar en log

	public function echotexto(){
		echo 'funciona el echo';
	}

}

?>