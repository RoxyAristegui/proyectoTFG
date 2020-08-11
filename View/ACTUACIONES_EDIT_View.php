<?php

class ACTUACIONES_EDIT{

    var $tupla;

    function __construct($tupla){

        $this->tupla=$tupla;
        $this->render();
    }

    function render(){
        include '../View/Header.php'; //header necesita los strings
		?>
        <div class="container">
            <h1 class="EditarActuacion">Editar actuacion</h1>
            <form name = 'Form' action='../Controller/ACTUACIONES_Controller.php' method='post' ">

                        <div class="form-group row">
                            <label for='codigo_obra' class="col-sm-3 col-form-label">codigo_obra</label>
                            <div class="col-sm-8">
                                 <input type = 'number' name = 'codigo_obra' id = 'codigo_obra' class="form-control" placeholder = ''  maxlength="11"
                                 value="<?php echo $this->tupla['codigo_obra'] ?>" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for='id_acto' class="col-sm-3 col-form-label">id_acto</label>
                            <div class="col-sm-8">
                                 <input type = 'number' name = 'id_acto' id = 'id_acto' class="form-control" placeholder = ''  maxlength="11"
                                 value="<?php echo $this->tupla['id_acto'] ?>" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for='descripcion' class="col-sm-3 col-form-label">descripcion</label>
                            <div class="col-sm-8">
                                <textarea rows='4' name='descripcion' class="form-control" id='nombre'  placeholder='' required><?php echo $this->tupla['descripcion'] ?></textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for='fecha_actuacion' class="col-sm-3 col-form-label">fecha_actuacion</label>
                            <div class="col-sm-8">
                                <input type='date' name='fecha_actuacion' id ='fecha_actuacion' class="form-control"  value="<?php echo $this->tupla['fecha_actuacion'] ?>" placeholder=''  >
                            </div>
                        </div>
                    </div>

                        <button type='submit' name='action' class="btn btn-info edit icon" value="EDIT" id="confirm"></button>
                        <a href='../Controller/ACTUACIONES_Controller.php?codigo_obra=<?php echo $this->tupla['codigo_obra'] ?>' class="icon volver ml-3"> </a>

		    </form>

		</div>
		<?php
			include '../View/Footer.php';

		} //fin metodo render

	}

?>

