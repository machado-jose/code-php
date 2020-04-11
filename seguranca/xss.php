<form method="POST">
	<input type="text" name="busca">
	<button type="submmit">Enviar</button>
</form>

<?php 

/** Somente com esse trecho, é capaz de gerar um XSS
if($_SERVER['REQUEST_METHOD'] == "POST"){
	if(isset($_POST['busca'])) echo $_POST['busca'];
}
*/

//Solução
if($_SERVER['REQUEST_METHOD'] == "POST"){
	//if(isset($_POST['busca'])) echo strip_tags($_POST['busca']);
	//ou
	if(isset($_POST['busca'])) echo htmlentities($_POST['busca']);
}
?>