<?php
session_start();


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
		//mysqli_query($mysql,$query) or die( $msg='<div class="error-response sql-import-response">Problem in executing the SQL query <b>' . $query. '</b></div>');
		
		$query= '';		
	}
}

echo '<div class="success-response sql-import-response">SQL TEST file imported successfully</div>';

// crear el array principal de test
$ERRORS_array_test = array();
// incluimos aqui tantos ficheros de test como entidades
echo 'TESTS GENERALES ----- <BR>';
include '../test/Global_test.php';
echo 'TEST UNITARIOS ------ <BR>';
include '../test/USUARIOS_test.php';
include '../test/Validar_test.php';
include '../test/Validar_usuario_test.php';





?>

<h1>De <?php echo count($ERRORS_array_test); ?> tests hay </h1>
<br>

<?php
// presentacion de resultados
?>
<h1>Test de unidad</h1>
<table>
	<tr>
		<th>
			Entidad
		</th>
		<th>
			Método
		</th>
		<th>
			Error testeado
		</th>
		<th>
			Error Esperado
		</th>
		<th>
			Error Obtenido
		</th>
		<th>
			Resultado
		</th>
	</tr>
<?php
	foreach ($ERRORS_array_test as $test)
	{
?>
	<tr>
		<td>
			<?php echo $test['entidad'];?>
		</td>
		<td>
			<?php echo $test['metodo']; ?>
		</td>
		<td>
			<?php echo $test['error']; ?>
		</td>
		<td>
			<?php echo $test['error_esperado']; ?>
		</td>
		<td>
			<?php var_dump($test['error_obtenido']); ?>
		</td>
		<td>
			<?php echo $test['resultado']; ?>
		</td>
	</tr>
<?php	
	}
?>
</table>

