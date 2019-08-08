<?php foreach($jokes as $joke):?>
<blockquote>
	<p><?php echo htmlspecialchars_decode($joke['joketext'])?>
		<form action="deletejoke.php" method="POST" >
			<input type="hidden" name="jokeid" value="<?php echo $joke['jokeid'];?>">
			<input type="submit" value="Delete">
		</form>
	</p>
</blockquote>
<p>A new line added</p>
<?php endforeach;?>