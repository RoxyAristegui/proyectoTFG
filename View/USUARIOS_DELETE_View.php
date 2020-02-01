<?php

class USUARIOS_DELETE{


	function __construct($tupla){	
		$this->tupla = $tupla;
		$this->render();
	}

	function render(){

		include '../View/Header.php'; //header necesita los strings
	?>
	<div class="container">
		<h1><?php echo $strings['DELETE']; ?></h1>	

		<form name = 'Form' action='../Controller/USUARIOS_Controller.php' method='post' onsubmit="return comprobar_registro();">
			<div class="form-group row">
				<label for='login' class="col-sm-2 col-form-label">Login</label>
			 	<div class="col-sm-8">
			 		 <input type = 'text' name = 'login' id = 'login' class="form-control-plaintext" placeholder = 'Utiliza tu dni' size = '9' value = '<?php echo $this->tupla['login']; ?>'readonly>
			 	</div>
			</div>
			<div class="form-group row">
				<label for='password' class="col-sm-2 col-form-label">Contraseña</label>
			 	<div class="col-sm-8">
				 	<input type = 'text' name = 'password' id = 'password' class="form-control-plaintext" placeholder = 'letras y numeros' size = '15' value = '<?php echo $this->tupla['password']; ?>'  readonly>
				</div>
			</div>
			<div class="form-group row">
				<label for='nombre' class="col-sm-2 col-form-label">Nombre</label>
			 	<div class="col-sm-8">
					<input type = 'text' name = 'nombre' class="form-control-plaintext" id = 'nombre' placeholder = 'Solo letras' size = '30' value = '<?php echo $this->tupla['nombre']; ?>' readonly>
				</div>
			</div>
			<div class="form-group row">
				<label for='apellidos' class="col-sm-2 col-form-label">Apellidos</label>
			 	<div class="col-sm-8">
					<input type = 'text' name = 'apellidos' id = 'apellidos' class="form-control-plaintext" placeholder = 'Solo letras' size = '50' value = '<?php echo $this->tupla['apellidos']; ?>'  readonly>
				</div>
			</div>
			<div class="form-group row">
				<label for='email' class="col-sm-2 col-form-label">Email</label>
			 	<div class="col-sm-8">
					<input type = 'text' name = 'email' id = 'email' class="form-control-plaintext" size = '40' value = '<?php echo $this->tupla['email']; ?>' readonly>
				</div>
			</div>

				<input type='submit' name='action' class="btn btn-primary" value='DELETE'>

		</form>
		<a href='../Controller/Index_Controller.php'>Volver </a>
	
		</div>
	<?php
		include '../View/Footer.php';
	} //fin metodo render

} //fin REGISTER

?>

