<?php 

/*
Añadir eliminar y mostrar roles
crear tambien asignar roles a usuarios?
tendria q coger todos los usuarios, con sus roles, serach usuarios $usuarioslogin $usuarios->rol;

*/

class Roles_View{

	var $listaRoles;

	function __construct($lista){
		$this->listaRoles = $lista;	
		$this->render();
	}

	function render(){

		include '../View/Header.php'; //header necesita los strings
?>
		<h1 class="GestionRoles">Gestión de Roles</h1>
		
		

			<div class="col-md-6 col-sm-12 float-left">
			    <div class="card shadow mb-4">
		            <div class="card-header py-3">
		              <h6 class="m-0 font-weight-bold text-info AddRol"> 
						Añadir rol
					  </h6>
		            </div>
		            <div class="card-body">
		            	<form action="../Controller/ROLES_Controller.php?action=ADD" method="post">
		            		<div class="form-group">
		            		<input type="text" name="rol" class="form-control mb-3" placeholder="RolName">
		            		<textarea name="descripcion" placeholder="Descripcion" class="form-control mb-3"></textarea>
		            		<input type="submit" class="btn btn-outline-info Crear" value="Crear">
		            	</div>
		            	</form>

					</div>
				</div>	
			</div>
		

			<div class="col-md-6 col-sm-12 float-left">
			   <div class="card shadow mb-4">
			   		<div class="card-header py-3">
			   		   <h6 class="m-0 font-weight-bold text-info RolesCreados"> 
							Roles creados
					  </h6>
					</div>
					<div class="card-body">
						<ul class="list-group list-group-flush">
						<?php 
						foreach($this->listaRoles as $rol){
							
						echo '<li class="list-group-item"><div class="row justify-content-center mb-1" >';
							echo "<div class='col-6 col-lg-5'>".$rol['rol']."</div>";
							echo "<div class='col-auto'><a type='button' data-toggle='modal' data-target='#eliminarRolModal' class='icon delete ' data-rol='".$rol['rol']."' data-rolid='".$rol['id_rol']."'></a></div>";
							echo "<div class='col-auto'><a href='../Controller/PERMISOS_Rol_Controller.php?id_rol=".$rol['id_rol']."' class='icon gray edit'></a></diV>";
								echo "</div></li>";
						}	?>
						</ul>
						</div>
						
					</div>
			   	</div>

			
	
		

<div class="modal fade" id="eliminarRolModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title eliminarRol" >Eliminar Rol</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <span class="estasSeguroEliminarRol"> Estás seguro de que quieres elimianr el rol</span> <span id='rolAeliminar'></span> ?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button id='confirmEliminar' value='' type="button" class="btn btn-primary">Eliminar</button>
      </div>
    </div>
  </div>
</div>


	

        	<?php
        	include "../View/Footer.php";
        	?>

        	<script type="text/javascript">

        		//guardar la cariable con la id del rol para eliminarlo en el modal
	$('#eliminarRolModal').on('show.bs.modal', function (event) {
	    var button = $(event.relatedTarget) // Button that triggered the modal
	    var id = button.data('rolid') // Extract info from data-* attributes
	    var rol= button.data('rol')
		var modal = $(this)
  		modal.find("#confirmEliminar").val(id)
  		modal.find("#rolAeliminar").text(rol)
  		
	})


	$("#confirmEliminar").click(function(){

 		var id=$(this).val();
		window.location.replace("../Controller/ROLES_Controller.php?action=DELETE&id="+id);

	})
		</script>
<?php
        }
    }
    ?>



