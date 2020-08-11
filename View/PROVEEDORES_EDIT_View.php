<?php

	class PROVEEDORES_EDIT{
		var $tupla;

		function __construct($tupla){	
			$this->tupla = $tupla;
			$this->render();
		}

		function render(){

			include '../View/Header.php'; //header necesita los strings
		?>

			<div class="container">
		<h1 class="EditarProveedor">Editar datos de empresa</h1>

		<form name = 'Form' action='../Controller/PROVEEDORES_Controller.php' method='post'>
			<div class="form-group row">
				<label for='empresa' class="col-lg-2 col-form-label col-sm-2">empresa</label>
			 	<div class="col-lg-8 col-sm-10">
			 		 <input type = 'text' name = 'empresa' id = 'empresa' class="form-control" placeholder = 'nombreEmpresa' maxlength="100" value="<?php echo $this->tupla['empresa'];?>" required>
			 	</div>
			</div>
			<div class="form-group row">
				<label for='CIF' class="col-lg-2 col-form-label col-sm-2">CIF</label>
			 	<div class="col-lg-8 col-sm-10">

				 	<input type = 'text' name = 'CIF' id = 'CIF' class="form-control" placeholder = 'LetrasyNumeros' minlength="9" maxlength="9" value="<?php echo $this->tupla['CIF'];?>"  readonly>
				</div>
			</div>
			<div class="form-group row">
				<label for='direccion' class="col-lg-2 col-form-label col-sm-2">dirección</label>
			 	<div class="col-lg-8 col-sm-10">

					<input type = 'text' name = 'direccion' class="form-control" id = 'direccion' placeholder = 'LetrasyNumeros' maxlength="100" value="<?php echo $this->tupla['direccion'];?>"  required>

				</div>
			</div>
			<div class="form-group row">
				<div class="col-lg-6 clearfix p-0 pb-lg-0 pb-3">
					<label for='localidad' class="col-lg-2 col-form-label col-sm-2">localidad</label>
				 	<div class="col-lg-8 float-right col-sm-10">
						<input type = 'text' name = 'localidad' id = 'localidad' class="form-control" placeholder = 'SoloLetras' maxlength="30" value="<?php echo $this->tupla['localidad'];?>"  required>
					</div>
				</div>
				<div class="col-lg-4 row pr-0">
					<label for='CP' class="col-lg-2 col-form-label col-sm-2">CP</label>
				 	<div class="col-lg-10 p-lg-0 col-sm-10">

						<input type = 'text' name = 'CP' id = 'CP' class="form-control" placeholder = 'SoloNumeros' minlength="4" maxlength="6"  pattern="^[0-9]{5,5}" value="<?php echo $this->tupla['CP'];?>"  required>

					</div>
				</div>
			</div>
			<div class="form-group row">
				<div class="col-lg-6 clearfix p-0 pb-lg-0 pb-3">
					<label for='telefono' class="col-lg-2 col-form-label col-sm-2">Telefono</label>
				 	<div class="col-lg-8 float-right col-sm-10">

						<input type = 'text' name = 'telefono' id = 'telefono' class="form-control" placeholder="TelefonoFijoOPrincipal" minlength="9" maxlength="9"  pattern="^[0-9]{9,9}" value="<?php echo $this->tupla['telefono'];?>"  required>
					</div>
				</div>
			
				<div class="col-lg-4 row pr-0">
					<label for='mobil' class="col-lg-2 col-form-label col-sm-2">Movil</label>
				 	<div class="col-lg-10 p-lg-0 col-sm-10">

						<input type = 'text' name = 'movil' id = 'movil' class="form-control" placeholder="movil" maxlength="9" value="<?php echo $this->tupla['movil'];?>"  >
					</div>
				</div>
			</div>

			<div class="form-group row">
				<div class="col-lg-6 clearfix p-0 pb-lg-0 pb-3">
					<label for='contacto' class="col-lg-2 col-form-label col-sm-2">Contacto</label>
				 	<div class="col-lg-8 float-right col-sm-10">

						<input type = 'text' name = 'pers_contacto' id = 'pers_contacto' class="form-control" placeholder="PersonaDeContacto" minlength="5" maxlength="120" value="<?php echo $this->tupla['pers_contacto'];?>"  required>
					</div>
				</div>
				<div class="col-lg-4 row pr-lg-0 ">
					<label for='email' class="col-lg-2 col-form-label col-sm-2">Email</label>
				 	<div class="col-lg-10 p-lg-0 col-sm-10">
						<input type = 'email' name = 'email' id = 'email' class="form-control" placeholder="DebeSerEmailValido" maxlength="120" value="<?php echo $this->tupla['email'];?>"  required>
					</div>
				
				</div>
			</div>
				<button type='submit' name='action' class="btn btn-info check icon" value="EDIT" id="confirm"></button>
				<a href='../Controller/PROVEEDORES_Controller.php' class="icon volver ml-3"> </a>

		</form>
	
		</div>
		<?php
			include '../View/Footer.php';
		
		} //fin metodo render

	} //fin REGISTER

?>

	