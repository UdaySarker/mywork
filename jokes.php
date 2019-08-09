<?php
	try{
			include __DIR__.'\.\includes\DatabaseConnection.php';
			include __DIR__.'\.\includes\DatabaseFunction.php';
			$sql="SELECT joke.jokeid,joke.joketext,author.name,joke.authorid FROM joke INNER JOIN author ON joke.authorid=author.id";
			$jokes=$pdo->query($sql);
			$output = '';
			$totalJokes=totalJokesCounter($pdo);
			$title="Joke List";
			ob_start();
			include __DIR__.'\.\template\jokes.html.php';
			$output=ob_get_clean();
		}catch(PDOException $e){
			$output='Unable to connect to database server. Error in'.$e->getFile()." on line".$e->getLine().$e->getMessage();

		}
	include __DIR__.'\.\template\layout.html.php';
	echo __DIR__;
?>
