

	  <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-info sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="../Controller/Index_Controller.php">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="../Controller/Index_Controller.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span class="Inicio">Inicio</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

    
     

        <!-- Heading -->
      <div class="sidebar-heading GestionPermisos">
        Gestión Interna
      </div>
       <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapseUsuarios" aria-expanded="true" aria-controls="collapseUsuarios">
          <i class="fas fa-fw fa-user"></i>
          <span class="GestionUsuarios">Gestión de usuarios</span>
        </a>
        
        <div id="collapseUsuarios" class="collapse " aria-labelledby="" data-parent="#accordionSidebar" style="">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Login Screens:</h6>
            <a class="collapse-item ListarUsuarios" href="../Controller/USUARIOS_Controller.php">Listar usuarios</a>
            <a class="collapse-item Añadir" href="../Controller/USUARIOS_Controller.php?action=ADD">Añadir</a>
            <a class="collapse-item Buscar" href="../Controller/USUARIOS_Controller.php?action=SEARCH">Buscar</a>
         
          </div>
        </div>
    
      </li>

        <li class="nav-item">
        <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapsePermisos" aria-expanded="true" aria-controls="collapsePermisos">
          <i class="fas fa-fw fa-cog"></i>
          <span class="Permisos">Permisos</span>
        </a>
        
        <div id="collapsePermisos" class="collapse" aria-labelledby="" data-parent="#accordionSidebar" style="">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item DefinirPermisos" href="../Controller/PERMISOS_Controller.php">Definir Permisos</a>
            <a class="collapse-item AsignarARol" href="../Controller/PERMISOS_Rol_Controller.php">Asignar a Rol</a>
            <div class="collapse-divider"></div>
            <h6 class="collapse-header Componentes">Componentes :</h6>
           
            <a class="collapse-item GestionRoles" h href='../Controller/ROLES_Controller.php'> Gestion de roles</a>
            <a class="collapse-item GestionEntidades" h href='../Controller/ENTIDADES_Controller.php'>Gestion de entidades</a>
            <a class="collapse-item GestionAcciones" h href='../Controller/ACCIONES_Controller.php'>Gestion de acciones</a>
          </div>
        </div>
    
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>