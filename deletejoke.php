<?php
	try{
		include __DIR__.'\.\includes\DatabaseConnection.php';
		include __DIR__.'\.\includes\DatabaseFunction.php';
		if(isset($_POST['delete'])){
			deleteJoke($pdo,$_POST['jokeid']);
			header('Location:jokes.php');
		}
	}catch(PDOException $e){
			$output='Unable to connect to database server. Error in'.$e->getFile()." on line".$e->getLine();
		}
	include __DIR__.'\.\template\layout.html.php';
 ?>
