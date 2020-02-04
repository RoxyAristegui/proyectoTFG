<?php
	include_once '../Functions/Authentication.php';
	if (!isset($_SESSION['idioma'])) {
		$_SESSION['idioma'] = 'SPANISH';
	}
	else{
	}
	include '../Locale/Strings_' . $_SESSION['idioma'] . '.php';
error_reporting(E_ALL);
ini_set('display_errors', '1');
?>
<html>
<head>
	 <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="Rosanna aristegui">

	<title>
		<?php echo $strings['Ejemplo arquitectura IU']; ?>
	</title>

  <link href="Locale/template/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="Locale/template/css/sb-admin-2.min.css" rel="stylesheet">

	<!--script type="text/javascript" src="../View/js/tcal.js"></script> 
	
	<!--<script type="text/javascript" src="../View/js/comprobar.js"></script> >
	<link rel="stylesheet" type="text/css" href="../View/css/JulioCSS-2.css" media="screen" /-->
	

</head>
<body>
		<div id="modal" style="display:none">
	  		<div id="contenido-interno">
	  			<div id="aviso"><img src="../View/Icons/sign-error.png" name="aviso"/></div>
	  			<div id="mensajeError"></div>
				<a id="cerrar" href="#" onclick="cerrarModal();">
		       		<img style="cursor: pointer" alt="" src="../View/Icons/salir.png" width="25"/>
				</a>
			</div>
		</div>
<header>
	<p style="text-align:center">
		<h1>
<?php
			echo $strings['Portal de Gestión'];
?>
		</h1>
	</p>
	
	<div width: 50%; align="left">
		<form name='idiomaform' action="../Functions/CambioIdioma.php" method="post">
			<?php echo $strings['idioma']; ?>
			<select name="idioma" onChange='this.form.submit()'>
		        <option value="SPANISH"> </option>
				<option value="ENGLISH"><?php echo $strings['INGLES']; ?></option>
		        <option value="SPANISH"><?php echo $strings['ESPAÑOL']; ?></option>
			</select>
		</form>
	</div>
<?php
	
	if (IsAuthenticated()){
?>

<?php
		echo $strings['Usuario'] . ' : ' . $_SESSION['login'] . '<br>';
?>			
	<div width: 50%; align="right">
		<a href='../Functions/Desconectar.php'>
			<img src='./sign-error.png'>
		</a>
	</div>

<?php
	
	}
	else{
		echo $strings['Usuario no autenticado']; 
		/*echo 	'<form name=\'registerForm\' action=\'../Controller/Register_Controller.php\' method=\'post\'>
					<input type=\'submit\' name=\'action\' value=\'REGISTER\'>
				</form>';*/
?>
		<a href='../Controller/Register_Controller.php'>Registrar</a>
<?php
	}	
?>


</header>

<div id = 'main'>
<?php
	//session_start();
	if (IsAuthenticated()){
		include '../View/users_menuLateral.php';
	}
?>
<article>
