<?php

  include_once '../Functions/Authentication.php';



if(isset($_COOKIE["lang"])){
  $lang=$_COOKIE["lang"];
}else{
  $lang='ES';
}

?>

<html>
<head>
	 <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Gestor de seguimiento de obras y actuaciones para la universidad de Vigo.">
  <meta name="author" content="Rosanna aristegui Rodal">

	<title>
	Gestor de peticiones de incidencias
	</title>

  <link href="../Locale/template/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="../Locale/template/css/sb-admin-2.css" rel="stylesheet">
  <link href="../Locale/template/css/custom.css" rel="stylesheet">
    <!-- Custom styles for this page -->
  <link href="../Locale/template/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

  <script type="text/javascript" src="../Locale/Lang_ES.js"></script>
  <script type="text/javascript" src="../Locale/Lang_EN.js"></script>
  <script type="text/javascript" src="../Locale/Lang_GA.js"></script>
  <script type="text/javascript" src="../Locale/idioma.js"></script>

	

</head>
<body id="page-top" onload='setLang()'>
  <!-- Page Wrapper -->
  <div id="wrapper">


<?php
	//session_start();
	if (IsAuthenticated()){
		include '../View/users_menuLateral.php';
	}
?>


    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
<?php
	//session_start();
	if (IsAuthenticated()){ ?>
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>
<?php 
} ?>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">



            <!-- Nav Item - Messages -->
            <li class="nav-item dropdown no-arrow mx-1">
            	<a class="nav-link dropdown-toggle text-gray-600 Idioma"  id="idiomaDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            		Idioma
            	</a>
        	    <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="idiomaDropdown">
	                <h6 class="dropdown-header SeleccionaIdioma">
	                 Selecciona un idioma
	                </h6>
	                 <div class="dropdown-item d-flex align-items-center" href="#">


                    <a class="m-auto" onclick="setLang('GA')"><img src="../Locale/img/gallego.png" height="40" width="60"></a>
                    <a class="m-auto" onclick="setLang('ES')"><img src="../Locale/img/espanol.png" height="40" width="60"></a>
                    <a class="m-auto" onclick="setLang('EN')"><img src="../Locale/img/ingles.png" height="40" width="60"></a>

					         </div>
				      </div>
             
            </li>

            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
             
                
                <?php	if (IsAuthenticated()){	?>

      			   <a class="nav-link dropdown-toggle text-gray-600" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      			  <img src='../Locale/img/ninjaicon.png' class="img-profile" width="50px" height="50px">
               <span class="ml-2 d-none d-lg-inline text-gray-600 "><?php echo $_SESSION['login'] ?></span>

      				</a>
      				<div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
      	                <a class="dropdown-item " href='../Controller/USUARIOS_Controller.php?action=SHOWCURRENT&login=<?php echo $_SESSION['login']; ?>'>
      	                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400 "></i>
      	                  <span class="VerPerfil"> Ver perfil</span>
      	                </a>
      	               
      	                <div class="dropdown-divider"></div>
      	                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
      	                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
      	                  <span class="desconectar">Desconectar  </span>
      	                </a>
      	              </div>

      			<?php	
      			}
      			else{
      				?>
      				    <a class="nav-link text-gray-600 " href="../Controller/Register_Controller.php"  role="button" aria-haspopup="true" aria-expanded="false">
      				 <span class="Registrar">Registrar</span>
      			
      			</a>
          </li>
         
            <li class="nav-item dropdown no-arrow">
               <a class="nav-link text-gray-600 " href="../Controller/Login_Controller.php"  role="button" aria-haspopup="true" aria-expanded="false">
               <span class="Log-in">Log in</span></a>
            
      			<?php
      				}	
      			?>


            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->


<!-- Begin Page Content -->
        <div class="container-fluid">

