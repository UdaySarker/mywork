<?php 
	if(isset($_POST['addjoke'])){
		try{
			$pdo=new PDO('mysql:host=localhost;dbname=ijdb;charset=utf8','root','');
			$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
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