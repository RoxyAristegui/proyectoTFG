<?php

class USUARIOS_DELETE{


	function __construct($tupla,$rol){	
		$this->tupla = $tupla;
		$this->rol=$rol;
		$this->render();
	}

	function render(){

		include '../View/Header.php'; //header necesita los strings
		
	?>
	<div class="container">
		<h1 class="BorrarUsuario">Borrar usuario</h1>	

		<form name = 'Form' action='../Controller/USUARIOS_Controller.php' method='post' onsubmit="confirmar_eliminar()">
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
				<div class="form-group row">
				<label for='rol' class="col-sm-2 col-form-label">rol</label>
			 	<div class="col-sm-8">
					<input type = 'text' name = 'id_rol' id = 'id_rol' class="form-control-plaintext" size = '40' value = '<?php echo $this->rol ?>' readonly>
				</div>
			</div>
				<input type="hidden" name="action" value="DELETE">
				<button type='submit' name='action' class="btn btn-outline-info delete icon" id="eliminar" value="DELETE"></button>
			
				<a href='../Controller/USUARIOS_Controller.php' class="icon volver ml-3"> </a>

		</form>
	
		</div>
	<?php
		include '../View/Footer.php';
		include "Solicitar_Confirmacion_Modal.php";
	
	?>
	<script type="text/javascript">
		function confirmar_eliminar(){
		    event.preventDefault()
		    $('#SolicitarConfModal').find("#elem").text('<?php echo $this->tupla['login']?> ?')

		        $('#SolicitarConfModal').find("#msj").attr('class','EstasSeguroEliminarUsuario')
		       setLang();
		    $("#SolicitarConfModal").modal("show");
		    $("#confirmGo").click(function(){
		      $("form").submit();
		  
		    });

		  }
    </script>
  <?php 

	} //fin metodo render

} //fin REGISTER

?>

