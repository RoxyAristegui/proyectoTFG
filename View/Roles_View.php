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
							Todos los roles
					  </h6>
					</div>
					<div class="card-body">
				
						<table class="table">
						<?php 
						foreach($this->listaRoles as $rol){
							echo "<tr>";
							echo "<td>".$rol['rol']."</td>";
							echo "<td><a href='../Controller/Roles_Controller.php?action=DELETE&id=".$rol['id_rol']."' class='icon delete'></a></td>";
							echo "<tr>";
						
						}	?>
						</table>
				
					</div>
			   	</div>

			</div>
	
			<div class="col-md-6 col-sm-12">
			   <div class="card shadow mb-4">
			   		<div class="card-header py-3">
			   		   <h6 class="m-0 font-weight-bold text-info"> 
							Roles asignados
					  </h6>
					</div>
					<div class="card-body">

						<table class="table">

						<?php 
						var_dump($this->usuarios);
						foreach($this->usuarios as $user){
							?>
							<div class="row">
							<div class="col-md-5 text-right" id="<?php echo $user['login'] ?>"> <?php echo $user['login'] ?></div>
							<div class="col-md-5">
								 <select class="form-control" id="asignarRolUsuario" onchange="cambiarRolUsuario('<?php echo $user['login'] ?>')">
								  <?php
								  var_dump($user);
								   foreach($this->listaRoles as $rol){
								  	if($user['id_rol']==$rol['id_rol']){
								  		echo "<opction value=".$rol['id_rol']." selected>".$rol['rol']."</option>";
								  	}else{
								 	echo  "<option value='".$rol['id_rol']."' >".$rol['rol']."</option>";
								     } 

								   } ?>
								    </select>


							</div>
							</div> 
								<?php
						}	?>
						</table>
					</div>
				</div>
			</div>

					
		</div>
		<script type="text/javascript">

			function cambiarRolUsuario(login){
				var sel= document.getElementById('asignarRolUsuario');
				var id_rol=sel.value;
				console.log(id_rol);
				console.log(login);
				location.href="Roles_Controller.php?action=changeRol&id_rol="+id_rol+"&login="+login;

			}
		</script>

        	<?php
        	include "../View/Footer.php";
        }
    }


