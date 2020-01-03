<?php

	class USUARIOS_SHOWCURRENT{


		function __construct($tupla){	
			$this->tupla = $tupla;
			$this->render();
		}

		function render(){

			include '../View/Header.php'; //header necesita los strings
		?>
			<h1><?php echo $strings['SHOWCURRENT']; ?></h1>	
			<form name = 'Form' action='../Controller/USUARIOS_Controller.php' method='post' onsubmit="return comprobar_registro();"">
			
				 	Login : <input type = 'text' name = 'login' id = 'login' placeholder = 'Utiliza tu dni' size = '9' value = '<?php echo $this->tupla['login']; ?>' onblur="esNoVacio('login')  && comprobarDni('login')" readonly><br>

					Password : <input type = 'text' name = 'password' id = 'password' placeholder = 'letras y numeros' size = '15' value = '<?php echo $this->tupla['password']; ?>' onblur="esNoVacio('password')  && comprobarLetrasNumeros('password',15)" readonly><br>

					Nombre : <input type = 'text' name = 'nombre' id = 'nombre' placeholder = 'Solo letras' size = '30' value = '<?php echo $this->tupla['nombre']; ?>' onblur="esNoVacio('nombre')  && comprobarSoloLetras('nombre',30)" readonly><br>

					Apellidos : <input type = 'text' name = 'apellidos' id = 'apellidos' placeholder = 'Solo letras' size = '50' value = '<?php echo $this->tupla['apellidos']; ?>' onblur="esNoVacio('apellidos')  && comprobarSoloLetras('apellidos',50)" readonly><br>

					Email : <input type = 'text' name = 'email' id = 'email' size = '40' value = '<?php echo $this->tupla['email']; ?>' onblur="esNoVacio('email')  && comprobarEmail('email')" readonly><br>

		
			</form>
				
		
			<a href='../Controller/USUARIOS_Controller.php'>Volver </a>
		
		<?php
			include '../View/Footer.php';
		} //fin metodo render

	} //fin REGISTER

?>

	