<?php
	class DB{
		private $pdo;
		private $username='root';
		public function dbConn(){
			try{
				$this->pdo=new PDO('mysql:host=localhost;dbname=users;','rooot','');
				$this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
				$output="Database Connection established";
			}catch(PDOException $e){
				$output=$e->getMessage();
			}
			return $this->pdo;
		}
	}
?>