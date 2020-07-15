<?php

	class OBRAS_ADD{
		var $listaProveedores;
		var $listaAreas;

		function __construct($listaProveedo,$listaAreas){	
			$this->listaProveedores=$listaProveedores;
			$this->listaAreas=$listaAreas;
			$this->render();
		}

		function render(){

			include '../View/Header.php'; //header necesita los strings
		?>

			<div class="container">
		<h1 class="AñadirObra">Añadir obra</h1>	
		<form name = 'Form' action='../Controller/OBRAS_Controller.php' method='post' onsubmit="confirmar()">
			<div class="form-group row">
				<label for='codigo_obra' class="col-sm-2 col-form-label">codigo_obra</label>
			 	<div class="col-sm-8">
			 		 <input type = 'number' name = 'codigo_obra' id = 'codigo_obra' class="form-control" placeholder = 'intoduceElCodigoDeLaObra'  maxlength="11" required>
			 	</div>
			</div>
			<div class="form-group row">
				<label for='nombre' class="col-sm-2 col-form-label">Nombre</label>
			 	<div class="col-sm-8">
					<input type='text' name='nombre' class="form-control" id='nombre' placeholder='' required>
				</div>
			</div>
			<div class="form-group row">
				<label for='fecha_creacion' class="col-sm-2 col-form-label">fecha_creacion</label>
			 	<div class="col-sm-8">
					<input type='date' name='fecha_creacion' id ='fecha_creacion' class="form-control" placeholder=''  required>
				</div>
			</div>
			<div class="form-group row">
				<label for='Situacion' class="col-sm-2 col-form-label">Situacion</label>
			 	<div class="col-sm-8">
					<input type='number' name = 'Situacion' id ='Situacion' class="form-control" placeholder="" maxlength="2">
				</div>
			</div>
			<div class="form-group row">
				<label for='solicitante' class="col-sm-2 col-form-label">solicitante</label>
			 	<div class="col-sm-8">
					<input type='text' name ='solicitante' id ='solicitante' class="form-control" placeholder="" maxlength="120" >
				</div>
			</div>
				<div class="form-group row">
				<label for='coste' class="col-sm-2 col-form-label">coste</label>
			 	<div class="col-sm-8">
					<input type='number' name='coste' id='coste' class="form-control" placeholder="" maxlength="11" >
				</div>
			</div>
			<div class="form-group row">
				<label for='Proveedor' class="col-sm-2 col-form-label">Proveedor</label>
			<div class="col-sm-8">
					<select class="form-control" id="CIF" name="CIF" >
					  <?php					 					
					   foreach($this->listaProveedores as $prov){
					 		echo  "<option value='".$prov['CIF']."' >".$prov['empresa']."</option>";
					   	} ?>
					</select>
				</div>
			</div>
			<div class="col-sm-8">
					<select class="form-control" id="CIF" name="CIF" >
					  <?php					 					
					   foreach($this->listaProveedores as $prov){
					 		echo  "<option value='".$prov['CIF']."' >".$prov['empresa']."</option>";
					   	} ?>
					</select>
				</div>
			</div>
				<div class="col-sm-8">
					<select class="form-control" id="CIF" name="CIF" >
					  <?php					 					
					   foreach($this->listaProveedores as $prov){
					 		echo  "<option value='".$prov['CIF']."' >".$prov['empresa']."</option>";
					   	} ?>
					</select>
				</div>	<div class="col-sm-8">
					<select class="form-control" id="CIF" name="CIF" >
					  <?php					 					
					   foreach($this->listaAreas as $area){
					 		echo  "<option value='".$area['codigo_area']."' >".$area['nombre']."</option>";
					   	} ?>
					</select>
				</div>
			</div>
				<button type='submit' name='action' class="btn btn-outline-info addUser icon" value="ADD" id="confirm"></button>
				<a href='../Controller/OBRAS_Controller.php' class="icon volver ml-3"> </a>

		</form>
	
		</div>
		<?php
			include '../View/Footer.php';
		
		} //fin metodo render

	} //fin REGISTER

?>

