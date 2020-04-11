<?php 

	require_once("config/config.php");

	/* Carrega um usuário a partir do seu ID

	$root = new User();

	$root->loadById(2);

	echo $root;*/

	//Lista todos os usuários no BD
	//echo json_encode(User::getList());

	//Pesquisa todos os usuários que começam com o login fornecido
	//echo json_encode(User::search("gu"));

	//Login do Usuário
	//$user = new User();
	//$user->login("maria","12345");
	//echo $user;

	//Inserir um novo usuário
	//$newUser = new User("Santiago","sant");
	//$newUser->insert();
	//echo $newUser;

	//Atualizando o login e senha do usuário
	/*$user = new User();
	$user->loadById(3);
	echo $user."<br>";
	echo "=========================<br>";
	$user->update("gustavo","123");
	echo $user;*/

	//Deletando um usuario no BD
	$user = new User();
	$user->loadById(6);
	$user->delete();
	echo $user;

?>