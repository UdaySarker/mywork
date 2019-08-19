<?php
	function loadTemplate($templateFileName,$variables=[]){
		extract($variables);
		ob_start();
		include __DIR__.'\.\template\\'.$templateFileName;
		return ob_get_clean();
	}
 	try{
		include __DIR__.'\.\includes\DatabaseConnection.php';
		include __DIR__.'\.\classes\DatabaseTable.php';
		include __DIR__.'\.\controller\JokeController.php';
		$jokesTable=new DatabaseTable($pdo,'joke','jokeid');
		$authorsTable=new DatabaseTable($pdo,'author','id');
		$jokeController=new JokeController($jokesTable,$authorsTable);
		$action=$_GET['action'] ?? 'home';
		$page=$jokeController->$action();
		$title=$page['title'];
		if(isset($page['variables'])){
			$output=loadTemplate($page['template'],$page['variables']);
		}else{
			$output=loadTemplate($page['template']);
		}
	}catch(PDOException $e){
		$output='Unable to connect to database server. Error in'.$e->getFile()." on line".$e->getLine().$e->getMessage();
	}
	// $title="Internet Joke Database";
	// ob_start();
	// include __DIR__.'\.\template\home.html.php';
	// $output=ob_get_clean();
	include __DIR__.'\.\template\layout.html.php';
 ?>
