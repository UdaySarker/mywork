<form action="" method="POST">
	<div class="form-group">
		<label>Update Your Joke</label>
		<input type="hidden" name="joke[jokeid]" value="<?php echo $joke['jokeid'] ?? ''?>">
		<input type="hidden" name="joke[authorid]" value="<?php echo $joke['authorid'] ?? ''?>">
		<textarea rows="4" cols="12" name="joke[joketext]" class="form-control form-control-sm"><?php echo $joke['joketext'] ?? ''?></textarea>
	</div>
	<input type="submit" class="btn btn-primary">
</form>
