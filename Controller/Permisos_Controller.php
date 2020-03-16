<?php
include "../Model/ACL_Model.php";
include "../View/Roles_View.php";
include "../View/header.php";

	$acl=new ACL();
	if (!isset($_REQUEST['action'])){
		$_REQUEST['action'] = '';
	}
	$acl=new ACL();
// En funcion del action realizamos las acciones necesarias

		$permiso= new Permisos('','');
		$permisos= $permiso->SEARCH();
		$accion = new Accion('');
		$acciones=$accion->SEARCH();
		$entidad= new Entidad('');
		$entidades=$entidad->SEARCH();

echo "<table class='table'>";
		for($i=0;$i<sizeof($entidades);$i++){
			echo "<tr>";
			for($j=0;$j<sizeof($acciones);$j++){

				foreach ($permisos as $permiso) {
					
					$permiso['id_accion'];
				}
				echo "permisos".$permisos[$j]['id_accion'];
				echo "<td>";
				echo "acciones".$acciones[$j]["id_accion"];
				echo "<td>";
			}
		"<tr>";
	}
		echo "<pre>";
		//var_dump($permisos);
		echo "</pre>";

