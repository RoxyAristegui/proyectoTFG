<?php 

/*
Añadir eliminar y mostrar roles
crear tambien asignar roles a usuarios?
tendria q coger todos los usuarios, con sus roles, serach usuarios $usuarioslogin $usuarios->rol;

*/

class Roles_View{

	var $listaRoles;

	function __construct($lista,$usuarios){
		$this->listaRoles = $lista;	
		$this->usuarios=$usuarios;
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
		
				<div class="col-md-6 col-sm-12 float-right">
			   <div class="card shadow mb-4">
			   		<div class="card-header py-3">
			   		   <h6 class="m-0 font-weight-bold text-info RolesAsignadosAUsuarios"> 
							Roles asignados a usuarios
					  </h6>
					</div>
					<div class="card-body">
						<p class="RolesAsignadosAUsuariosTexto"> Para cambiar el rol, selecciona el rol que quieras asignarle y pulsa en confirmar. </p>
						<div class="col-md-8 offset-md-2 col-sm-12">
							
						<table class="table table-bordered">
							<thead>
								<th class="usuario"> Usuario</th>
								<th class="rol"> Rol </th>
							</thead>
							<tfoot>
								<th class="usuario"> Usuario </th>
								<th class="rol"> Rol </th>
							</tfoot>
							<tbody>
						<?php 
						foreach($this->usuarios as $user){
							?>
							
							<tr> 
							<td id="<?php echo $user['login'] ?>"> <?php echo $user['login'] ?></td>
							<td>
								 <select class="form-control" id="Rol-<?php echo $user['login'] ?>" >
								  <?php
								
								   foreach($this->listaRoles as $rol){
								  	if($user['id_rol']==$rol['id_rol']){
								  		echo "<option value=".$rol['id_rol']." selected>".$rol['rol']."</option>";
								  	}else{
								 	echo  "<option value='".$rol['id_rol']."' >".$rol['rol']."</option>";
								     } 

								   } ?>
								    </select>

							</td>
							<td>
								<button type="button" onclick="cambiarRolUsuario('<?php echo $user['login'] ?>')" class="btn check"></button>
							</td>

							</tr> 
								<?php
						}	?>
					</tbody>
						</table>
					</div>
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
							echo "<div class='col-5 col-md-3'>".$rol['rol']."</div>";
							echo "<div class='col-auto'><button type='button' data-toggle='modal' data-target='#eliminarRolModal' class='btn delete btn-default ' data-rol='".$rol['rol']."' data-rolid='".$rol['id_rol']."'></button></div>";
							echo "<div class='col-auto'><a href='../Controller/PERMISOS_Rol_Controller.php?id_rol=".$rol['id_rol']."' class='btn  edit'></a></diV>";
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


		<script type="text/javascript">

			function cambiarRolUsuario(login){
				var sel= document.getElementById('Rol-'+login);
				var id_rol=sel.value;
				console.log(id_rol);
				location.href="ROLES_Controller.php?action=EDIT&id_rol="+id_rol+"&login="+login;

			}
		</script>

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



