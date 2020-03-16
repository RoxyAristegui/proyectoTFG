<?php

	class USUARIOS_SHOWCURRENT{


		function __construct($tupla){	
			$this->tupla = $tupla;
			$this->render();
		}

		function render(){

			include '../View/Header.php'; //header necesita los strings
		?>
	
	<div class="container">
		<h1 class="Detalles">Detalles</h1>	

		<!--form name = 'Form' action='../Controller/USUARIOS_Controller.php' method='post' onsubmit="return comprobar_registro();"-->
			<div class="form-group row">
				<label for='login' class="col-sm-2 col-form-label">Login</label>
			 	<div class="col-sm-8">
			 		 <input type = 'text' name = 'login' id = 'login' class="form-control-plaintext" placeholder = 'UtilizaDni' size = '9' value = '<?php echo $this->tupla['login']; ?>'readonly>
			 	</div>
			</div>
			<div class="form-group row">
				<label for='password' class="col-sm-2 col-form-label">Contraseña></label>
			 	<div class="col-sm-8">
				 	<input type = 'text' name = 'password' id = 'password' class="form-control-plaintext" placeholder = 'LetrasyNumeros' size = '15' value = '<?php echo $this->tupla['password']; ?>'  readonly>
				</div>
			</div>
			<div class="form-group row">
				<label for='nombre' class="col-sm-2 col-form-label">Nombre</label>
			 	<div class="col-sm-8">
					<input type = 'text' name = 'nombre' class="form-control-plaintext" id = 'nombre' placeholder = 'soloLetras' size = '30' value = '<?php echo $this->tupla['nombre']; ?>' readonly>
				</div>
			</div>
			<div class="form-group row">
				<label for='apellidos' class="col-sm-2 col-form-label">Apellidos</label>
			 	<div class="col-sm-8">
					<input type = 'text' name = 'apellidos' id = 'apellidos' class="form-control-plaintext" placeholder = 'soloLetras' size = '50' value = '<?php echo $this->tupla['apellidos']; ?>'  readonly>
				</div>
			</div>
			<div class="form-group row">
				<label for='email' class="col-sm-2 col-form-label">Email</label>
			 	<div class="col-sm-8">
					<input type = 'text' name = 'email' id = 'email' class="form-control-plaintext" size = '40' value = '<?php echo $this->tupla['email']; ?>' readonly>
				</div>
			</div>
			<div class="form-group row">
				<label for='dni' class="col-sm-2 col-form-label">DNI</label>
			 	<div class="col-sm-8">
					<input type = 'text' name = 'dni' id = 'dni' class="form-control-plaintext" size = '40' value = '<?php echo $this->tupla['DNI']; ?>' readonly>
				</div>
			</div>
			<!-- añadir control, de si es el mismmo, ir a editar_self o algo así -->
				<button type='submit' name='action' class="btn btn-outline-info edit icon" value="EDIT"></button>
				<a href='../Controller/Index_Controller.php' class="icon volver ml-3"> </a>

	
	
		</div>
		
		
		<?php
			include '../View/Footer.php';
		} //fin metodo render

	} //fin REGISTER

?>

	