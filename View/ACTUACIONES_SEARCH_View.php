<?php

class ACTUACIONES_SEARCH{


    function __construct(){
        $this->render();
    }

    function render(){
        include '../View/Header.php'; //header necesita los strings
		?>
        <div class="container">
            <h1 class="BuscarActuacion">Buscar actuación</h1>
            <form name = 'Form' action='../Controller/ACTUACIONES_Controller.php' method='post' ">

                        <div class="form-group row">
                            <label for='codigo_obra' class="col-sm-3 col-form-label">codigo_obra</label>
                            <div class="col-sm-8">
                                 <input type = 'number' name = 'codigo_obra' id = 'codigo_obra' class="form-control"  value="" placeholder = ''  maxlength="11"
                                 >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for='descripcion' class="col-sm-3 col-form-label">descripcion</label>
                            <div class="col-sm-8">
                                <textarea rows='4' name='descripcion' class="form-control" id='nombre'  placeholder='' ></textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for='fecha_actuacion' class="col-sm-3 col-form-label">fecha_actuacion</label>
                            <div class="col-sm-8">
                                <input type='date' name='fecha_actuacion' id ='fecha_actuacion' class="form-control" placeholder='' >
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for='aceptado' class="col-sm-3 col-form-label">aceptado</label>
                            <div class="col-sm-8">
                                <select class="form-control" id="aceptado" name="aceptado" >
                                        <option value="" selected>Seleccione una opcion</option>
                                    <option value="0"> no</option>
                                    <option value="1"> si</option>
                                </select>

                            </div>
                        </div>
                        <div class="form-group row">
                            <label for='cerrado' class="col-sm-3 col-form-label">cerrado</label>
                            <div class="col-sm-8">
                                <select class="form-control" id="cerrado" name="cerrado" >
                                        <option value="" selected>Seleccione una opcion</option>
                                    <option value="0"> no</option>
                                    <option value="1"> si</option>
                                </select>

                            </div>
                        </div>

                    <button type='submit' name='action' class="btn btn-outline-info lupa icon" value="SEARCH" id="confirm"></button>
                    <a href='../Controller/ACTUACIONES_Controller.php' class="icon volver ml-3"> </a>


		    </form>

		</div>
		<?php
			include '../View/Footer.php';

		} //fin metodo render

	}

?>
