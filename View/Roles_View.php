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
		            		<input type="text" name="rol" class="form-control mb-3" placeholder="RolName" required>
		            		<textarea name="descripcion" placeholder="Descripcion" class="form-control mb-3" ></textarea>
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

					
							?>
							<li class="list-group-item"><div class="row justify-content-center mb-1" >
								<div class='col-5 col-xl-3'> 
								 <span data-toggle='popover' data-content='<?php echo $rol['descripcion'] ?>' data-trigger='focus' data-placement="top"> 
								 	<?php echo $rol['rol'] ?>	
								 	<i class='fas fa-xs fa-info-circle'></i>
								 </span>
								 </div>
							<div class='col-auto'>
								<!--button type='button' data-toggle='modal' data-target='#eliminarRolModal' class='btn delete icon btn-default ' data-rol='<?php echo $rol['rol'] ?>' data-rolid='<?php echo $rol['id_rol'] ?>'></button-->
							<button type='button' data-toggle='modal' data-target='#SolicitarConfModal' class=' delete btn-default btn' data-elem='<?php echo $rol['rol'] ?>' data-destino='../Controller/ROLES_Controller.php?action=DELETE&id=<?php echo $rol['id_rol'] ?>'  data-msj='estasSeguroEliminarRol' data-title='<?php echo $rol['rol'] ?>'></button>		
							</div>
							<div class='col-auto'><a href='../Controller/PERMISOS_Rol_Controller.php?id_rol=<?php echo $rol['id_rol']?>' class='btn  edit'></a></diV>
								</div></li>
								<?php 

						}	?>
						</ul>
						</div>
						
					</div>
			   	</div>

			
	
		



        	<?php
        	include "Footer.php";
			include 'Solicitar_Confirmacion_Modal.php';
        	?>

        	<script type="text/javascript">



			$("span").click(function(){
				$(this).popover("toggle")
				trigger:focus;
			})

			$("span").hover(function(){
				$(this).popover("toggle")
				trigger:focus;
			})
		</script>
<?php
        }
    }
    ?>



