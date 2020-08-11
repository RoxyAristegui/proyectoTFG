<?php

class OBRAS_SHOWCURRENT{
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
		<h1 class="VerObra">Ver obra</h1>
		<form name = 'Form' action='../Controller/OBRAS_Controller.php' method='post' onsubmit="confirmar()">
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group row mb-0">
                        <label for='codigo_obra' class="col-sm-4 col-form-label">codigo_obra</label>
                        <div class="col-sm-8 col-lg-8">
                             <input type = 'number' name = 'codigo_obra' id = 'codigo_obra' class="form-control-plaintext" placeholder = 'intoduceElCodigoDeLaObra'  maxlength="11"
                             value="<?php echo $this->tupla['codigo_obra'] ?>" readonly>
                        </div>
                    </div>
                    <div class="form-group row mb-0">
                        <label for='nombre' class="col-sm-4 col-form-label">Nombre</label>
                        <div class="col-sm-8">
                            <textarea rows='4' name='nombre' class="form-control-plaintext" id='nombre'  value=""  placeholder='' readonly><?php echo $this->tupla['nombre'] ?></textarea>
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <label for='codigo_area' class="col-sm-4 col-form-label">Area</label>
                        <div class="col-sm-8">
                              <?php
                               foreach($this->listaAreas as $area){

					                if($this->tupla['codigo_area']==""){
                                        echo   "<input type='text' name='CIF' id='CIF' class='form-control-plaintext' placeholder=''  value=''  readonly>";
                                    }else if($this->tupla['codigo_area']==$area['codigo_area']){?>
                                        <input type='text' name='CIF' id='CIF' class='form-control-plaintext' placeholder=""  value="<?php echo $area['nombre'] ?>"  readonly>
				                     <?php
                                     }
					        	} ?>
				        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <label for='fecha_creacion' class="col-md-4 col-form-label">fecha_creacion</label>
                        <div class="col-sm-8">
                            <input type='date' name='fecha_creacion' id ='fecha_creacion' class="form-control-plaintext" placeholder=''  value="<?php echo date( $this->tupla['fecha_creacion']) ?>"   readonly>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                        <div class="form-group row mb-0">
                        <label for='Proveedor' class="col-sm-4 col-form-label">Proveedor</label>
                        <div class="col-sm-8">

                            <?php

                            foreach($this->listaProveedores as $prov){
                                 if($this->tupla['CIF']==""){ ?>
                                     <input type="text" name="CIF" id="CIF" class="form-control-plaintext" placeholder="" readonly>
                                     <?php }else
                                if($this->tupla['CIF']==$prov['CIF']){?>
                                    <input type='text' name='CIF' id='CIF' class='form-control-plaintext' placeholder=""  value="<?php echo $prov['empresa'] ?>"  readonly>
                                <?php
                                }
                            } ?>

                        </div>
                    </div>
                    <div class="form-group row mb-0">
                        <label for='situacion' class="col-sm-4 col-form-label">Situacion</label>
                        <div class="col-sm-8">
                            <input type='number' name = 'situacion' id ='situacion' class="form-control-plaintext" placeholder=""  value="<?php echo $this->tupla['situacion'] ?>"  maxlength="2" readonly>
                        </div>
                    </div>
                    <div class="form-group row mb-0">
                        <label for='solicitante' class="col-sm-4 col-form-label">solicitante</label>
                        <div class="col-sm-8">
                            <input type='text' name ='solicitante' id ='solicitante' class="form-control-plaintext" placeholder=""  value="<?php echo $this->tupla['solicitante'] ?>"  maxlength="120" readonly>
                        </div>
                    </div>
                    <div class="form-group row mb-0">
                        <label for='coste' class="col-sm-4 col-form-label">coste</label>
                        <div class="col-sm-8">
                            <input type='number' name='coste' id='coste' class="form-control-plaintext" placeholder=""  value="<?php echo $this->tupla['coste'] ?>"  maxlength="11" readonly>
                        </div>
                    </div>

                     <div class="form-group row ">
                        <label for='fecha_final' class="col-sm-4 col-form-label">fecha_final</label>
                        <div class="col-sm-8">
                            <input type='date' name='fecha_final' id ='fecha_final' class="form-control-plaintext" placeholder=''  value="<?php echo date( $this->tupla['fecha_final']) ?>" readonly >
                        </div>
                    </div>

                </div>


            </div>
        </form>
<div class="clearfix col-lg-12 pl-0">
    <?php if($_SESSION['rol']=='1'|| $_SESSION['rol']=='3'){ ?>
    <div class="col-lg-6 float-right pl-0 mb-2">
        <a href="../Controller/OBRAS_Controller.php?action=EDIT&codigo_obra=<?php echo $this->tupla['codigo_obra']?>" class="btn btn-outline-info edit icon"></a>
        <a href="../Controller/OBRAS_Controller.php?action=DELETE&codigo_obra=<?php echo $this->tupla['codigo_obra']?>" class="btn btn-outline-info delete icon"></a>
    </div>
    <?php } ?>
    <div class="col-lg-6 float-left pl-0 mb-2">
          <a href="../Controller/ACTUACIONES_Controller.php?codigo_obra=<?php echo $this->tupla['codigo_obra']?>" class="btn btn-info Actuaciones icon"><i class="fas fa-list-ul"></i> Actuaciones</a>

            <a href='../Controller/OBRAS_Controller.php' class="icon volver ml-3"> </a>
    </div>
</div>


		</div>
		<?php
			include '../View/Footer.php';

		} //fin metodo render

	}

?>

