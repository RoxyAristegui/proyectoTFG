<?php

	class USUARIOS_SHOWALL{

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
	<h1 class="MostrarTodos">Todos los usuarios</h1>
	   <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-info"> 
              	<div class="clearfix">
              		<div class="float-left">
					  <a href='../Controller/USUARIOS_Controller.php?action=ADD' class='Anhadir ADDUser icon'> Añadir</a>
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
						<th>Ver</th>
						<th>Borrar</th>
					</tr> 
				  </thead>
			      <tfoot>
					<tr>
					<?php   foreach ($this->lista as $titulo) { ?> 
						<th><?php echo $titulo; ?></th>
					<?php 	} ?>
						<th>Ver</th>
						<th>Borrar</th>
					</tr>
				  </tfoot>
				  <tbody>
				  <?php	foreach($this->datos as $fila)	{ ?>
					<tr><a href="aqui">
				    <?php	foreach ($this->lista as $columna) {	?>
							<td><?php
								if($columna=="rol"){
									$rol= new Rol("",$fila['id_rol']);
									$rolname=$rol->getById();
									echo $rolname['rol'];
								}else{
								 	echo $fila[$columna]; } ?></td>
								
							<?php	} ?>
						<td>
						<a href='
							../Controller/USUARIOS_Controller.php?action=SHOWCURRENT&login=
								<?php echo $fila['login']; ?>'> <i class="fas fa-eye"></i> </a>
						</td>
						<td>
							<a href='
								../Controller/USUARIOS_Controller.php?action=DELETE&login=
									<?php echo $fila['login']; ?>' class="icon delete"> </a>
						</td>
					</a>
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

	}

?>

