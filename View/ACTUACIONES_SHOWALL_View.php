<?php

class ACTUACIONES_SHOWALL
{

    var $datos;

    function __construct( $datos)
    {
        $this->datos = $datos;
        $this->render();
    }

    function render()
    {

        include '../View/Header.php'; //header necesita los strings
        ?>
        <h1 class="Actuaciones">Actuaciones</h1>
        <div class="card shadow mb-4">
            <div class="card-header py-3">

                <h6 class="m-0 font-weight-bold text-info">
                    <div class="clearfix">
                        <?php if(isset($_REQUEST['codigo_obra']) && ($_SESSION['rol']=='1' || $_SESSION['rol']=='4')){ ?>
                        <div class="float-left">
                            <a href='../Controller/ACTUACIONES_Controller.php?action=ADD&codigo_obra=<?php echo $_REQUEST['codigo_obra']?>' class='Anhadir mas icon'> Añadir</a>
                        </div> <?php } ?>
                         <?php if($_SESSION['rol']=='1' || $_SESSION['rol']=='3'){ ?>
                        <div class="float-right">
                            <a href="../Controller/ACTUACIONES_Controller.php?action=SEARCH"
                               class="BusquedaAvanzada lupa icon"> Búsqueda avanzada</a>
                        </div>
                        <?php } ?>
                    </div>
                </h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
       <?php
        if(isset($this->datos['code'])){
            echo '<div class="'.$this->datos['code'].'"></div>';
        }else { ?>
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Ver</th>
                        <th>obra</th>
                        <th>actuacion</th>
                        <th>fecha</th>
                        <th>descripcion</th>
                        <th>Aceptada</th>
                        <th>Cerrada</th>
                    </tr>

                    </thead>
                    <tbody>
                    <?php foreach ($this->datos as $acto){
                          if($acto['cerrado']==1){
                             $cerrado='bkGreen';
                             $textCerr='si';
                         }else{
                             $cerrado='bkRed';
                             $textCerr='no';
                         }
                          if($acto['aceptado']==1){
                                  $aceptado='bkGreen';
                             $textAcp='si';
                         }else{
                             $aceptado='bkGray';
                             $textAcp='no';
                         }
                         echo "<tr>";
                          echo "<td><a href='../Controller/ACTUACIONES_Controller.php?action=SHOWCURRENT&codigo_obra=".$acto['codigo_obra']."&id_acto=".$acto['id_acto']."'><i class='fas fa-eye'></i>'</a></td>";
                         echo "<td>".$acto['codigo_obra']."</td>";
                         echo "<td>".$acto['id_acto']."</td>";
                         echo "<td>".$acto['fecha_actuacion']."</td>";
                         echo "<td>".$acto['descripcion']."</td>";
                         echo "<td class='".$aceptado."'>".$textAcp."</td>";
                         echo "<td class='".$cerrado."'>".$textCerr."</td>";
                         echo "</tr>";
                    }
                    ?>

                    </tbody>

                    </table>
                    <?php } ?>
                </div>
            </div>


        </div>


        <?php
        include '../View/Footer.php';
    } //fin metodo render

}

?>

