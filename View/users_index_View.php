<?php

class Index {

	function __construct(){
		$this->render();
	}

	function render(){
	
		include '../View/Header.php';
?>
<div class="row">
		<H1 class="Bienvenido display-3 mx-auto"> </H1>
	</div>
	<div class="row">
		<h2 class="display-4 mx-auto"><?php echo $_SESSION['login'] ?></h2>
		</div>

<?php
		include '../View/Footer.php';
	}

}

?>