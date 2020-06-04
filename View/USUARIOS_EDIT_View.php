<?php

	class USUARIOS_EDIT{


		function __construct($tupla,$listaRoles){	
			$this->tupla = $tupla;
			$this->listaRoles= $listaRoles;
			$this->render();
		}

		function render(){

			include '../View/Header.php'; //header necesita los strings
		?>
			

	<div class="container">
		<h1 class="EditarUsuario">Editar usuario</h1>	

		<form name = 'Form' action='../Controller/USUARIOS_Controller.php' method='post' onsubmit="return comprobar_registro();">
			<div class="form-group row">
				<label for='login' class="col-sm-2 col-form-label">Login</label>
			 	<div class="col-sm-8">
			 		 <input type = 'text' name = 'login' id = 'login' class="form-control" placeholder = 'UtilizaDni' value = '<?php echo $this->tupla['login']; ?>' readonly>
			 	</div>
			</div>
			<div class="form-group row">
				<label for='password' class="col-sm-2 col-form-label">Contraseña</label>
			 	<div class="col-sm-8">
				 	<input type = 'password' name = 'password' id = 'password' class="form-control" placeholder = 'LetrasyNumeros' value = '<?php echo $this->tupla['password']; ?>' minlength="5" maxlength="30" required >
				</div>
			</div>
			<div class="form-group row">
				<label for='nombre' class="col-sm-2 col-form-label">Nombre</label>
			 	<div class="col-sm-8">
					<input type = 'text' name = 'nombre' class="form-control" id = 'nombre' placeholder = 'SoloLetras' value = '<?php echo $this->tupla['nombre']; ?>'minlength="3" maxlength="30" required >
				</div>
			</div>
			<div class="form-group row">
				<label for='apellidos' class="col-sm-2 col-form-label">Apellidos</label>
			 	<div class="col-sm-8">
					<input type = 'text' name = 'apellidos' id = 'apellidos' class="form-control" placeholder = 'SoloLetrasEspacios' size = '50' value = '<?php echo $this->tupla['apellidos']; ?>' minlength="3" maxlength="30" required >
				</div>
			</div>
			<div class="form-group row">
				<label for='email' class="col-sm-2 col-form-label">Email</label>
			 	<div class="col-sm-8">
					<input type = 'email' name = 'email' id = 'email' class="form-control" placeholder="DebeSerEmailValido" value = '<?php echo $this->tupla['email']; ?>' minlength="6" maxlength="50" required>
				</div>
			</div>
			<div class="form-group row">
				<label for='dni' class="col-sm-2 col-form-label">DNI</label>
			 	<div class="col-sm-8">
					<input type = 'text' name = 'dni' id = 'dni' class="form-control" value = '<?php echo $this->tupla['DNI']; ?>' readonly>
				</div>
			</div><div class="form-group row">
				<label for='roles' class="col-sm-2 col-form-label">Roles</label>
			 	<div class="col-sm-8">
					 <select class="form-control"id="id_rol" name="id_rol" >
					  <?php
					 
					
					   foreach($this->listaRoles as $rol){
					  	if($this->tupla['id_rol']==$rol['id_rol']){
					  		echo "<option value=".$rol['id_rol']." selected>".$rol['rol']."</option>";
					  	}else{
					 	echo  "<option value='".$rol['id_rol']."' >".$rol['rol']."</option>";
					     } 

					   } ?>
					    </select>

					
				</div>
			</div>

				<button type='submit' name='action' class="btn btn-outline-info edit icon" value="EDIT"></button>
				<a href='../Controller/Index_Controller.php' class="icon volver ml-3"> </a>

		</form>
	
		</div>


		<?php
			include '../View/Footer.php';
		} //fin metodo render

	} //fin REGISTER

?>
