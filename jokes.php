<?php
	try{
			$pdo=new PDO('mysql:host=localhost;dbname=ijdb;','root','');
			$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
			$sql="SELECT jokeid,joketext FROM joke";
			$jokes=$pdo->query($sql);
			$output = '';
			$title="Joke List";
			ob_start();
			include __DIR__.'\.\template\jokes.html.php';
			$output=ob_get_clean();
		}catch(PDOException $e){
			$output='Unable to connect to database server. Error in'.$e->getFile()." on line".$e->getLine();

		}
	include __DIR__.'\.\template\layout.html.php';
?>