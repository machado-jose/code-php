<?php 

	class User{

		private $idUser;
		private $login;
		private $password;
		private $dtRegister;

		public function __construct($login="",$password=""){
			$this->setLogin($login);
			$this->setPassword($password);
		}

		private function setIdUser($idUser){
			$this->idUser = $idUser;
		}

		private function setLogin($login){
			$this->login = $login;
		}

		private function setPassword($password){
			$this->password = $password;
		}

		private function setDtRegister($dtRegister){
			$this->dtRegister = $dtRegister;
		}

		public function getIdUser(){
			return $this->idUser;
		}

		public function getLogin(){
			return $this->login;
		}

		public function getPassword(){
			return $this->password;
		}

		public function getDtRegister(){
			return $this->dtRegister;
		}

		public static function getList(){

			$sql = new Sql();

			return $sql->select("SELECT * FROM tb_usuario ORDER BY deslogin");

		}

		public static function search($search){

			$sql = new Sql();

			return $sql->select("SELECT * FROM tb_usuario WHERE deslogin LIKE :SEARCH ORDER BY deslogin",array(
					":SEARCH"=>"%".$search."%"
				));

		}

		private function setData($data){

			$this->setIdUser($data["idusuario"]);
			$this->setLogin($data["deslogin"]);
			$this->setPassword($data["dessenha"]);
			$this->setDtRegister(new DateTime($data["dtcadastro"]));

		}

		public function login($login,$password){

			$sql = new Sql();
			$result = $sql->select("SELECT * FROM tb_usuario WHERE deslogin = :LOGIN AND dessenha = :PASSWORD", array(
					":LOGIN"=>$login,
					":PASSWORD"=>$password
			));

			if(count($result)>0){

				$this->setData($result[0]);

			}else{

				throw new Exception("Login e/ou Senha inválidos.", 1);
				
			}

		} 

		public function loadById($idUser){

			$sql = new Sql();
			$result = $sql->select("SELECT * FROM tb_usuario WHERE idusuario = :ID", array(":ID"=>$idUser));

			if(count($result)>0){

				$this->setData($result[0]);

			}

		}

		public function update($newLogin,$newPassword){

			$sql = new Sql();

			$this->setLogin($newLogin);
			$this->setPassword($newPassword);

			$sql->query("UPDATE tb_usuario SET deslogin = :LOGIN, dessenha = :PASSWORD WHERE idusuario = :ID",array(

					":LOGIN"=>$this->getLogin(),
					":PASSWORD"=>$this->getPassword(),
					":ID"=>$this->getIdUser()

			));
		}

		public function insert(){

			$sql = new Sql();

			$result = $sql->select("CALL sp_user_insert(:LOGIN,:PASSWORD)",array(

					":LOGIN"=>$this->getLogin(),
					":PASSWORD"=>$this->getPassword()

			));

			if(count($result) > 0){

				$this->setData($result[0]);

			}else{

				throw new Exception("Erro ao inserir usuário", 1);			

			}

		}

		public function delete(){

			$sql = new Sql();

			$sql->query("DELETE FROM tb_usuario WHERE idusuario = :ID",array(":ID"=>$this->getIdUser()));

			$this->resetUser();

		}

		private function resetUser(){
			$this->setIdUser(0);
			$this->setLogin("");
			$this->setPassword("");
			$this->setDtRegister(new DateTime());
		}

		public function __toString(){

			return json_encode(array(

				"idusuario"=>$this->getIdUser(),
				"deslogin"=>$this->getLogin(),
				"dessenha"=>$this->getPassword(),
				"dtcadastro"=>$this->getDtRegister()->format('d-m-Y h:i:s')

			));

		}

	}

?>