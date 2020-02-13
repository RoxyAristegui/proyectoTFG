<?php
	include_once '../Functions/Authentication.php';
/*	if (!isset($_SESSION['idioma'])) {
		$_SESSION['idioma'] = 'SPANISH';
	}
	else{
	}*/
	//include '../Locale/Strings_' . $_SESSION['idioma'] . '.php';
//error_reporting(E_ALL);
//ini_set('display_errors', '1');
if(isset($_COOKIE["lang"])){
  $lang=$_COOKIE["lang"];
}else{
  $lang='ES';
}
include '../Locale/Strings_'.$lang.'.php';
?>

<html>
<head>
	 <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="Rosanna aristegui">

	<title>
		<?php echo $strings['Gestor de Peticiones de incidencias']; ?>
	</title>

  <link href="../Locale/template/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="../Locale/template/css/sb-admin-2.css" rel="stylesheet">
  <link href="../Locale/template/css/custom.css" rel="stylesheet">
    <!-- Custom styles for this page -->
  <link href="../Locale/template/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

  <!--script type="text/javascript" src="../Locale/Lang_ES.js"></script>
  <script type="text/javascript" src="../Locale/Lang_EN.js"></script>
  <script type="text/javascript" src="../Locale/Lang_GA.js"></script-->
  <script type="text/javascript" src="../Locale/idioma.js"></script>

	

</head>
<body id="page-top"'>
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
          <!-- Topbar Search -->
          <!--form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group">
              <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
              <div class="input-group-append">
                <button class="btn btn-primary" type="button">
                  <i class="fas fa-search fa-sm"></i>
                </button>
              </div>
            </div>
          </form-->
          <div class="nav-item ">
          <a class="nav-link navbar-brand NomProyect d-none d-md-inline" href="../Controller/Index_Controller.php">
          

          </a>
          </div>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS)-->
            <!--li class="nav-item dropdown no-arrow d-sm-none">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
              <!-- Dropdown -Search Messages -->
              <!--div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                  <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </li-->


            <!-- Nav Item - Messages -->
            <li class="nav-item dropdown no-arrow mx-1">
            	<a class="nav-link dropdown-toggle text-gray-600"  id="idiomaDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            			<?php echo $strings['idioma']; ?>
            	</a>
        	    <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="idiomaDropdown">
	                <h6 class="dropdown-header">
	                  <?php echo $strings['Selecciona un idioma']; ?>
	                </h6>
	                 <div class="dropdown-item d-flex align-items-center" href="#">


                    <a class="m-auto" onclick="cambiarLang('GA')"><img src="../Locale/img/gallego.png" height="40" width="60"></a>
                    <a class="m-auto" onclick="cambiarLang('ES')"><img src="../Locale/img/espanol.png" height="40" width="60"></a>
                    <a class="m-auto" onclick="cambiarLang('EN')"><img src="../Locale/img/ingles.png" height="40" width="60"></a>

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
	                  <span class="verPerfil"> <?php echo $strings["ver perfil"]?></span>
	                </a>
	               
	                <div class="dropdown-divider"></div>
	                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
	                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
	                  <span class="Desconectar"><?php echo $strings["Desconectar"]?>  </span>
	                </a>
	              </div>

			<?php	
			}
			else{
				?>
				    <a class="nav-link text-gray-600 " href="../Controller/Register_Controller.php" id="userDropdown" role="button" aria-haspopup="true" aria-expanded="false">
				 <span class="Registrar"><?php echo $strings["Registrar"] ?> </span>
			
			</a>
			<?php
				}	
			?>


            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->


<!-- Begin Page Content -->
        <div class="container-fluid">

