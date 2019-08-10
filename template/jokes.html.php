<p class="badge badge-primary">Site Contains's
	<span class="badge badge-light"><?php echo $totalJokes ?></span>&nbsp;Jokes
</p>
<?php foreach($jokes as $joke):?>
<blockquote>
	<p><?php echo htmlspecialchars_decode($joke['joketext']) ?>
		<span>By&nbsp;</span><a href="" class="badge badge-info"><?php echo htmlspecialchars_decode($joke['name'])?></a>
		<a href="updateJoke.php?jokeid=<?php echo $joke['jokeid'] ?>" class="btn btn-info btn-sm">Update Joke</a>
		<form action="deletejoke.php" method="POST" >
			<input type="hidden" name="jokeid" value="<?php echo $joke['jokeid'];?>" >
			<input type="submit" value="Delete" onclick="confirm()" class="btn btn-danger btn-sm">

		</form>

	</p>
</blockquote>
<?php endforeach;?>
