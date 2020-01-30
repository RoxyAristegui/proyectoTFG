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
?>
		<div class="container-fluid">
<?php	var_dump($this->string);
			if(isset($this->string[0])){
					
					echo count($this->string);
				echo "Hola estoy en el array ";
			
			foreach($this->string as $error){ //Si a la vista MESSAGE llega un array
				?>
				<span class='<?php echo $error["code"]; ?> '>
				<?php
				echo $strings["Error en "].$strings[$error["resource"]]." : ".$strings[$error["code"]];
				
				?> 

				</span>
				<?php
				
			}
		}elseif(is_array($this->string)){ ?>
			<span class='<?php echo $this->string["code"]; ?> '>
				<?php
				if($this->string["ok"]){
					echo $strings[$this->string["code"]];
				}else{
				echo $strings["Error en "].$strings[$this->string["resource"]]." : ".$strings[$this->string["code"]];
				}
				?> 

				</span>
				<?php
		}else{ //Si a la vista MESSAGE llega un único mensaje
			?>
			<span class="<?php echo $strings[$this->string]; ?>">
				<?php
				var_dump($this->string);
				echo $strings[$this->string];
				?>
			</span>
			<?php
		}
		?>
		</div>

<?php

		echo '<a href=\'' . $this->volver . "'>" . $strings['Volver'] . " </a>";
		include '../View/Footer.php';
	} //fin metodo render

}
