<?php 

if($_SERVER['REQUEST_METHOD'] === 'POST')
{
	/**
	* Para prevenir o command injection caso não seja possível de usar o * system ou exec, representado nesse comando:
			$command = system($cmd, $return);
	* Use o a função escapeshellcmd, porém apresenta falhas dependendo do comando
	*/
	// $cmd = $_POST['cmd'];
	$cmd = escapeshellcmd($_POST['cmd']);
	var_dump($cmd);
	
	echo "<pre>";
	$command = system($cmd, $return);
	echo "</pre>";
}

?>

<form method="POST">
	<input type="text" name="cmd">
	<button type="submmit">Enviar</button>
</form>
