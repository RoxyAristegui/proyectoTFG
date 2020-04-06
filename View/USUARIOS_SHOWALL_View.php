<?php

	class USUARIOS_SHOWALL{


		function __construct($lista,$datos){
			$this->datos = $datos;
			$this->lista = $lista;	
			$this->render();
		}

		function render(){

			include '../View/Header.php'; //header necesita los strings
?>
	<h1 class="MostrarTodos">Todos los usuarios</h1>
	   <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-info"> 
              	<div class="clearfix">
              		<div class="float-left">
					  <a href='../Controller/USUARIOS_Controller.php?action=ADD' class='Añadir ADDUser icon'> Añadir</a>
					</div>
					<div class="float-right">
						<a href="../Controller/USUARIOS_Controller.php?action=SEARCH" class="BusquedaAvanzada lupa icon"> Búsqueda avanzada</a>
					</div>
				</div>
			  </h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
					<tr>
					<?php   foreach ($this->lista as $titulo) { ?> 
						<th><?php echo $titulo; ?></th>
					<?php 	} ?>
						<th>Editar</th>
						<th>Borrar</th>
					</tr>
				  </thead>
			      <tfoot>
					<tr>
					<?php   foreach ($this->lista as $titulo) { ?> 
						<th><?php echo $titulo; ?></th>
					<?php 	} ?>
						<th>Editar</th>
						<th>Borrar</th>
					</tr>
				  </tfoot>
				  <tbody>
				  <?php	foreach($this->datos as $fila)	{ ?>
					<tr>
				    <?php	foreach ($this->lista as $columna) {	?>
							<td><?php echo $fila[$columna]; ?></td>
							<?php	} ?>
						<td>
						<a href='
							../Controller/USUARIOS_Controller.php?action=EDIT&login=
								<?php echo $fila['login']; ?>'> <i class="fas fa-edit"></i> </a>
						</td>
						<td>
							<a href='
								../Controller/USUARIOS_Controller.php?action=DELETE&login=
									<?php echo $fila['login']; ?>' class="icon delete"> </a>
						</td>
					</tr>

			<?php	} ?> 
		
				</tbody>

			</table>		
		</div>
	</div>
	
		
</div>

					
<?php
			include '../View/Footer.php';
		} //fin metodo render

	} //fin REGISTER

?>

