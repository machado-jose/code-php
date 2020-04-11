<?php 

/** Código vulnerável ao SQL injection
$id = isset($_GET['id']) ? $_GET['id'] : 2;

$conn = mysqli_connect('127.0.0.1', 'root', 'root', 'db_php7');
$sql = "SELECT * FROM tb_usuario WHERE idusuario = $id";
$exec = mysqli_query($conn, $sql);

while($resultado = mysqli_fetch_object($exec))
{
	var_dump($resultado);
}
*/

$id = isset($_GET['id']) ? $_GET['id'] : 2;

//Solução
if(!is_numeric($id) || strlen($id) > 5) exit("Pegamos você!");

$conn = mysqli_connect('127.0.0.1', 'root', 'root', 'db_php7');
$sql = "SELECT * FROM tb_usuario WHERE idusuario = $id";
$exec = mysqli_query($conn, $sql);

while($resultado = mysqli_fetch_object($exec))
{
	var_dump($resultado);
}

?>