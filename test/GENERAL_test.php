<?php
session_start();

include_once '../View/Header.php';

/* Creamos la base de datos de pruebas */

include "../Model/config.php";
include "../Functions/CrearBD.php";
$filename='../tfgRoxy_test.sql';

$bd=new CrearBD(host,user,pass,$filename);
$bd->leerSQL();

$_SESSION['test']='1';

// crearlos arrays de los test
$ERRORS_array_test = array();
$Validacion_errors_array_test= array();
$BD_errors_array_test=array();
$Acciones_array_test=array();
$entidades_array_test=array();
$Roles_array_test=Array();
// incluimos aqui tantos ficheros de test como entidades
// 'TESTS GENERALES ----- 
include 'Global_test.php';
//echo 'TEST UNITARIOS ------ 
include 'USUARIOS_test.php';
include 'Roles_test.php';
include 'Entidades_test.php';
include 'Acciones_test.php';

// TEST VALIDACIONES----------
include 'Validar_test.php';
include 'Validar_usuario_test.php';

?>

<div class="content">
	<h1>Test Generales </h1>
</div>
	<div>
	<table class="table table-striped">
		<thead class="thead-dark">
		<tr>
			<th scope="col">    Entidad 		</th>
			<th scope="col">	Método			</th>
			<th scope="col">	Error testeado	</th>
			<th scope="col">	Error Esperado	</th>
			<th scope="col">	Error Obtenido	</th>
			<th scope="col">	Resultado		</th>
		</tr>
	</thead>
	<tbody>
	<?php
		foreach ($BD_errors_array_test as $test)
		{  ?>
		<tr>
			<td>	<?php echo $test['entidad'];?>		</td>
			<td>	<?php echo $test['metodo']; ?>		</td>
			<td>	<?php echo $test['error']; ?>		</td>
			<td>	<?php var_dump($test['error_esperado']); ?>		</td>
			<td>	<?php var_dump($test['error_obtenido']); ?>		</td>
			<td>	<?php echo $test['resultado']; ?>	</td>
		</tr>
	<?php	
		}
	?></tbody>
	</table>
</div>
<hr>

<div class="testCollapse" data-toggle="collapse" data-target="#testUnitarios">
	<h2 class="btn btn-outline-info btn-lg"> Desplegar Test de Usuarios <i class="fas fa-sort-down"></i></h2>
</div>
<div class="collapse show" id="testUnitarios">
	<h3> hay <?php echo count($ERRORS_array_test); ?> test</h3>
	<table class="table table-striped">
		<thead class="thead-dark">
		<tr>
			<th scope="col">    Entidad 		</th>
			<th scope="col">	Método			</th>
			<th scope="col">	Error testeado	</th>
			<th scope="col">	Error Esperado	</th>
			<th scope="col">	Error Obtenido	</th>
			<th scope="col">	Resultado		</th>
		</tr>
	</thead>
	<tbody>
	<?php
		foreach ($ERRORS_array_test as $test)
		{  ?>
		<tr >
			<td >	<?php echo $test['entidad'];?>		</td>
			<td>	<?php echo $test['metodo']; ?>		</td>
			<td>	<?php echo $test['error']; ?>		</td>
			<td>	<?php var_dump($test['error_esperado']); ?>		</td>
			<td>	<?php var_dump($test['error_obtenido']); ?>		</td>
			<td>	<?php echo $test['resultado']; ?>	</td>
		</tr>
	<?php	
		}
	?></tbody>
	</table>
</div>
<hr>
<div class="testCollapse" data-toggle="collapse" data-target="#testValidar">
	<h2 class="btn btn-outline-info btn-lg">Desplegar test de Validaciones <i class="fas fa-sort-down"></i> </h2>
</div>
<div class="collapse" id="testValidar">
	<h4> Mostrando <?php echo count($Validacion_errors_array_test); ?> test de validaciones </h4>
	<table class="table table-striped">
		<thead class="thead-dark">
		<tr>
			<th scope="col">    Entidad 		</th>
			<th scope="col">	Método			</th>
			<th scope="col">	Error testeado	</th>
			<th scope="col">	Error Esperado	</th>
			<th scope="col">	Error Obtenido	</th>
			<th scope="col">	Resultado		</th>
		</tr>
	</thead>
	<tbody>
	<?php
		foreach ($Validacion_errors_array_test as $test)
		{  ?>
		<tr>
			<td>	<?php echo $test['entidad'];?>		</td>
			<td>	<?php echo $test['metodo']; ?>		</td>
			<td>	<?php echo $test['error']; ?>		</td>
			<td>	<?php var_dump($test['error_esperado']); ?>		</td>
			<td>	<?php var_dump($test['error_obtenido']); ?>		</td>
			<td>	<?php echo $test['resultado']; ?>	</td>
		</tr>
	<?php	
		}
	?></tbody>
	</table>
</div>

<hr>
<div class="testCollapse" data-toggle="collapse" data-target="#testPermiso">
	<h2 class="btn btn-outline-info btn-lg">Desplegar test de Permisos <i class="fas fa-sort-down"></i> </h2>
</div>
<div class="" id="testPermiso">
	<h4> Mostrando <?php echo count($Roles_array_test);?> test de validaciones </h4>
	<table class="table table-striped">
		<thead class="thead-dark">
		<tr>
			<th scope="col">    Entidad 		</th>
			<th scope="col">	Método			</th>
			<th scope="col">	Error testeado	</th>
			<th scope="col">	Error Esperado	</th>
			<th scope="col">	Error Obtenido	</th>
			<th scope="col">	Resultado		</th>
		</tr>
	</thead>
	<tbody>
	<?php
		foreach ($Roles_array_test as $test)
		{  ?>
		<tr>
			<td>	<?php echo $test['entidad'];?>		</td>
			<td>	<?php echo $test['metodo']; ?>		</td>
			<td>	<?php echo $test['error']; ?>		</td>
			<td>	<?php var_dump($test['error_esperado']); ?>		</td>
			<td>	<?php var_dump($test['error_obtenido']); ?>		</td>
			<td>	<?php echo $test['resultado']; ?>	</td>
		</tr>
	<?php	
		}
			echo "<hr>";
		foreach ($entidades_array_test as $test)
		{  ?>
		<tr>
			<td>	<?php echo $test['entidad'];?>		</td>
			<td>	<?php echo $test['metodo']; ?>		</td>
			<td>	<?php echo $test['error']; ?>		</td>
			<td>	<?php var_dump($test['error_esperado']); ?>		</td>
			<td>	<?php var_dump($test['error_obtenido']); ?>		</td>
			<td>	<?php echo $test['resultado']; ?>	</td>
		</tr>
	
	<?php	
		}
		echo "<hr>";
		foreach ($Acciones_array_test as $test)
		{  ?>
		<tr>
			<td>	<?php echo $test['entidad'];?>		</td>
			<td>	<?php echo $test['metodo']; ?>		</td>
			<td>	<?php echo $test['error']; ?>		</td>
			<td>	<?php var_dump($test['error_esperado']); ?>		</td>
			<td>	<?php var_dump($test['error_obtenido']); ?>		</td>
			<td>	<?php echo $test['resultado']; ?>	</td>
		</tr>
	<?php	
		
		}
	?></tbody>
	</table>
</div>


<?php 
include '../View/Footer.php';


$_SESSION['test']=0;
$bd->eliminarBD('INCID_Test');