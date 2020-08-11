<?php

include_once '../Functions/ControlarAcceso.php';
include_once '../Model/Trabajadores_Model.php';
include_once '../Model/ACTUACIONES_Model.php';

include_once '../Model/Comentarios_Model.php';

include_once '../View/Solicitar_Confirmacion_Modal.php';
include_once '../View/Mensaje_Modal.php';
include_once '../View/Trabajadores_View.php';
include_once '../View/MESSAGE_View.php';



if (!isset($_REQUEST['action'])){
    $_REQUEST['action'] = '';
}

//comprobamos si ya se ha completado la actuacion y ya nos e puede añadir trabajadores.
$comentarios=new Comentarios_Model('',$_REQUEST['codigo_obra'],$_REQUEST['id_acto'],'','','');
$comentarios_existen=$comentarios->SEARCH();
if(!isset($comentarios_existen['code'])){
    new MESSAGE("006075","ACTUACIONES_Controller.php?action=SHOWCURRENT&codigo_obra=".$_REQUEST['codigo_obra']."&id_acto=".$_REQUEST['id_acto']);
    die();
}

// En funcion del action realizamos las acciones necesarias

Switch ($_REQUEST['action']) {
    case 'ADD':
        if(!$_POST){
            $acto=new ACTUACIONES_Model($_REQUEST['id_acto'],$_REQUEST['codigo_obra'],'','','','');
            $tupla=$acto->getById();
              $acto->ADDTrabajadorActuacion($_REQUEST['DNI']);
            $trabajadores=$acto->getTrabajadoresActuacion();
            new Trabajadores_View($tupla,$trabajadores);

        }else {
            $acto = new ACTUACIONES_Model($_POST['id_acto'], $_POST['codigo_obra'], '', '', '', '');
            $tupla = $acto->getById();
            $trabajador = new Trabajadores_Model($_POST['DNI'], $_POST['nombre_completo']);
            $resp = $trabajador->ADD();

            if ($trabajador->feedback['code'] == '006071') {
                // el usuario ya estaba dado de alta
                $trabajadores = $acto->getTrabajadoresActuacion();
                new Trabajadores_View($tupla, $trabajadores);
                ?>
                <script>
                    $('#SolicitarConfModal').on('shown.bs.modal', function (event) {
                        var modal = $(this)
                        modal.find("#elem").html("<span class='d-block'><?php echo $resp['DNI'] ?></span><span class='d-block'><?php echo $resp['nombre_completo'] ?></span>")
                        modal.find("#confirmGo").attr('href', "TRABAJADORES_Controller.php?action=ADD&codigo_obra=<?php echo $_POST['codigo_obra'] . "&id_acto=" . $_POST['id_acto'] . "&DNI=" . $_POST['DNI'] ?>")
                        modal.find("#msj").attr('class', 'HemosEncontradoEsteTrabajador')
                        modal.find("#title").attr('class', "modal-title font-weight-bold EsteDniYaEstaRegistrado")
                        setLang();
                    });
                    $('#SolicitarConfModal').modal();

                </script>
                <?php

            } else {
                if (isset($resp['code']) && $resp['code'] == '00001') {

                    $acto->ADDTrabajadorActuacion($_POST['DNI']);
                    $trabajadores = $acto->getTrabajadoresActuacion();
                    new Trabajadores_View($tupla, $trabajadores);

                } else {

                    new MESSAGE($resp, "TRABAJADORES_Controller.php?codigo_obra=" . $_POST['codigo_obra'] . "&id_acto=" . $_POST['id_acto']);


                }
            }
        }

        break;
    case 'DELETE':
        $acto=new ACTUACIONES_Model($_REQUEST['id_acto'],$_REQUEST['codigo_obra'],'','','','');
        $acto->DELETETrabajadorActuacion($_REQUEST['DNI']);

        $acto=new ACTUACIONES_Model($_REQUEST['id_acto'],$_REQUEST['codigo_obra'],'','','','');
        $trabajadores=$acto->getTrabajadoresActuacion();
        $tupla=$acto->getById();
        new Trabajadores_View($tupla,$trabajadores);

        break;


    default:

       $acto=new ACTUACIONES_Model($_REQUEST['id_acto'],$_REQUEST['codigo_obra'],'','','','');
        $trabajadores=$acto->getTrabajadoresActuacion();
        $tupla=$acto->getById();
        new Trabajadores_View($tupla,$trabajadores);


         break;
}
?>

<script>

</script>