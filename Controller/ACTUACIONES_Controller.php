<?php

    include_once '../Functions/ControlarAcceso.php';
    include_once '../Model/ACTUACIONES_Model.php';
    include_once '../Model/Comentarios_Model.php';

    include '../View/ACTUACIONES_ADD_View.php';
    include '../View/ACTUACIONES_EDIT_View.php';
    include '../View/ACTUACIONES_SHOWALL_View.php';
    include '../View/ACTUACIONES_SHOWCURRENT_View.php';
    include '../View/ACTUACIONES_DELETE_View.php';
    include '../View/ACTUACIONES_SEARCH_View.php';
    include '../View/COMENTARIOS_ADD_View.php';


    function UploadImagen()
    {
        $rtn['error'] = '0';
        $rtn['filename'] = '';
        //comprobar si hay imagen que procesar
        if (isset($_FILES['imagen']) && $_FILES['imagen']['name']!='') {
            //si hay imagen comprobar que se subio correctamente
            if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
                // get details of the uploaded file
                $fileTmpPath = $_FILES['imagen']['tmp_name'];
                $fileName = $_FILES['imagen']['name'];
                $fileNameCmps = explode(".", $fileName);
                $fileExtension = strtolower(end($fileNameCmps));
            
                $newFileName = md5(time() . $fileName) . '.' . $fileExtension;

                // check if file has one of the following extensions
                $allowedfileExtensions = array('jpg', 'png', 'zip', 'jpeg');

                if (in_array($fileExtension, $allowedfileExtensions)) {
                    // directory in which the uploaded file will be moved
                    $uploadFileDir = '../Locale/uploaded_files/';
                    $dest_path = $uploadFileDir . $newFileName;

                    if (move_uploaded_file($fileTmpPath, $dest_path)) {
                        $rtn['error'] = '006001'; // 'File is successfully uploaded.';
                        $rtn['filename'] = $dest_path;
                    } else {
                        $rtn['error'] = '006002'; //'There was some error moving the file to upload directory. Please make sure the upload directory is writable by web server.';
                    }
                } else {
                    $rtn['error'] = '006003'; //$message = 'Upload failed. Allowed file types: ' . implode(',', $allowedfileExtensions);
                }
            } else {
                //'There is some error in the file upload. Please check the following error.<br>';
                $rtn['error'] = '006004';//$_FILES['imagen']['error'];

            }

        }
     return $rtn;
    }
if (!isset($_REQUEST['action'])){
    $_REQUEST['action'] = '';
}


// En funcion del action realizamos las acciones necesarias

Switch ($_REQUEST['action']) {
    case 'ADD':
        if(!$_POST){
            //mostrar formulario
            new ACTUACIONES_ADD($_REQUEST['codigo_obra']);
        }else{
            //recoger datos
            $acto= new ACTUACIONES_Model('',$_POST['codigo_obra'],$_POST['descripcion'],$_POST['fecha_actuacion']);
            $respuesta=$acto->ADD();
            if(isset($respuesta['code']) && $respuesta['code']=='00001'){
                header("Location:TRABAJADORES_Controller.php?codigo_obra=".$_POST['codigo_obra']."&id_acto=".$acto->id_acto);
            }else {
                new MESSAGE($respuesta, "ACTUACIONES_Controller.php?codigo_obra=" . $_POST['codigo_obra']);
            }
        }
        break;

    case 'EDIT':
        if(!$_POST){
            //mostrar formulario con datos
             $acto= new ACTUACIONES_Model($_REQUEST['id_acto'],$_REQUEST['codigo_obra'],'','');
            $tupla=$acto->getById();
            if($tupla['aceptado']==1){
                         new MESSAGE('005376',"ACTUACIONES_Controller.php?action=SHOWCURRENT&codigo_obra=".$_REQUEST['codigo_obra']."&id_acto=".$_REQUEST['id_acto']);
            }else{
            new ACTUACIONES_EDIT($tupla);}
        }else{
            //recoger datos
            $acto= new ACTUACIONES_Model($_POST['id_acto'],$_POST['codigo_obra'],$_POST['descripcion'],$_POST['fecha_actuacion']);
            $respuesta=$acto->EDIT();
            new MESSAGE($respuesta,"ACTUACIONES_Controller.php?action=SHOWCURRENT&codigo_obra=".$_POST['codigo_obra']."&id_acto=".$_POST['id_acto']);
        }
        break;
   case 'DELETE':
        if(!$_POST){
            //mostrar formulario con datos
             $acto= new ACTUACIONES_Model($_REQUEST['id_acto'],$_REQUEST['codigo_obra'],'','');
            $tupla=$acto->getById();
            new ACTUACIONES_DELETE($tupla);
        }else{
            //recoger datos
            $acto= new ACTUACIONES_Model($_POST['id_acto'],$_POST['codigo_obra'],'','');
            $respuesta=$acto->DELETE();

            new MESSAGE($respuesta,"ACTUACIONES_Controller.php?codigo_obra=".$_POST['codigo_obra']);
        }
        break;

   case 'SHOWCURRENT':
             $acto= new ACTUACIONES_Model($_REQUEST['id_acto'],$_REQUEST['codigo_obra'],'','');
            $tupla=$acto->getById();
            $trabajadores=$acto->getTrabajadoresActuacion();
            $comentario= new Comentarios_Model('',$_REQUEST['codigo_obra'],$_REQUEST['id_acto'],'','','');
            $comentarios=$comentario->SEARCH();
            new ACTUACIONES_SHOWCURRENT($tupla,$trabajadores,$comentarios);
            break;
    case 'SEARCH':
        if(!$_POST){
            new ACTUACIONES_SEARCH();
        }else{
              $acto= new ACTUACIONES_Model(     '',$_POST['codigo_obra'],$_POST['descripcion'],$_POST['fecha_actuacion'],$_POST['cerrado'],$_POST['aceptado']);
              $datos=$acto->SEARCH();
              new ACTUACIONES_SHOWALL($datos);
        } break;

   case 'ACEPT':
        if(!isset($_POST['aceptado'])) {
            $_POST['aceptado'] = 0;
        }
        $acto= new ACTUACIONES_Model($_POST['id_acto'],$_POST['codigo_obra'],$_POST['descripcion'],$_POST['fecha_actuacion'],'',$_POST['aceptado']);
        $respuesta=$acto->EDIT();

        header("Location:ACTUACIONES_Controller.php?action=SHOWCURRENT&codigo_obra=".$acto->codigo_obra."&id_acto=".$acto->id_acto);

        break;
    case 'ADDcoment':
        if(!$_POST) {
            new COMENTARIOS_ADD($_REQUEST['codigo_obra'],$_REQUEST['id_acto']);

        }else{
            $insert_img=UploadImagen();

            if($insert_img['error']=='006001' || $insert_img['error']=='0'){
              //la imagen se guardo correctamente, insertar el resto del comentrio
                $comentario= new Comentarios_Model('',$_POST['codigo_obra'],$_POST['id_acto'],$_SESSION['login'],$insert_img['filename'],$_POST['descripcion']);
                $respuesta=$comentario->ADD();

                new MESSAGE($respuesta,"ACTUACIONES_Controller.php?action=SHOWCURRENT&codigo_obra=".$_POST['codigo_obra']."&id_acto=".$_POST['id_acto']);
            }else{
                new MESSAGE($insert_img,"ACTUACIONES_Controller.php?action=SHOWCURRENT&codigo_obra=".$_POST['codigo_obra']."&id_acto=".$_POST['id_acto']);
            }
        }
        break;
    case 'CLOSE':
         $acto= new ACTUACIONES_Model($_REQUEST['id_acto'],$_REQUEST['codigo_obra'],'','','1','');
         $close=$acto->Close();
         if($close      ['code']!='000054'){
             new MESSAGE($close,"ACTUACIONES_Controller.php?action=SHOWCURRENT&codigo_obra=".$acto->codigo_obra."&id_acto=".$acto->id_acto);
        }else {
             header("Location:ACTUACIONES_Controller.php?codigo_obra=" . $acto->codigo_obra);
         }
        break;
   default:
        if(isset($_REQUEST['codigo_obra'])){
           //mostrar las actuaciones de una obra
           $acto = new ACTUACIONES_Model('', $_REQUEST['codigo_obra'], '', '');
        }else {
            //mostrar todas las actuaciones
            $acto = new ACTUACIONES_Model('', '', '', '');
        }
         $respuesta = $acto->SEARCH();
         new ACTUACIONES_SHOWALL($respuesta);

        break;

}
