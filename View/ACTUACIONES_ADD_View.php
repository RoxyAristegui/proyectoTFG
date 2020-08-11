<?php

class ACTUACIONES_ADD{
    var $codigo_obra;

    function __construct($codigo_obra){
        $this->codigo_obra=$codigo_obra;
        $this->render();
    }

    function render(){
        include '../View/Header.php'; //header necesita los strings
		?>
        <div class="container">
            <h1 class="AnhadirActuacion">Añadir actuacion</h1>
            <form name = 'Form' action='../Controller/ACTUACIONES_Controller.php' method='post' ">

                        <div class="form-group row">
                            <label for='codigo_obra' class="col-sm-3 col-form-label">codigo_obra</label>
                            <div class="col-sm-8">
                                 <input type = 'number' name = 'codigo_obra' id = 'codigo_obra' class="form-control"  value="<?php echo $this->codigo_obra ?>" placeholder = ''  maxlength="11"
                                 readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for='descripcion' class="col-sm-3 col-form-label">descripcion</label>
                            <div class="col-sm-8">
                                <textarea rows='4' name='descripcion' class="form-control" id='nombre'  placeholder='' required></textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for='fecha_actuacion' class="col-sm-3 col-form-label">fecha_actuacion</label>
                            <div class="col-sm-8">
                                <input type='date' name='fecha_actuacion' id ='fecha_actuacion' class="form-control" placeholder=''  required>
                            </div>
                        </div>


                    <button type='submit' name='action' class="btn btn-outline-info check icon" value="ADD" id="confirm"></button>
                    <a href='../Controller/ACTUACIONES_Controller.php' class="icon volver ml-3"> </a>


		    </form>

		</div>
		<?php
			include '../View/Footer.php';

		} //fin metodo render

	}

?>

<?php
