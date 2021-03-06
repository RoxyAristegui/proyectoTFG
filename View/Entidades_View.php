
<?php 
class Acciones_View{
	var $listaEntidades;

	function __construct($lista){
		$this->listaEntidades = $lista;	
		$this->render();
	}

	function render(){

		include '../View/Header.php'; //header necesita los strings
?>
		<h1 class="Entidades">Entidades</h1>



<div class="row">
			<div class="col-md-6 col-sm-12">
			    <div class="card shadow mb-4">
		            <div class="card-header py-3">
		              <h6 class="m-0 font-weight-bold text-info AnadirEntidad"> 
							Añadir entidad
					  </h6>
		            </div>
		            <div class="card-body">
		            	<form action="../Controller/ENTIDADES_Controller.php?action=ADD" method="post">
		            		<div class="form-group">
		            		<input type="text" name="entidad" class="form-control mb-2" placeholder="NombreEntidad">
		            		<textarea name="descripcion" placeholder="descripcion" class="form-control mb-3"></textarea>
                                <button type="submit" class="btn btn-info icon check" value="Crear"></button>
		            	</div>
		            	</form>

					</div>
				</div>	
			</div>

				<div class="col-md-6 col-sm-12 float-left">
			   <div class="card shadow mb-4">
			   		<div class="card-header py-3">
			   		   <h6 class="m-0 font-weight-bold text-info EntidadesCreadas"> 
							Entidades creadas
					  </h6>
					</div>
					<div class="card-body">
				
						<table class="table" >
						<?php 
						foreach($this->listaEntidades as $entidad){
							echo "<tr>";
							echo "<td>".$entidad['entidad']."</td>";
							echo "<td>".$entidad['descripcion']."</td>";
							$msjConfModal="SeguroEliminarEntidad";

							echo "<td><button type='button' data-toggle='modal' data-target='#SolicitarConfModal' class='icon delete btn-default btn' data-elem='".$entidad['entidad']."' data-destino='../Controller/ENTIDADES_Controller.php?action=DELETE&id=".$entidad['id_entidad']."'  data-msj='SeguroEliminarEntidad' data-title='".$entidad['asignada']."'></button></td>";
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
