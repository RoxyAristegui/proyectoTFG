<?php 
class CrearBd_View{
	function __construct(){
    $this->render();
	}

	function render(){

			include '../View/Header.php'; 
?>
			

			<!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block bg-crearbd-image"></div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4"> Crear Base de Datos </h1>
                  </div>
                  <form class="user" name = 'Form' action='../Controller/CrearBD_Controller.php' method='post' >
                  	     <div class="form-group">
                      <input type="text" class="form-control form-control-user mysql_host" id="mysql_host" name="mysql_host" placeholder="mysql_host" >
                    </div>
                    <div class="form-group">
                      <input type="text" class="form-control form-control-user mysql_username" id="mysql_username" name="mysql_username" aria-describedby="" placeholder="mysql_username">
                    </div>
                    <div class="form-group">
                      <input type="text" class="form-control form-control-user mysql_pass" id="mysql_pass" name="mysql_pass" placeholder="mysql_pass" >
                    </div>

                  
                   	<input class="btn btn-outline-info btn-user btn-block" type='submit' name='action' value='crear bd'>
                    <hr>
                   
                  </form>
                  
                
                
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>
							
<?php
	}
}