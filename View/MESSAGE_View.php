<?php
/*
---Vista de mensajes de error
el string de errores puede traer un array de arrays, un array, o un string.--
*/

class MESSAGE{

	private $string; 
	private $volver;

	function __construct($string, $volver){
		$this->string = $string;
		$this->volver = $volver;	
		$this->render();
	}

	function render(){

		include '../View/Header.php';

		//comprobar primero si es un array de arrays
		if(isset($this->string[0]['code'])){ 

			foreach($this->string as $error){ 
				?>
				 <?php echo "<div class='".$error['code']."'>";?> 
			

				</div>
				<?php	
			}		
		 //Si a la vista MESSAGE llega un array simple
		}elseif(isset($this->string['code'])){

			 echo "<div class='".$this->string['code']."'> </div>"; 
		}else{
			//si llega solo un string
				 echo "<div class='".$this->string."'> </div>"; 
		}
	
		echo '<a href=\'' . $this->volver . "' class='volver'> Volver </a>";
		include '../View/Footer.php';
	} //fin metodo render

}
