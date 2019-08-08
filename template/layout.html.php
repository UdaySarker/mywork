<!DOCTYPE html>
<html>
<head>
	<title><?php echo $title ;?></title>
	<link rel="stylesheet" type="text/css" href="template/style.css">
</head>
<body>
	<header>
		<h2>Jokes Database</h2>
	</header>
	<nav>
		<ul>
			<li><a href="index.php">Home</a></li>
			<li><a href="jokes.php">Jokes List</a></li>
			<li><a href="addjoke.php">Add new Joke</a></li>
		</ul>
	</nav>
	<main>
		<?php echo $output; ?>
	</main>
	<footer>
		<?php  echo "&copy"; ?>
	</footer>
</body>
</html>