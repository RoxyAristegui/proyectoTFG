<?php

class MESSAGE{

	private $string; 
	private $volver;

	function __construct($string, $volver){
		$this->string = $string;
		$this->volver = $volver;	
		$this->render();
	}

	function render(){

		include '../Locale/Strings_'.$_SESSION['idioma'].'.php';
		include '../View/Header.php';

	//	<div class="container-fluid">
	var_dump($this->string);
			if(isset($this->string[0]['code'])){ 

		
				foreach($this->string as $error){ //Si a la vista MESSAGE llega un array
					?>
					<div class=" <?php echo $error['code']; ?> ">
					<?php
					echo $strings[$error['code']];
					
					?> 

					</div>
					<?php	
				}		

			}else{ //Si a la vista MESSAGE llega un array simple
						?>
				<div class=' <?php echo $this->string; ?> '>
					<?php
				
						echo $strings[$this->string['code']];
					
					?> 

					</div>
					<?php	
			}
				
			
		?>


<?php

		echo '<a href=\'' . $this->volver . "'>" . $strings['Volver'] . " </a>";
		include '../View/Footer.php';
	} //fin metodo render

}
