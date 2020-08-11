<?php

class COMENTARIOS_ADD{
    var $codigo_obra;
    var $id_acto;

    function __construct($codigo_obra,$id_acto){
        $this->codigo_obra=$codigo_obra;
        $this->id_acto=$id_acto;
        $this->render();
    }

    function render(){
        include '../View/Header.php'; //header necesita los strings

		?>
        <div class="container">
            <h1 class="AnhadirComentario">Añadir Comentario</h1>
            <form name = 'Form' action='../Controller/ACTUACIONES_Controller.php' method='post' enctype="multipart/form-data">

                       <div class="form-group row">
                             <div class="col-lg-6 row">
                                <label for='obra' class="col-sm-3 col-form-label">obra</label>
                                <div class="col-sm-8">
                                     <input type = 'number' name = 'codigo_obra' id = 'obra' class="form-control-plaintext" placeholder = ''  maxlength="11"
                                     value="<?php echo $this->codigo_obra ?>" readonly>
                                </div>
                            </div>
                            <div class="col-lg-6 row">
                                <label for='id_acto' class="col-sm-3 col-form-label">id_acto</label>
                                <div class="col-sm-8">
                                     <input type = 'number' name = 'id_acto' id = 'id_acto' class="form-control-plaintext" placeholder = ''  maxlength="11"
                                     value="<?php echo $this->id_acto ?>" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for='descripcion' class="col-sm-3 col-form-label">descripcion</label>
                            <div class="col-sm-8">
                                <textarea rows='4' name='descripcion' class="form-control" id='nombre'  placeholder='' required></textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for='imagen' class="col-sm-3 col-form-label">imagen</label>
                            <div class="col-sm-8">
                                <input type='file' name='imagen' id ='imagen' class="form-control-plaintext" value="">
                            </div>
                        </div>


                    <button type='submit' name='action' class="btn btn-outline-info check icon" value="ADDcoment" id="confirm"></button>
                    <a href="ACTUACIONES_Controller.php?action=SHOWCURRENT&codigo_obra=<?php echo $this->codigo_obra."&id_acto=".$this->id_acto ?>" class="icon volver ml-3"> </a>


		    </form>

		</div>
		<?php
			include '../View/Footer.php';

		} //fin metodo render

	}

?>

<?php
