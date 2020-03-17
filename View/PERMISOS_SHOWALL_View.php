<?php 



//DEFINIR PERMISOS
//ASIGNAR PERMISOS

//AÑADIR ENTIDAD
//AÑADIR ACCION



class PERMISOS_SHOWALL {
	
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




            }
}


//UNA PANTALLA DE ROLES
+LISTAR USUARIOS CON SU ROL
+EL ROL Q SEA UN DESPLEGABLE Y LO PUEDA CAMBIAR, POR DEFECTO SU ROL
`+OPCION DE AÑADIR ROL