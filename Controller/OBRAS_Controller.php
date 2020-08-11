<?php
    include_once '../Functions/ControlarAcceso.php';
    include_once '../Model/OBRAS_Model.php';
    include_once '../Model/PROVEEDORES_Model.php';
    include_once '../Model/Areas_Model.php';

    include '../View/OBRAS_ADD_View.php';
    include '../View/OBRAS_EDIT_View.php';
    include '../View/OBRAS_SHOWALL_View.php';
    include '../View/OBRAS_SHOWCURRENT_View.php';
    include '../View/OBRAS_DELETE_View.php';
    include '../View/OBRAS_SEARCH_View.php';

	// la función get_data_form() recoge los valores que vienen del formulario por medio de post y la action a realizar, crea una instancia USUARIOS y la devuelve
	function get_data_form()
    {
        $codigo_obra = $_POST['codigo_obra'];
        $nombre = $_POST['nombre'];
        $fecha_creacion = $_POST['fecha_creacion'];
        $fecha_final = $_POST['fecha_final'];
        $CIF = $_POST['CIF'];
        $codigo_area = $_POST['codigo_area'];
        $situacion = $_POST['situacion'];
        $coste = $_POST['coste'];
        $solicitante = $_POST['solicitante'];

        $obra = new OBRAS_Model($codigo_obra, $nombre, $fecha_creacion, $fecha_final,$CIF, $codigo_area, $situacion, $coste, $solicitante);
        return $obra;
    }


if (!isset($_REQUEST['action'])){
    $_REQUEST['action'] = '';
}


// En funcion del action realizamos las acciones necesarias

Switch ($_REQUEST['action']){
    case 'ADD':
            if(!$_POST){
                $areas= new Areas('','','');
                $areasList=$areas->SEARCH();
                $proveedores= new PROVEEDORES_Model('','','','','','','','','');
                $proveedoresList=  $proveedores->SEARCH();

                new OBRAS_ADD($proveedoresList,$areasList);

            }else{
                $obra=get_data_form();
                $respuesta=$obra->ADD();
                new MESSAGE($respuesta,'../Controller/OBRAS_Controller.php');
            }
            break;

    case 'EDIT':
        if(!$_POST){
            $obras= new OBRAS_Model($_REQUEST['codigo_obra'],'','','','','','','','');
            $tupla=$obras->getById();
                $areas= new Areas('','','');
                $areasList=$areas->SEARCH();
                $proveedores= new PROVEEDORES_Model('','','','','','','','','');
                $proveedoresList=  $proveedores->SEARCH();
                new OBRAS_EDIT($tupla,$proveedoresList,$areasList);

            }else{
                $obra=get_data_form();
                $respuesta=$obra->EDIT();
                new MESSAGE($respuesta,'../Controller/OBRAS_Controller.php');
            }
            break;
    case 'SEARCH':
        if(!$_POST){
            $obras= new OBRAS_Model('','','','','','','','','');
              $areas= new Areas('','','');
                $areasList=$areas->SEARCH();
                $proveedores= new PROVEEDORES_Model('','','','','','','','','');
                $proveedoresList=  $proveedores->SEARCH();

                new OBRAS_SEARCH($proveedoresList,$areasList);

            }else{
                $obra=get_data_form();
                $datos=$obra->SEARCH();
                 $lista=array('codigo_obra','nombre','fecha_creacion','fecha_final','CIF','codigo_area');

             new OBRAS_SHOWALL($lista,$datos);
            }
            break;
    case 'SHOWCURRENT':

            $obras= new OBRAS_Model($_REQUEST['codigo_obra'],'','','','','','','','');
            $tupla=$obras->getById();
                $areas= new Areas('','','');
                $areasList=$areas->SEARCH();
                $proveedores= new PROVEEDORES_Model('','','','','','','','','');
                $proveedoresList=  $proveedores->SEARCH();

                new OBRAS_SHOWCURRENT($tupla,$proveedoresList,$areasList);


        break;
    case 'DELETE':
        if(!$_POST){
            $obras= new OBRAS_Model($_REQUEST['codigo_obra'],'','','','','','','','','');
            $tupla=$obras->getById();
                $areas= new Areas('','','');
                $areasList=$areas->SEARCH();
                $proveedores= new PROVEEDORES_Model('','','','','','','','','');
                $proveedoresList=  $proveedores->SEARCH();

                new OBRAS_DELETE($tupla,$proveedoresList,$areasList);

            }else{
                $obra=get_data_form();
                $respuesta=$obra->DELETE();
                new MESSAGE($respuesta,'../Controller/OBRAS_Controller.php');
            }
    break;
    default:
           //COMPROBAR SI ES PROVEEDOR PARA MOSTRARLE SOLO SUS OBRAS ASIGNADAS
            if($_SESSION['rol']=='4'){
                 $prov= new PROVEEDORES_Model('','','','','','','','','');
                 $datosprov=$prov->getByAdmin($_SESSION['login']);
                 if(isset($datosprov['code']) && $datosprov['code']=='004080'){
                    //siel proveedor todavia no introdujo sus datos de empresa no tiene obras qu emostras
                     header('Location: PROVEEDORES_Controller.php?action=ADD');
                 }
                 $obras= new OBRAS_Model('','','','',$datosprov['CIF'],'','','','');
            }else {

                //el resto puede ver todas las obras creadas
                $obras = new OBRAS_Model('', '', '', '', '', '', '', '', '');
            }
            $datos=$obras->SEARCH();
            $lista=array('codigo_obra','nombre','fecha_creacion','fecha_final','CIF','codigo_area');

            new OBRAS_SHOWALL($lista,$datos);

        break;
}
