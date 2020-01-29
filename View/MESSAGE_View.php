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
		<br>
		<br>
		<br>
		<p>
		<H3>
<?php	
			if(is_array($this->string)){
				echo "Hola estoy en el array ";
					//var_dump($this->string);
			foreach($this->string as $error){ //Si a la vista MESSAGE llega un array
				?>
				<span class="<?php echo $error; ?>">
				<?php
				echo $strings["Error en "].$strings[$error["campo"]]." : ".$strings[$error["codigo"]];
				
				?> 

				</span><br>
				<?php
				
			}
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
		</H3>
		</p>
		<br>
		<br>
		<br>

<?php

		echo '<a href=\'' . $this->volver . "'>" . $strings['Volver'] . " </a>";
		include '../View/Footer.php';
	} //fin metodo render

}
