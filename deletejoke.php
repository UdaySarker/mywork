<?php 
	try{
		include __DIR__.'\.\includes\DatabaseConnection.php';
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