
<?php 
class Acciones_View{
	var $listaAcciones;	

	function __construct($lista){
		$this->listaAcciones = $lista;	
		$this->render();
	}

	function render(){

		include '../View/Header.php'; //header necesita los strings
?>
		<h1 class="Acciones">Acciones</h1>



<div class="row">
			<div class="col-md-6 col-sm-12">
			    <div class="card shadow mb-4">
		            <div class="card-header py-3">
		              <h6 class="m-0 font-weight-bold text-info Anadiraccion"> 
							Añadir accion
					  </h6>
		            </div>
		            <div class="card-body">
		            	<form action="../Controller/ACCIONES_Controller.php?action=ADD" method="post">
		            		<div class="form-group">
		            		<input type="text" name="accion" class="form-control mb-2" placeholder="NombreAccion">
		            		<textarea name="descripcion" placeholder="Descripcion" class="form-control mb-3"></textarea>
                                <button type="submit" class="btn btn-info icon check" value="Crear"></button>
		            	</div>
		            	</form>

					</div>
				</div>	
			</div>

				<div class="col-md-6 col-sm-12 float-left">
			   <div class="card shadow mb-4">
			   		<div class="card-header py-3">
			   		   <h6 class="m-0 font-weight-bold text-info AccionesCreadas"> 
							Acciones creados
					  </h6>
					</div>
					<div class="card-body">
				
						<table class="table" >
						<?php 
						foreach($this->listaAcciones as $accion){
							echo "<tr>";
							echo "<td>".$accion['accion']."</td>";
							echo "<td>".$accion['descripcion']."</td>";
							
							echo "<td><button type='button' data-toggle='modal' data-target='#SolicitarConfModal' class='icon delete btn-default btn' data-elem='".$accion['accion']."' data-destino='../Controller/ACCIONES_Controller.php?action=DELETE&id=".$accion['id_accion']."' data-msj='SeguroEliminarAccion' data-title='".$accion['asignada']."'></button></td>";
							echo "<tr>";
						
						}	?>
						</table>
				
					</div>
			   	</div>

			</div>

			<?php 


			include 'Footer.php';

			include 'Solicitar_Confirmacion_Modal.php';
		}

	}
