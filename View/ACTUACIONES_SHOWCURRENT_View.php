<?php

class ACTUACIONES_SHOWCURRENT{

    var $tupla;
    var $trabajadores;
    var $comentarios;

    function __construct($tupla,$trabajadores,$comentarios){

        $this->tupla=$tupla;
        $this->trabajadores=$trabajadores;
        $this->comentarios=$comentarios;
        $this->render();
    }

    function render(){
        include '../View/Header.php'; //header necesita los strings
		?>
        <div class="container">
            <h1 class="MostrarActuacion">Mostrar actuacion</h1>
            <form name = 'Form' action='../Controller/ACTUACIONES_Controller.php?action=ACEPT' method='post' ">
                 <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group row">
                             <div class="col-lg-6 row">
                                <label for='obra' class="col-sm-3 col-form-label">obra</label>
                                <div class="col-sm-8">
                                     <input type = 'number' name = 'codigo_obra' id = 'obra' class="form-control-plaintext" placeholder = ''  maxlength="11"
                                     value="<?php echo $this->tupla['codigo_obra'] ?>" readonly>
                                </div>
                            </div>
                            <div class="col-lg-6 row">
                                <label for='id_acto' class="col-sm-3 col-form-label">id_acto</label>
                                <div class="col-sm-8">
                                     <input type = 'number' name = 'id_acto' id = 'id_acto' class="form-control-plaintext" placeholder = ''  maxlength="11"
                                     value="<?php echo $this->tupla['id_acto'] ?>" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for='descripcion' class="col-sm-3 col-form-label">descripcion</label>
                            <div class="col-sm-8">
                                <textarea rows='4' name='descripcion' class="form-control-plaintext" id='nombre'  placeholder='' readonly> <?php echo $this->tupla['descripcion'] ?> </textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for='fecha_actuacion' class="col-sm-3 col-form-label">fecha</label>
                            <div class="col-sm-8">
                                <input type='date' name='fecha_actuacion' id ='fecha_actuacion' class="form-control-plaintext" placeholder=''  value="<?php echo $this->tupla['fecha_actuacion'] ?>"   readonly>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for='trabajadores' class="col-sm-3 col-form-label">trabajadores</label>
                            <div class="col-sm-8">

                                 <ul class="list-group list-group-flush">
                                     <?php

                                     if(isset($this->trabajadores['code'])){
                                         //no hay trabajadores todavia
                                         echo "<li class='list-group-item red text-lowercase ".$this->trabajadores['code']."'></li>";
                                     }else{

                                         foreach($this->trabajadores as $trabajador) {
                                             ?>
                                             <li class="list-group-item">
                                                 <p class="card-text mb-0"> <?php echo $trabajador['DNI'] ?></p>
                                                 <p class="card-text"><?php echo $trabajador['nombre_completo'] ?></p>
                                             </li>
                                             <?php
                                         }
                                     } ?>
                                 </ul>
                            </div>
                        </div>
            <?php //admin y proveedor pueden editar las actuaciones y añadir trabajadores mientras la actuacion no esté cerrada
                if(($_SESSION['rol']=='4' && $this->tupla['aceptado']=='0'  && $this->tupla['cerrado']!='0')|| $_SESSION['rol']=='1'){ ?>
                    <!--boton editar-->
                    <a  class="btn btn-outline-info edit icon" href="../Controller/ACTUACIONES_Controller.php?action=EDIT&codigo_obra=<?php echo $this->tupla['codigo_obra']?>&id_acto=<?php echo $this->tupla['id_acto']?>" id="edit" >Datos</a>
                    <!--boton añadir trabajador-->
                    <a  class="btn btn-outline-info addUser icon trabajadores" href="../Controller/TRABAJADORES_Controller.php?codigo_obra=<?php echo $this->tupla['codigo_obra']?>&id_acto=<?php echo $this->tupla['id_acto']?>" >Trabajadores</a>

                <?php }
                //admin y responsable  pueden eliminar las actuaciones
                if($_SESSION['rol']=='3'|| $_SESSION['rol']=='1'){  ?>
                     <!--boton eliminar-->
                     <a  class="btn btn-outline-info delete icon" href="../Controller/ACTUACIONES_Controller.php?action=DELETE&codigo_obra=<?php echo $this->tupla['codigo_obra']?>&id_acto=<?php echo $this->tupla['id_acto']?>" id="delete" ></a>
             
                <?php } //solo se pueden añadir comentrios si no se ha cerrado la actución
                if($this->tupla['cerrado'] =='0'){ ?>
                     <!--boton añadir comentario-->
                 <a  class="btn btn-outline-info mas icon comentario" href="../Controller/ACTUACIONES_Controller.php?action=ADDcoment&codigo_obra=<?php echo $this->tupla['codigo_obra']?>&id_acto=<?php echo $this->tupla['id_acto']?>" id="ADDcoment" >Comentario</a>
               <?php
                }?>

                 <!--boton volver-->
                <a href='../Controller/ACTUACIONES_Controller.php?codigo_obra=<?php echo $this->tupla['codigo_obra']?>' class="icon volver ml-3"> </a>

                    </div>
                     <div class="col-lg-6">
                         <?php
                         if($_SESSION['rol']=='4'){
                             $disable="disabled";
                         }else{$disable='';}
                         $check="";
                         $estado="pendiente";
                         if($this->tupla['aceptado']=='1'){
                             $check="checked";
                             $estado="aceptado";
                         }
                         ?>
                         <div class="btn mt-2 mb-2">
                             <div class="custom-control custom-switch switch-green">
                                 <input type="checkbox" class="custom-control-input"  id="aceptado" name="aceptado" value="<?php echo $this->tupla['aceptado'] ?>" <?php echo $check." ".$disable ?> >
                                 <label class="custom-control-label <?php echo $estado ?>" for="aceptado">  </label>
                             </div>
                         </div>
                         <div class="comentarios ">
                             <?php
                             if(!isset($this->comentarios['code'])) {
                                 foreach ($this->comentarios as $comentario) {
                                     ?>
                                     <div class="card mb-3 border-left-info" style="max-width: 540px;">
                                         <div class="row no-gutters">
                                             <div class="col-md-4"><?php if ($comentario['fotos'] != '') { ?>
                                                     <img src="<?php echo $comentario['fotos'] ?>" class="card-img"
                                                          alt="...">
                                                 <?php } ?>
                                             </div>
                                             <div class="col-md-8">
                                                 <div class="card-body">
                                                     <p class="card-text"><?php echo $comentario['descripcion'] ?></p>
                                                     <p class="card-text"><small
                                                                 class="blockquote-footer"><?php echo $comentario['login'] ?></small>
                                                     </p>
                                                 </div>
                                             </div>
                                         </div>
                                     </div>


                                 <?php }
                                 //boton de cerrar actuación
                                 if($this->tupla['cerrado'] =='0' && $_SESSION['rol']!='4'){
                                    echo "<a class='btn btn-danger btn-block FinalizarActuacion' href='../Controller/ACTUACIONES_Controller.php?action=CLOSE&codigo_obra=".$this->tupla['codigo_obra']."&id_acto=".$this->tupla['id_acto']."'>Finalizar Actuación</a>";
                                 }else if($this->tupla['cerrado'] =='1' ){
                                    echo "<div class='btn border-danger red btn-block ActuacionFinalizada' >Actuación Finalizada</a>";

                                 }
                             } ?>
                         </div>


                     </div>

                 </div>

		    </form>

        </div>
		<?php
			include '../View/Footer.php';
?>

        <script>
            $("#aceptado").change(function(){
            if($("#aceptado").prop("checked")){
                $("#aceptado").val('1');

            }
            setLang();
            $("form").submit()
            })
        </script>
        <?php
		} //fin metodo render

	}

?>

<?php
