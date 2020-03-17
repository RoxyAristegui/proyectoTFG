<?php 

/*
Añadir eliminar y mostrar roles
crear tambien asignar roles a usuarios?
tendria q coger todos los usuarios, con sus roles, serach usuarios $usuarioslogin $usuarios->rol;

*/

class Permisos_View{

	var $listaRoles;

	function __construct($acciones){
		$this->listaAcciones = $acciones;	
		$this->render();
	}

	function render(){

		include '../View/Header.php'; //header necesita los strings
?>
		<h1 class="MostrarTodos">Permisos</h1>
		<div class="row">
			<div class="col-md-6 col-sm-12">
			    <div class="card shadow mb-4">
		            <div class="card-header py-3">
		              <h6 class="m-0 font-weight-bold text-info"> 
							Añadir accion
					  </h6>
		            </div>
		            <div class="card-body">
		            	<form action="../Controller/Roles_Controller.php?action=ADD" method="post">
		            		<div class="form-group">
		            		<input type="text" name="rol" class="form-control mb-3" placeholder="nombre del rol">
		            		<textarea name="descripcion" placeholder="descripcion" class="form-control mb-3"></textarea>
		            		<input type="submit" class="btn btn-outline-info" value="Crear Rol">
		            	</div>
		            	</form>

					</div>
				</div>	
			</div>
		
			<div class="col-md-6 col-sm-12">
			    <div class="card shadow mb-4">
		            <div class="card-header py-3">
		              <h6 class="m-0 font-weight-bold text-info"> 
							Añadir entidad
					  </h6>
		            </div>
		            <div class="card-body">
		            	<form action="../Controller/Roles_Controller.php?action=ADD" method="post">
		            		<div class="form-group">
		            		<input type="text" name="rol" class="form-control mb-3" placeholder="nombre del rol">
		            		<textarea name="descripcion" placeholder="descripcion" class="form-control mb-3"></textarea>
		            		<input type="submit" class="btn btn-outline-info" value="Crear Rol">
		            	</div>
		            	</form>

					</div>
				</div>	
			</div>
		</div>


        	<?php
        	include "../View/Footer.php";
        }
    }


