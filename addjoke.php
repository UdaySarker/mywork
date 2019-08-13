<?php
	if(isset($_POST['addjoke'])){
		try{
			include __DIR__.'\.\includes\DatabaseConnection.php';
			include __DIR__.'\.\includes\DatabaseFunction.php';
			insertJoke($pdo,[
				'joketext'=>$_POST['joketext'],
				'jokedate'=>new DateTime(),
				'authorid'=>1
			]);
			header('Location: jokes.php');
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
