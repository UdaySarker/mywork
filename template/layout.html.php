<!DOCTYPE html>
<html>
<head>
	<title><?php echo $title ;?></title>
	<link rel="stylesheet" href="./css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="template/style.css">
</head>
<body>
	<header>
		<h2>Jokes Database</h2>
	</header>
	<nav>
		<ul>
			<li><a href="index.php">Home</a></li>
			<li><a href="index.php?action=list">Jokes List</a></li>
			<li><a href="index.php?action=edit">Add new Joke</a></li>
		</ul>
	</nav>
	<main>
		<?php echo $output?>
	</main>
	<footer>
		<?php  echo "&copy"; ?>
	</footer>
</body>
</html>
