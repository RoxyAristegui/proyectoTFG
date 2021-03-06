<?php

	class Register{


		function __construct(){	
			$this->render();
		}

		function render(){

			include '../View/Header.php'; //header necesita los strings
		?>
		
	 <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
          <div class="col-lg-7">
            <div class="p-5">
                <div class="text-center">
                	<h1 class="h4 text-gray-900 mb-4 NuevoUsuario">Nuevo usuario</h1>
                </div>
				<form class="user" name = 'Form' action='../Controller/Register_Controller.php' method='post' onsubmit="return comprobar_registro();">
					
					<div class="form-group">
					  <input type = 'text' name = 'login' id = 'login' class="form-control form-control-user"  placeholder = "Login" size = '9' value = '' onblur="esNoVacio('login')" >
					 </div>
					<div class="form-group">
					  <input type = 'text' name = 'dni' id = 'dni' class="form-control form-control-user"  placeholder = "DNI" size = '9' value = '' onblur="esNoVacio('dni')  && comprobarDni('dni')" >
					 </div>
					 <div class="form-group">
						<input type = 'text' name = 'password' id = 'password' class="form-control form-control-user"  placeholder ="password" size = '15' value = '' onblur="esNoVacio('password')  && comprobarLetrasNumeros('password',15)" >
					</div>

					 <div class="form-group">
						 <input type = 'text' name = 'email' id = email' class="form-control form-control-user"  placeholder="email" size = '40' value = '' onblur="esNoVacio('email')  && comprobarEmail('email')" >
					</div>
					<div class="form-group row">
					 	<div class="col-md-6 col-xs-12">
							<input type = 'text' name = 'nombre' id = 'nombre' class="form-control form-control-user"  placeholder = "nombre" size = '30' value = '' onblur="esNoVacio('nombre')  && comprobarSoloLetras('nombre',30)" ></div>
							<div class="col-md-6 col-xs-12">
							<input type = 'text' name = 'apellidos' id = 'apellidos' class="form-control form-control-user"  placeholder = "apellidos" size = '50' value = '' onblur="esNoVacio('apellidos')  && comprobarSoloLetras('apellidos',50)" >
						</div>
					</div>
						<input type='submit' name='action' value="Registrar" class="btn btn-outline-info btn-user btn-block Registrar">

				</form>
				
		
				<div class="text-center">
	                <a class="small YaTienesCuentaInicia" href='../Controller/Index_Controller.php'>Ya tienes una cuenta? inicia sesión</a>
	            </div>
			
		    </div>
          </div>
        </div>
      </div>
    </div>
   





		<?php
			include '../View/Footer.php';
		} //fin metodo render

	} //fin REGISTER

?>

	
