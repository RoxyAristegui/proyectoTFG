<?php 

/*
Añadir eliminar y mostrar roles
crear tambien asignar roles a usuarios?
tendria q coger todos los usuarios, con sus roles, serach usuarios $usuarioslogin $usuarios->rol;

*/

class Roles_User_View{

	var $listaRoles;

	function __construct($lista,$usuarios){
		$this->listaRoles = $lista;	
		$this->usuarios=$usuarios;
		$this->render();
	}

	function render(){

		include '../View/Header.php'; //header necesita los strings
?>
		<!--h1 class="GestionRoles">Gestión de Roles</h1-->
		
		

		
				<div class="col-12">
			   <div class="card shadow mb-4">
			   		<div class="card-header py-3">
			   		   <h6 class="m-0 font-weight-bold text-info cambiarRolUsuario"> 
							Cambiar rol de usuario
					  </h6>
					</div>
					<div class="card-body">
						<p class="RolesAsignadosAUsuariosTexto"> Para cambiar el rol, selecciona el rol que quieras asignarle y pulsa en confirmar. </p>
						<div class="col-md-8 offset-md-2 col-sm-12">
							<div class="table-responsive">
	              				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
									<thead>
										<th class="usuario"> Usuario</th>
										<th class="rol"> Rol </th>
										<th>ok</th>
									</thead>
									<tfoot>
										<th class="usuario"> Usuario </th>
										<th class="rol"> Rol </th>
										<th>ok</th>
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

			

		

        	<?php
        	include "../View/Footer.php";
        	?>
        	<script type="text/javascript">

			function cambiarRolUsuario(login){
				var sel= document.getElementById('Rol-'+login);
				var id_rol=sel.value;
				console.log(id_rol);
				location.href="ROLES_Controller.php?action=EDIT&id_rol="+id_rol+"&login="+login;

			}
		</script>


<?php
        }
    }
    ?>



