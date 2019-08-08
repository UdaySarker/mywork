<?php foreach($jokes as $joke):?>
<blockquote>
	<p><?php echo htmlspecialchars_decode($joke['joketext']) ?>
		by<a href=""><?php echo htmlspecialchars_decode($joke['name'])?></a>
		<form action="deletejoke.php" method="POST" >
			<input type="hidden" name="jokeid" value="<?php echo $joke['jokeid'];?>" >
			<input type="submit" value="Delete" onclick="confirm()">
		</form>
	</p>
</blockquote>
<?php endforeach;?>