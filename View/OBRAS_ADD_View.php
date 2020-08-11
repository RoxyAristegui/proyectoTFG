<?php

class OBRAS_ADD{
    var $listaProveedores;
    var $listaAreas;


    function __construct($listaProveedores,$listaAreas){
        $this->listaProveedores=$listaProveedores;
        $this->listaAreas=$listaAreas;

        $this->render();
    }

    function render(){
        include '../View/Header.php'; //header necesita los strings
		?>
        <div class="container">
            <h1 class="AnhadirObra">Añadir obra</h1>
            <form name = 'Form' action='../Controller/OBRAS_Controller.php' method='post' onsubmit="confirmar()">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group row">
                            <label for='codigo_obra' class="col-sm-3 col-form-label">codigo_obra</label>
                            <div class="col-sm-8">
                                 <input type = 'number' name = 'codigo_obra' id = 'codigo_obra' class="form-control" placeholder = ''  maxlength="11"
                               required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for='nombre' class="col-sm-3 col-form-label">Nombre</label>
                            <div class="col-sm-8">
                                <textarea name='nombre' class="form-control" id='nombre'   placeholder='' rows="4" required></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for='codigo_area' class="col-sm-3 col-form-label">Area</label>
                            <div class="col-sm-8">
                                <select class="form-control" id="codigo_area" name="codigo_area" required>
                                    <option value="" selected>Seleccione una opcion</option>
                                  <?php
                                   foreach($this->listaAreas as $area){
                                       echo "<option value='" . $area['codigo_area'] . "' >" . $area['nombre'] . "</option>";

                                    } ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for='fecha_creacion' class="col-sm-3 col-form-label">fecha_creacion</label>
                            <div class="col-sm-8">
                                <input type='date' name='fecha_creacion' id ='fecha_creacion' class="form-control" placeholder=''  required>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                         <div class="form-group row">
                        <label for='proveedor' class="col-sm-3 col-form-label">Proveedor</label>
                            <div class="col-sm-8">
                                <select class="form-control" id="CIF" name="CIF" >
                                        <option value="" selected>Seleccione una opcion</option>
                                    <?php

                                   foreach($this->listaProveedores as $prov){
                                            echo "<option value='" . $prov['CIF'] . "' >" . $prov['empresa'] . "</option>";

                                    } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for='situacion' class="col-sm-3 col-form-label">Situacion</label>
                            <div class="col-sm-8">
                                <input type='number' name = 'situacion' id ='situacion' class="form-control" placeholder=""   maxlength="2">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for='solicitante' class="col-sm-3 col-form-label">solicitante</label>
                            <div class="col-sm-8">
                                <input type='text' name ='solicitante' id ='solicitante' class="form-control" placeholder=""   maxlength="120" >
                            </div>
                        </div>
                            <div class="form-group row">
                            <label for='coste' class="col-sm-3 col-form-label">coste</label>
                            <div class="col-sm-8">
                                <input type='number' name='coste' id='coste' class="form-control" placeholder=""   maxlength="11" >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for='fecha_final' class="col-sm-3 col-form-label">fecha_final</label>
                            <div class="col-sm-8">
                                <input type='date' name='fecha_final' id ='fecha_final' class="form-control" placeholder=''  >
                            </div>
                        </div>

                    </div>
                </div>
                    <button type='submit' name='action' class="btn btn-info check icon" value="ADD" id="confirm"></button>
                    <a href='../Controller/OBRAS_Controller.php' class="icon volver ml-3"> </a>


		    </form>

		</div>
		<?php
			include '../View/Footer.php';

		} //fin metodo render

	}

?>

