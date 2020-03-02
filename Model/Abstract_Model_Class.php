<?php 

include_once '../Model/config.php';

abstract class Abstract_Model{
	
	private static $db_host = host;
	private static $db_user = user;
	private static $db_pass = pass;
	private static $directorioLog = directorioLog;
	private static $log_name = log_name;
	protected $db_name = BD;
	protected $query;
	protected $rows = array();
	private $conn;
	public $ok = true;
	public $code = '00000';
	public $resource = '';
	public $feedback = array();
	
# métodos abstractos para ABM de clases que hereden

	//abstract protected function get();
	//abstract protected function set();
	abstract protected function EDIT();
	abstract protected function DELETE();
	abstract protected function ADD();
	abstract protected function SEARCH();
	abstract protected function BuscarPorClave();
	//abstract protected function login();
	//abstract protected function Register();
	//abstract protected function Validar_atributos();

# los siguientes métodos pueden definirse con exactitud y
# no son abstractos

# Almacenar en log

	private function save_log(){
		/*$str = date('d-m-Y').":".date('G:i').":".$SESSION['login'].":".$this->query."\n";
		$fichero = fopen('../' . $this->directorioLog . '/' . $this->log_name,"w");
		fwrite($fichero, $str);
		fclose($fichero);*/
	}

# Conectar a la base de datos

	private function open_connection() {
		$this->conn = new mysqli(self::$db_host, self::$db_user,
		self::$db_pass, $this->db_name);
	}

# Desconectar la base de datos

	private function close_connection() {
		$this->conn->close();
	}

# Ejecutar un query simple del tipo INSERT, DELETE, UPDATE

	protected function execute_single_query() {
		//if($_POST) {
			//echo 'single query : '.$this->query.'<br>';
			$this->open_connection();
			if ($this->conn->query($this->query)){
				$this->close_connection();
			//	$this->save_log();
				$this->ok = true;
				$this->code  = '00001'; //sql ejecutada con exito
				$this->construct_response();
			}
			else{
				$this->ok = false;
				$this->code  = '00006'; //sql no ejecutada
				$this->construct_response();
			}
	}
	
# Traer resultados de una consulta en un Array

	protected function get_results_from_query() {
	//	echo 'select query : '.$this->query.'<br>';
		$this->open_connection();
		if ($this->conn == false){
			$this->ok = false;
			$this->code  = '00005'; //error conexion bd
			$this->construct_response();
		}else{
			$result = $this->conn->query($this->query);
			if ($result != true){
				$this->ok = false;
				$this->code  = '00006'; //sql no ejecutada
				$this->construct_response();
			}else{
			//
				if ($result->num_rows == 0){
					$this->ok = true;
					$this->code  = '00007'; // el recordset viene vacio
					$this->construct_response();
				}else{
					while ($this->rows[] = $result->fetch_assoc());
					$result->close();
					$this->ok = true;
					$this->code  = '00008'; // el recordset vuelve con datos
					$this->construct_response();
				}
			}		
			$this->close_connection();
		}
	}
		protected function get_one_result_from_query() {
	//	echo 'select query : '.$this->query.'<br>';
		$this->open_connection();
		if ($this->conn == false){
			$this->ok = false;
			$this->code  = '00005'; //error conexion bd
			$this->construct_response();
		}else{
			$result = $this->conn->query($this->query);
			if ($result != true){
				$this->ok = false;
				$this->code  = '00006'; //sql no ejecutada
				$this->construct_response();
			}else{
			//
				if ($result->num_rows == 0){
					$this->ok = true;
					$this->code  = '00007'; // el recordset viene vacio
					$this->construct_response();
				}else{
					$this->rows= $result->fetch_assoc();
					$result->close();
					$this->ok = true;
					$this->code  = '00008'; // el recordset vuelve con datos
					$this->construct_response();
				}
			}		
			$this->close_connection();
		}
	}

# Construye el array de respuesta de cualquier operación (ok : true/false, code : numero de codigo de error o exito, resource : el recordset correspondiente en caso de un select)

	protected function construct_response() {
		$this->feedback['ok'] = $this->ok;
		$this->feedback['code'] = $this->code;
		$this->feedback['resource'] = $this->resource;
	}




}

?>
