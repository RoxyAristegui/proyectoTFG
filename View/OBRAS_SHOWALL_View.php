<?php

class OBRAS_SHOWALL
{

    var $lista;
    var $datos;

    function __construct($lista, $datos)
    {
        $this->datos = $datos;
        $this->lista = $lista;
        $this->render();
    }

    function render()
    {

        include '../View/Header.php'; //header necesita los strings
        ?>
        <h1 class="Obras">Obras</h1>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <?php if($_SESSION['rol']=='1' || $_SESSION['rol']=='3'){
                    //Solo el admin y el proveedor pueden añadir y buscar obras
                    ?>
                <h6 class="m-0 font-weight-bold text-info">
                    <div class="clearfix">
                        <div class="float-left">
                            <a href='../Controller/OBRAS_Controller.php?action=ADD' class='Anhadir mas icon'> Añadir</a>
                        </div>
                        <div class="float-right">
                            <a href="../Controller/OBRAS_Controller.php?action=SEARCH"
                               class="BusquedaAvanzada lupa icon"> Búsqueda avanzada</a>
                        </div>
                    </div>
                </h6>
            </div>
            <?php }?>
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
                            <?php foreach ($this->lista as $titulo) { ?>
                                <th><?php echo $titulo; ?></th>
                            <?php } ?>
                          <th>Actuaciones</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>Ver</th>
                            <?php foreach ($this->lista as $titulo) { ?>
                                <th><?php echo $titulo; ?></th>
                            <?php } ?>
                        <th>Actuaciones</th>
                        </tr>
                        </tfoot>
                        <tbody>

                        <?php

                                foreach ($this->datos as $fila) { ?>
                                    <tr>
                                        <td><a href='
							../Controller/OBRAS_Controller.php?action=SHOWCURRENT&codigo_obra=
								<?php echo $fila['codigo_obra']; ?>'> <i class="fas fa-eye"></i> </a></td>
                                        <?php foreach ($this->lista as $columna) {

                                            echo " <td>" . $fila[$columna] . " </td>";
                                        } ?>
                                 <th>
                                     <a class="btn btn-info actuaciones lista" href="../Controller/ACTUACIONES_Controller.php?codigo_obra=<?php echo $fila['codigo_obra']; ?>">
                                         <i class="fas fa-list-ul"></i> Actuaciones</a>
                                 </th>
                                    </tr>

                                <?php
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

