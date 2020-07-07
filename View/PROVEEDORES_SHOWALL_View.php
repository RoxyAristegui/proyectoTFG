<?php

	class PROVEEDORES_SHOWALL{

		var $lista;
		var $datos;
		function __construct($lista,$datos){
			$this->datos = $datos;
			$this->lista = $lista;	
			$this->render();
		}

		function render(){

			include '../View/Header.php'; //header necesita los strings

?>
	<h1 class="Proveedores">Proveedores</h1>
	   <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-info"> 
              	<div class="clearfix">
              		<div class="float-left">
					  <a href='../Controller/PROVEEDORES_Controller.php?action=ADD' class='Añadir mas icon'> Añadir</a>
					</div>
					<div class="float-right">
						<a href="../Controller/PROVEEDORES_Controller.php?action=SEARCH" class="BusquedaAvanzada lupa icon"> Búsqueda avanzada</a>
					</div>
				</div>
			  </h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
					<tr><th>Ver</th>
						<th>Borrar</th>
					<?php   foreach ($this->lista as $titulo) { ?> 
						<th><?php echo $titulo; ?></th>
					<?php 	} ?>
					</tr> 
				  </thead>
			      <tfoot>

					<tr><th>Ver</th>
						<th>Borrar</th>
					<?php   foreach ($this->lista as $titulo) { ?> 
						<th><?php echo $titulo; ?></th>
					<?php 	} ?>
						
					</tr>
				  </tfoot>
				  <tbody>
				  <?php if(sizeof($this->datos)>0){	
				  foreach($this->datos as $fila)	{ }?><tr>
				  	<td>
						<a href='../Controller/PROVEEDORES_Controller.php?action=SHOWCURRENT&CIF=
								<?php echo $fila['CIF']; ?>'> <i class="fas fa-edit"></i> </a>
						</td>
						<td>
						<a href='../Controller/PROVEEDORES_Controller.php?action=DELETE&CIF=
								<?php echo $fila['CIF']; ?>'> <i class="fas fa-edit"></i> </a>
						</td>
				    <?php	
				    foreach ($this->lista as $columna) {	?>
							<td><?php
							
								 	echo $fila[$columna]; 
								 	?> 
								 	</td>
							<?php } ?>
						
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

