<?php 

	class Sql extends PDO{

		private $dbh;

		public function __construct(){

			$this->dbh = new PDO("mysql:host=127.0.0.1;dbname=db_php7", "root", "root");

		}

		private function setParams($statment,$parameters = array()){

			foreach ($parameters as $key => $value) {
				
				$this->setParam($statment,$key,$value);

			}

		}

		private function setParam($statment,$key,$value){

			$statment->bindParam($key,$value);

		}

		public function query($rawQuery,$params = array()){

			$stmt = $this->dbh->prepare($rawQuery);
			$this->setParams($stmt,$params);
			$stmt->execute();
			return $stmt;

		}

		public function select($rawQuery,$params = array()):array{

			$stmt = $this->query($rawQuery,$params);
			return $stmt->fetchAll(PDO::FETCH_ASSOC);

		}

	}

?>