<?php 
	if(isset($_POST['addjoke'])){
		try{
			include __DIR__.'\.\includes\DatabaseConnection.php';
			$sql="INSERT INTO joke SET joketext=:joketext,jokedate=CURDATE()";
			$stmt=$pdo->prepare($sql);
			$stmt->bindValue(':joketext',htmlspecialchars($_POST['jokes'],ENT_QUOTES));
			$stmt->execute();
			header('Location: jokes.php');
			$output='';
		}catch(PDOException $e){
			$title="An error has occured";
			$output='Unable to connect to database server. Error in'.$e->getFile()." on line".$e->getLine().$e->getMessage();
		}
	}else{
		$title="Add new Joke";
		ob_start();
		include __DIR__.'\.\template\addjoke.html.php';
		$output=ob_get_clean();
	}
	include __DIR__.'\.\template\layout.html.php';
 ?>