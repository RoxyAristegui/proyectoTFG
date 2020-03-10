<?php
session_start();

include_once '../View/Header.php';


/*
include_once '../Model/Access_DB.php';
$mysql = ConnectDB();
$filename='../tfgRoxy_test.sql';
$query = '';
$sqlScript = file($filename);

foreach ($sqlScript as $line)	{
	
	$startWith = substr(trim($line), 0 ,2);
	$endWith = substr(trim($line), -1 ,1);
	
	if (empty($line) || $startWith == '--' || $startWith == '/*' || $startWith == '//') {
		continue;
	}
		
	$query = $query . $line;
	if ($endWith == ';') {
		mysqli_query($mysql,$query) or die( $msg='<div class="error-response sql-import-response">Problem in executing the SQL query <b>' . $query. '</b></div>');
		
		$query= '';		
	}
}

echo '<div class="success-response sql-import-response">SQL TEST file imported successfully</div>';
*/


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
	<h2 class="btn btn-outline-info btn-lg"> Desplegar Test Unitarios <i class="fas fa-sort-down"></i></h2>
</div>
<div class="collapse" id="testUnitarios">
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