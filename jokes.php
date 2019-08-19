<?php
	try{
			include __DIR__.'\.\includes\DatabaseConnection.php';
			include __DIR__.'\.\classes\DatabaseTable.php';
			$jokesTable=new DatabaseTable($pdo,'joke','jokeid');
			$authorsTable=new DatabaseTable($pdo,'author','id');
			$result=$jokesTable->findAll();
			$jokes=[];
			foreach($result as $joke){
				$author=$authorsTable->findById($joke['authorid']);
				$jokes[]=[
					'jokeid'=>$joke['jokeid'],
					'joketext'=>$joke['joketext'],
					'jokedate'=>$joke['jokedate'],
					'name'=>$author['name'],
				];
			}
			$totalJokes=$jokesTable->getTotal();
			$title="Joke List";
			ob_start();
			include __DIR__.'\.\template\jokes.html.php';
			$output=ob_get_clean();
		}catch(PDOException $e){
			$output='Unable to connect to database server. Error in'.$e->getFile()." on line".$e->getLine().$e->getMessage();

		}
	include __DIR__.'\.\template\layout.html.php';
?>
