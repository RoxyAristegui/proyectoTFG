

	  <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-info sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="../Controller/Index_Controller.php">
        <div class="sidebar-brand-icon rotate-n-15">
         <i class="fas fa-cubes"></i>
        </div>
        <div class="sidebar-brand-text mx-3">GeSeOb <sup>Uvigo</sup></div>
      </a>


      <!-- Divider -->
      <hr class="sidebar-divider">

    
     <li class="nav-item">
        <a class="nav-link" href="../Controller/OBRAS_Controller.php" aria-expanded="true" aria-controls="">
          <i class="fas fa-tools"></i>
          <span class="Obras">Obras</span>
        </a>
      </li>
    <?php 
//para todos menos para el prveedor
  if($_SESSION['rol']!='4'){ ?>
     
          <li class="nav-item">
        <a class="nav-link" href="../Controller/ACTUACIONES_Controller.php" aria-expanded="true" aria-controls="">
         <i class="fas fa-wrench"></i>
          <span class="Actuaciones">Actuaciones</span>
        </a>
      </li>

    <?php 
}
//solo para responsable
  if($_SESSION['rol']=='3' || $_SESSION['rol'] == '1'){ ?>
  <!-- Divider -->
      <hr class="sidebar-divider">
   <!-- Heading -->
      <div class="sidebar-heading GestionInterna">
        Gestión Interna
      </div>
       <li class="nav-item">
        <a class="nav-link" href="../Controller/PROVEEDORES_Controller.php" aria-expanded="true" aria-controls="">
        <i class="far fa-building"></i>
          <span class="Proveedores">Proveedores</span>
        </a>
      </li>



             <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link" href="../Controller/USUARIOS_Controller.php"  aria-expanded="true" aria-controls="">
          <i class="fas fa-fw fa-user"></i>
          <span class="Usuarios">Usuarios</span>
        </a>

    </li>

<?php
}
//solo para adminsitrador
  if($_SESSION['rol']=='1'){ ?>

        <li class="nav-item">
        <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapsePermisos" aria-expanded="true" aria-controls="collapsePermisos">
          <i class="fas fa-fw fa-cog"></i>
          <span class="Permisos">Permisos</span>
        </a>
        
        <div id="collapsePermisos" class="collapse" aria-labelledby="" data-parent="#accordionSidebar" style="">
          <div class="bg-white py-2 collapse-inner rounded">
              <a class="collapse-item DefinirPermisos" href="../Controller/PERMISOS_Controller.php">Definir Permisos</a>
              <a class="collapse-item CambiarPermisosRol" href="../Controller/PERMISOS_Rol_Controller.php">Cambiar permisos de rol</a>
              <a class="collapse-item AsociarUsuariosRol" href='../Controller/ROLES_Controller.php?action=EDIT'> Asociar usuarios a Rol</a>

          
              <div class="collapse-divider"></div>
              <h6 class="collapse-header Componentes">Permisos :</h6>

              <a class="collapse-item GestionRoles" href='../Controller/ROLES_Controller.php?action=ADD'> Gestion de roles</a>
              <a class="collapse-item GestionEntidades" href='../Controller/ENTIDADES_Controller.php'>Gestion de entidades</a>
              <a class="collapse-item GestionAcciones" href='../Controller/ACCIONES_Controller.php'>Gestion de acciones</a>



          </div>
        </div>
    
      </li>
  <?php } ?>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>