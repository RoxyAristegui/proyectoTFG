<?php

class OBRAS_EDIT{
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
            <h1 class="EditarObra">Editar obra</h1>
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
                                <textarea rows='4' name='nombre' class="form-control" id='nombre'  placeholder='' required><?php echo $this->tupla['nombre'] ?></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for='codigo_area' class="col-sm-3 col-form-label">Area</label>
                            <div class="col-sm-8">
                                <select class="form-control" id="codigo_area" name="codigo_area" required>
                                    <option value="" selected>Seleccione una opcion</option>
                                  <?php if($this->tupla['codigo_area']==""){
                                      echo "<option value='' selected> Seleccione un proveedor</option>";
                                  }
                                   foreach($this->listaAreas as $area){

                                        if($this->tupla['codigo_area']==$area['codigo_area']){
                                                echo  "<option value='".$area['codigo_area']."' selected>".$area['nombre']."</option>";
                                            }else {
                                            echo "<option value='" . $area['codigo_area'] . "' >" . $area['nombre'] . "</option>";
                                        }
                                    } ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for='fecha_creacion' class="col-sm-3 col-form-label">fecha_creacion</label>
                            <div class="col-sm-8">
                                <input type='date' name='fecha_creacion' id ='fecha_creacion' class="form-control" value="<?php echo $this->tupla['fecha_creacion']?>" "placeholder=''  >
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group row">
                        <label for='Proveedor' class="col-sm-3 col-form-label">Proveedor</label>
                            <div class="col-sm-8">
                                <select class="form-control" id="CIF" name="CIF" >
                                    <?php
                                    if($this->tupla['CIF']==""){
                                        echo "<option value='' selected>Seleccione un proveedor</option>";
                                    }
                                   foreach($this->listaProveedores as $prov){

                                        if($this->tupla['CIF']==$prov['CIF']){
                                            echo  "<option value='".$prov['CIF']."' selected>".$prov['empresa']."</option>";
                                        }else {
                                            echo "<option value='" . $prov['CIF'] . "' >" . $prov['empresa'] . "</option>";
                                        }
                                    } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for='situacion' class="col-sm-3 col-form-label">Situacion</label>
                            <div class="col-sm-8">
                                <input type='number' name = 'situacion' id ='situacion' class="form-control" placeholder=""  value="<?php echo $this->tupla['fecha_creacion']?>"  maxlength="2">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for='solicitante' class="col-sm-3 col-form-label">solicitante</label>
                            <div class="col-sm-8">
                                <input type='text' name ='solicitante' id ='solicitante' class="form-control" placeholder=""  value="<?php echo $this->tupla['solicitante']?>"  maxlength="120" >
                            </div>
                        </div>
                            <div class="form-group row">
                            <label for='coste' class="col-sm-3 col-form-label">coste</label>
                            <div class="col-sm-8">
                                <input type='number' name='coste' id='coste' class="form-control" placeholder=""  value="<?php echo $this->tupla['coste']?>"  maxlength="11" >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for='fecha_final' class="col-sm-3 col-form-label">fecha_final</label>
                            <div class="col-sm-8">
                                <input type='date' name='fecha_final' id ='fecha_final' class="form-control"  value="<?php echo $this->tupla['fecha_final']?>" placeholder=''   >
                            </div>
                        </div>

                    </div>
                </div>
                    <button type='submit' name='action' class="btn btn-info edit icon" value="EDIT" id="confirm"></button>
                    <a href='../Controller/OBRAS_Controller.php' class="icon volver ml-3"> </a>


		    </form>

		</div>
		<?php
			include '../View/Footer.php';

		} //fin metodo render

	}

?>

