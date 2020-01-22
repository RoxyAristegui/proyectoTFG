<?php

	class Login{


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
              <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4"><?php echo $strings['Login']; ?></h1>
                  </div>
                  <form class="user" name = 'Form' action='../Controller/Login_Controller.php' method='post' onsubmit="return comprobar_login();">
                    <div class="form-group">
                      <input type="text" class="form-control form-control-user" id="SignInLogin" name="login" aria-describedby="emailHelp" placeholder="Enter Email Address...">
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" id="SignInInputPassword" name="password" placeholder="Password"  onblur="esNoVacio('password')  && comprobarLetrasNumeros('password',15)" >
                    </div>
                  
                   	<input class="btn btn-primary btn-user btn-block" type='submit' name='action' value='Login'>
                    <hr>
                   
                  </form>
                  <hr>
                
                  <div class="text-center">
                    <a class="small" href="../Controller/Register_Controller.php">Create an Account!</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>
							
<?php
			include '../View/Footer.php';
		} //fin metodo render

	} //fin Login

?>
