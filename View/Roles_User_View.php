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

		include '../View/Header.php';
		?>
			<!--h1 class="GestionRoles">Gestión de Roles</h1-->
		
		

		
				<div class="col-12">
			   <div class="card shadow mb-4">
			   		<div class="card-header py-3">
			   		   <h6 class="m-0 font-weight-bold text-info AsignarUsuariosARol"> 
						Asignar usuarios a Rol
					  </h6>
					</div>
					<div class="card-body">
					
						<div class="row">
						<div class="col-md-6 col-sm-12">
							<div class="table-responsive">
	              				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
									<thead>
										<th></th>
										<th class="usuario"> Usuario</th>
										<th class="rol"> Rol </th>
										
									</thead>
								
									<tbody>
								<?php 
								foreach($this->usuarios as $user){
									?>
									
									<tr> 
										<td>
										 <div class="form-check">
									        <input class="form-check-input" type="checkbox" id="<?php echo $user['login'] ?>">									   
										      </div>										
										</td>
										<td> <?php echo $user['login'] ?></td>
										<td>
											 <?php
											
											   foreach($this->listaRoles as $rol){
											  	if($user['id_rol']==$rol['id_rol']){
											  		echo $rol['rol'];
											  	}
											   } ?>
											
										</td>
										

									</tr> 
										<?php
								}	?>
							</tbody>
						</table>
					</div>
				</div>
				<div class="col-md-6 col-sm-12">
						
				<div class="row container">
							<p>
						<span class="RolesAsignadosAUsuariosTexto"> Selecciona los usuarios a los que desea cambiar, el rol deseado, y pulse </span><span class="icon check"></span>
					</p>
						<div class="col-md-6">
					 <select class="form-control" id="NuevoRol">
						  <?php
							
						   foreach($this->listaRoles as $rol){
						 	echo  "<option value='".$rol['id_rol']."'>".$rol['rol']."</option>";
						     

						   } ?>
						    </select>	
						</div>
						<div class="col-md-6">
						    <button type="button" onclick="cambiarRolUsuario()" class="btn icon btn-info check"></button>
						</div>				    
				</div></div>
				</div>
			</div>


        	<?php
        	include "../View/Footer.php";
        	?>
        	<script type="text/javascript">

			function cambiarRolUsuario(login){
							
				var loginlist=[];
				$("input[type=checkbox]:checked").each(function(){

						loginlist.push($(this).attr("id"));
				}
					)
				json=JSON.stringify(loginlist);
				var nuevoRol=$("#NuevoRol").val();
				location.href="ROLES_Controller.php?action=EDIT&loginlist="+json+"&Rol="+nuevoRol;
			}

			</script>



<?php
        }
    }
    ?>



