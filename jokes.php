<?php
	try{
			include __DIR__.'\.\includes\DatabaseConnection.php';
			$sql="SELECT joke.jokeid,joke.joketext,author.name,joke.authorid FROM joke INNER JOIN author ON joke.authorid=author.id";
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