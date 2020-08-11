<?php

class Trabajadores_View{
    var $tupla;
    var $trabajadores;

    function __construct($tupla,$trabajadores){
        $this->tupla=$tupla;
        $this->trabajadores=$trabajadores;
        $this->render();
    }

    function render(){
        include '../View/Header.php'; //header necesita los strings
		?>
        <div class="container">
            <h1 class="AnhadirTrabajador">Añadir trabajadores</h1>
            <form name = 'Form' action='../Controller/TRABAJADORES_Controller.php' method='post' ">
            <div class="row">
                <div class="col-lg-6">
                        <div class="form-group row">
                            <div class="col-lg-6 row">
                                <label for='codigo_obra' class="col-sm-3 col-form-label">codigo_obra</label>
                                <div class="col-sm-9">
                                     <input type = 'number' name = 'codigo_obra' id = 'codigo_obra' class="form-control-plaintext"  value="<?php echo $this->tupla['codigo_obra'] ?>" placeholder = ''  maxlength="11"
                                     readonly>
                                </div>
                            </div>
                            <div class="col-lg-6 row">
                                <label for='id_acto' class="col-sm-3 col-form-label">id_acto</label>
                                <div class="col-sm-8">
                                    <input type = 'number' name='id_acto' class="form-control-plaintext"  id='id_acto'  value="<?php echo $this->tupla['id_acto'] ?>" placeholder='' readonly>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for='fecha' class="col-sm-3 col-form-label">fecha</label>
                            <div class="col-sm-8">
                                <input type='date' name='fecha_actuacion' id ='fecha'  value="<?php echo $this->tupla['fecha_actuacion'] ?>" class="form-control-plaintext"  placeholder=''  readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for='descripcion' class="col-sm-3 col-form-label">descripcion</label>
                            <div class="col-sm-8">
                                <textarea  name='descripcion' class="form-control-plaintext" id='descripcion'  placeholder='' readonly><?php echo $this->tupla['descripcion'] ?></textarea>
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

                                             <p class="card-text mb-0 "> <?php echo $trabajador['DNI'] ?></p>
                                             <a href="../Controller/TRABAJADORES_Controller.php?action=DELETE&codigo_obra=<?php echo $this->tupla['codigo_obra']."&id_acto=".$this->tupla['id_acto']."&DNI=".$trabajador['DNI'] ?>"><i class="fas fa-times float-right"></i></a>
                                             <p class="card-text"><?php echo $trabajador['nombre_completo'] ?></p>


                                         </li>
                                         <?php
                                     }
    } ?>
                                 </ul>
                            </div>
                        </div>
                </div>
                <div class="col-lg-6">
                      <div class="card  shadow">
                          <div class="card-header bg-gradient-danger text-light AnhadirTrabajador">
                              Añadir trabajador
                          </div>
                          <div class="card-body card ">
                              <div class="form-group row">
                                  <div class="col-sm-12">
                                      <input type="text" id="nombre_completo" name="nombre_completo" placeholder="nombreCompleto" class="form-control">
                                  </div>
                              </div>
                              <div class="form-group row mb-0">
                                  <div class="col-sm-6">
                                      <input type="text" id="DNI" name="DNI" class="form-control" placeholder="dni">
                                  </div>
                                  <div class="col-sm-6">
                                      <button type='submit' name='action' value="ADD"  class="btn btn-info icon mas" ></button>
                                  </div>
                              </div>
                          </div>
                      </div>
                </div>
            </div>

		    </form>

                    <?php

                    if(!isset($this->trabajadores['code'])){ ?>
                    <a href='../Controller/ACTUACIONES_Controller.php?action=SHOWCURRENT&codigo_obra=<?php echo $this->tupla['codigo_obra']."&id_acto=".$this->tupla['id_acto']?>' class="icon btn btn-outline-info ml-3 check"> </a>

 <?php }
                    ?>
		</div>
		<?php
			include '../View/Footer.php';

		} //fin metodo render

	}

?>
