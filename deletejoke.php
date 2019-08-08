<?php 
	try{
		$pdo=new PDO('mysql:host=localhost;dbname=ijdb;charset=utf8','root','');
		$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		$sql="DELETE FROM joke WHERE jokeid=:id";
		$stmt=$pdo->prepare($sql);
		$stmt->bindValue(':id',$_POST['jokeid']);
		$stmt->execute();
		header('Location:jokes.php');
	}catch(PDOException $e){
			$output='Unable to connect to database server. Error in'.$e->getFile()." on line".$e->getLine();
		}
	include __DIR__.'\.\template\layout.html.php';
 ?>