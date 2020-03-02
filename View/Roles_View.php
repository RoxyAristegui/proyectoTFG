<?php 
class RolesView{

	var $listaRoles;

	function __construct($lista){
		$this->listaRoles = $lista;	
		$this->render();
	}

	function render(){

		include '../View/Header.php'; //header necesita los strings
?>
		<h1 class="MostrarTodos">Roles</h1>
		<div class="row">
			<div class="col-md-6 col-sm-12">
			    <div class="card shadow mb-4">
		            <div class="card-header py-3">
		              <h6 class="m-0 font-weight-bold text-info"> 
						Añadir rol
					  </h6>
		            </div>
		            <div class="card-body">
		            	<form action="../Controller/Permisos_Controller.php?action=SHOW_ADD_ROL" class="form-group" method="post">
		            		<input type="text" name="rol" class="form-control" placeholder="nombre del rol">
		            		<input type="submit" class="btn btn-outline-info" value="NuevoRol">
		            	</form>

					</div>
				</div>	
			</div>
			<div class="col-md-6 col-sm-12">
				   <div class="card shadow mb-4">
				   		<div class="card-header py-3">
				   		   <h6 class="m-0 font-weight-bold text-info"> 
								Todos los roles
						  </h6>
						</div>
						<div class="card-body">
							<li>
								<?php 
								foreach($this->listaRoles as $rol){
									echo "<ul>".$rol['rol']."</ul>";
								}
								?>
								
							</li>
						</div>
				   	</div>

			</div>
		</div>


        	<?php
        	include "../View/Footer.php";
        }
    }


