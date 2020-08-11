<?php

class OBRAS_DELETE{
    var $listaProveedores;
    var $listaAreas;
    var $tupla;

    function __construct($tupla,$listaProveedores,$listaAreas){
        $this->listaProveedores=$listaProveedores;
        $this->listaAreas=$listaAreas;
        $this->tupla=$tupla;
        $this->render();
    }

    function render(){
        include '../View/Header.php'; //header necesita los strings
		?>
        <div class="container">
            <h1 class="EliminarObra">Eliminar obra</h1>
            <form name = 'Form' action='../Controller/OBRAS_Controller.php' method='post' onsubmit="confirmar()">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group row">
                            <label for='codigo_obra' class="col-sm-3 col-form-label">codigo_obra</label>
                            <div class="col-sm-8">
                                 <input type = 'number' name = 'codigo_obra' id = 'codigo_obra' class="form-control" placeholder = ''  maxlength="11"
                                 value="<?php echo $this->tupla['codigo_obra'] ?>" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for='nombre' class="col-sm-3 col-form-label">Nombre</label>
                            <div class="col-sm-8">
                                <textarea rows='4' name='nombre' class="form-control" id='nombre'  placeholder='' readonly><?php echo $this->tupla['nombre'] ?> </textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for='codigo_area' class="col-sm-3 col-form-label">Area</label>
                            <div class="col-sm-8">

                                <?php
                                if($this->tupla['codigo_area']==""){
                                            echo " <input type='text' name='codigo_area' id='codigo_area' class='form-control' placeholder=''  value=''  readonly>";
                                        }
                                foreach($this->listaAreas as $area){

                                 if($this->tupla['codigo_area']==$area['codigo_area']) {
                                     echo "  <input type='text' name='codigo_area' id='codigo_area' class='form-control' placeholder=''  value=" . $area['nombre'] . "  readonly>";
                                 }
                                    } ?>

                            </div>
                        </div>
                        <div class="form-group row">
                            <label for='fecha_creacion' class="col-sm-3 col-form-label">fecha_creacion</label>
                            <div class="col-sm-8">
                                <input type='date' name='fecha_creacion' id ='fecha_creacion' class="form-control"  value="<?php echo $this->tupla['nombre'] ?>"  placeholder=''  readonly>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                         <div class="form-group row">
                        <label for='Proveedor' class="col-sm-3 col-form-label">Proveedor</label>
                            <div class="col-sm-8">

                                <?php
                                if($this->tupla['CIF']==""){
                                            echo " <input type='text' name='CIF' id='CIF' class='form-control' placeholder=''  value=''  readonly>";
                                        }else {
                                    foreach ($this->listaProveedores as $prov) {

                                        if ($this->tupla['CIF'] == $prov['CIF']) {
                                            echo " <input type='text' name='CIF' id='CIF' class='form-control' placeholder=''  value='" . $prov['empresa'] . "'  readonly>";
                                        }
                                    }
                                }?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for='situacion' class="col-sm-3 col-form-label">Situacion</label>
                            <div class="col-sm-8">
                                <input type='number' name = 'situacion' id ='situacion' class="form-control" placeholder=""   value="<?php echo $this->tupla['situacion'] ?>"  maxlength="2" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for='solicitante' class="col-sm-3 col-form-label">solicitante</label>
                            <div class="col-sm-8">
                                <input type='text' name ='solicitante' id ='solicitante' class="form-control" placeholder=""   value="<?php echo $this->tupla['solicitante'] ?>"  maxlength="120" readonly>
                            </div>
                        </div>
                            <div class="form-group row">
                            <label for='coste' class="col-sm-3 col-form-label">coste</label>
                            <div class="col-sm-8">
                                <input type='number' name='coste' id='coste' class="form-control" placeholder=""  value="<?php echo $this->tupla['coste'] ?>"   maxlength="11" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for='fecha_final' class="col-sm-3 col-form-label">fecha_final</label>
                            <div class="col-sm-8">
                                <input type='date' name='fecha_final' id ='fecha_final' class="form-control" placeholder=''  value="<?php echo $this->tupla['fecha_final'] ?>"   readonly>
                            </div>
                        </div>

                    </div>
                </div>
                    <button type='submit' name='action' class="btn btn-info delete icon" value="DELETE" id="confirm"></button>
                    <a href='../Controller/OBRAS_Controller.php' class="icon volver ml-3"> </a>


		    </form>

		</div>
		<?php
			include '../View/Footer.php';

		} //fin metodo render

	}

?>

