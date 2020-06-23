<?php

	class USUARIOS_SEARCH{


		function __construct($listaRoles){
		$this->listaRoles=$listaRoles;	
			$this->render();
		}

		function render(){

			include '../View/Header.php'; //header necesita los strings
		?>
			<div class="container">
		<h1 class="BuscarUsuario">Buscar usuario</h1>	

		<form name = 'Form' action='../Controller/USUARIOS_Controller.php' method='post' >
			<div class="form-group row">
				<label for='login' class="col-sm-2 col-form-label">Login</label>
			 	<div class="col-sm-8">
			 		 <input type = 'text' name = 'login' id = 'login' class="form-control" placeholder = 'IntroduceLogin' >
			 	</div>
			</div>
			<div class="form-group row">
				<label for='password' class="col-sm-2 col-form-label">Contraseña</label>
			 	<div class="col-sm-8">
				 	<input type = 'text' name = 'password' id = 'password' class="form-control" placeholder = 'LetrasyNumeros' size = '15'>
				</div>
			</div>
			<div class="form-group row">
				<label for='nombre' class="col-sm-2 col-form-label">Nombre</label>
			 	<div class="col-sm-8">
					<input type = 'text' name = 'nombre' class="form-control" id = 'nombre' placeholder = 'SoloLetras' size = '15' value ='' >
				</div>
			</div>
			<div class="form-group row">
				<label for='apellidos' class="col-sm-2 col-form-label">Apellidos</label>
			 	<div class="col-sm-8">
					<input type = 'text' name = 'apellidos' id = 'apellidos' class="form-control" placeholder = 'SoloLetrasEspacios' size = '50'  >
				</div>
			</div>
			<div class="form-group row">
				<label for='email' class="col-sm-2 col-form-label">Email</label>
			 	<div class="col-sm-8">
					<input type = 'text' name = 'email' id = 'email' class="form-control" size = '40' placeholder="DebeSerEmailValido"  >
				</div>
			</div>
			<div class="form-group row">
				<label for='dni' class="col-sm-2 col-form-label">DNI</label>
			 	<div class="col-sm-8">
					<input type = 'text' name = 'dni' id = 'dni' class="form-control" size = '9' placeholder="IntroduceDni" >
				</div>
			</div>

			<div class="form-group row">
				<label for='rol' class="col-sm-2 col-form-label">Rol</label>
			<div class="col-sm-8">
					 <select class="form-control"id="rol" name="id_rol" >
					  <?php
					 
					
						echo "<option value='' selected> Seleccione una opcion </option>";
					   foreach($this->listaRoles as $rol){
					 	echo  "<option value='".$rol['id_rol']."' >".$rol['rol']."</option>";
					     

					   } ?>
					    </select>

					
				</div>
			</div>

				<button type='submit' name='action' class="btn btn-outline-info icon lupa" value="SEARCH"></button>
				<a href='../Controller/Index_Controller.php' class="icon volver ml-3"> </a>

		</form>
	
		</div>
		<?php
			include '../View/Footer.php';
		} //fin metodo render

	} //fin REGISTER

?>

	