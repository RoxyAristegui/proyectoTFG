<?php 

/*
Añadir eliminar y mostrar roles
crear tambien asignar roles a usuarios?
tendria q coger todos los usuarios, con sus roles, serach usuarios $usuarioslogin $usuarios->rol;

*/

class Permisos_View{

	public $acciones;
	public $entidades;
	public $permisos;


	function __construct($acciones,$entidades,$permisos){
		$this->acciones = $acciones;	
		$this->entidades = $entidades;
		$this->permisos = $permisos;
		$this->render();
	}

	function render(){

		include '../View/Header.php'; //header necesita los strings
?>
<h1 class="Permisos">Permisos</h1>
<div class="row">
	<div class="col-md-12">
    	<div class="card shadow mb-4">

			<div class="container mt-4">
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
							
								$activado='no';
								foreach ($this->permisos as $permiso) {
									if($permiso['id_accion']==$this->acciones[$j]["id_accion"] && $permiso['id_entidad']==$this->entidades[$i]['id_entidad']){
										$activado='si';
									}
								}

								if($activado=='no'){
									echo	'<td><a class="icon circle red" href="PERMISOS_Controller.php?action=ADD&id_entidad='.$this->entidades[$i]['id_entidad'].'&id_accion='.$this->acciones[$j]['id_accion'].'"></a></td>';
									}else{ 
									echo	'<td><a class="icon circle green" href="PERMISOS_Controller.php?action=DELETE&id_entidad='.$this->entidades[$i]['id_entidad'].'&id_accion='.$this->acciones[$j]['id_accion'].'"></a></td>';
									}
									
							} ?>
						</tr>
						<?php
						}	
						?>
					</tbody>
				</table>
				<div class="row mb-4 mt-4">
					<div class="col-md-6 col-sm-6 col-xs-12">
						<a class="btn btn-outline-info btn-block EditarAcciones" href="../Controller/ACCIONES_Controller.php">Editar Acciones</a>
					</div>
						<div class="col-md-6 col-sm-6 col-xs-12">
						<a class="btn btn-outline-info btn-block EditarEntidades" href="../Controller/ENTIDADES_Controller.php">Editar Entidades</a>
					</div>

				</div>

			</div>
		</div>
	</div>
		


        	<?php
        	include "../View/Footer.php";
        }
    }


