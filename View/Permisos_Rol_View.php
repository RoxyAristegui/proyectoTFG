<?php 

/*
Añadir eliminar y mostrar roles
crear tambien asignar roles a usuarios?
tendria q coger todos los usuarios, con sus roles, serach usuarios $usuarioslogin $usuarios->rol;

*/

class Permisos_Rol_View{


	private $acciones;
	private $entidades;
	private $permisos;
	private $roles;
	private $permisosRoles;


	function __construct($acciones,$entidades,$permisos,$roles,$permisosRoles){
		$this->acciones = $acciones;	
		$this->entidades = $entidades;
		$this->permisos = $permisos;
		$this->roles=$roles;
		$this->permisosRoles=$permisosRoles;
		$this->render();
	}

	function render(){

		include '../View/Header.php'; //header necesita los strings
?>
<h1 class="">Permisos</h1>
<div class="row">
	<div class="col-md-12">
    	<div class="card shadow mb-4">
			<div class="row justify-content-around mt-4 mb-4">
    		<div class="col-md-3">
    			
    				<div class="alert alert-light">
    						Selecciona un Rol de la lista para definir sus permisos
    				</div>
    				<div class="container">
    			<ul class="list-group list-group-flush">
    				<?php foreach($this->roles as $rol){
    				
    					echo "<li class='list-group-item list-group-item-action' id='".$rol['id_rol']."'><a href='../Controller/PERMISOS_Rol_Controller.php?id_rol=".$rol['id_rol']."'>".$rol['rol']."</a></li>";
					}
    				?> 
    				</ul>
    			
    		</div>
    	</div>
			<div class="col-md-8">
<?php
			if(isset($_REQUEST['id_rol'])){ ?>

				<table class='table table-bordered'>
					<thead>
						<td></td>
						<?php 
						foreach($this->acciones as $accion){
							echo "<td>".$accion['accion']."</td>";
						} ?>
					</thead>

					<tbody>
						<?php	
						for($i=0;$i<sizeof($this->entidades);$i++){
							?>
						<tr>
							<td> <?php echo $this->entidades[$i]['entidad'] ?> </td>
							
							<?php 
							for($j=0;$j<sizeof($this->acciones);$j++){
							
								$definido='no';
								foreach ($this->permisos as $permiso) {
									if($permiso['id_accion']==$this->acciones[$j]["id_accion"] && $permiso['id_entidad']==$this->entidades[$i]['id_entidad']){
										$definido='si';
									}
								}

								if($definido=='si'){
									//permiso definido, comprobar si el rol tiene permiso
									$activado="no";

										foreach($this->permisosRoles as $permiso){
											if($permiso['id_accion']==$this->acciones[$j]["id_accion"] && $permiso['id_entidad']==$this->entidades[$i]['id_entidad']){
												$activado="si";
											}
										}
											if($activado=="si"){
												//al click enviar id rol, accion, entidad, add
											 ?>
													<td><a class='icon circle green' onclick='cambiarRolUsuario(<?php echo $this->acciones[$j]['id_accion'] ?>,<?php echo $this->entidades[$i]['id_entidad'] ?> ,"DELETE")'></a></td>
													<?php
											}else{ ?>
													<td><a class='icon circle red' onclick='cambiarRolUsuario(<?php echo $this->acciones[$j]['id_accion'] ?>,<?php echo $this->entidades[$i]['id_entidad'] ?> ,"ADD")'></a></td>
													<?php
											}
										
									
									}else{ 
										//este permiso no está definido
									echo	"<td><span class='icon circle gray'></span></td>";
									}
									
							} ?>
						</tr>
						<?php
						}	
						?>
					</tbody>
				</table>

				<?php } ?>
				<div class="row mb-4 mt-4">
					<div class="col-md-6 col-sm-6 col-xs-12">
						<a class="btn btn-outline-info btn-block EditarRoles" href="../Controller/ROLES_Controller.php">Editar Roles</a>
					</div>
						<div class="col-md-6 col-sm-6 col-xs-12">
						<a class="btn btn-outline-info btn-block DefinirPermisos" href="../Controller/PERMISOS_Controller.php">Definir Permisos</a>
					</div>

				</div>

			</div>
		</div>
	</div>
		
</div>


        	<?php
        	include "../View/Footer.php";
?>

<script type="text/javascript">
var rol;

	$(document).ready(function(){
	
		 rol= getUrlVars()['id_rol'];
		$("li#"+rol).addClass("list-group-item-info");
			
	});

	function cambiarRolUsuario(id_accion,id_entidad,action){
		location.href="../Controller/PERMISOS_Rol_Controller.php?action="+action+"&id_rol="+rol+"&id_entidad="+id_entidad+"&id_accion="+id_accion;

	}
</script>

<?php

        }
    }


