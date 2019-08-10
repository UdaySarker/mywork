<form action="" method="POST">
	<div class="form-group">
		<label>Update Your Joke</label>
		<input type="hidden" name="jokeid" value="<?php echo $joke['jokeid']?>">
		<input type="hidden" name="authorid" value="<?php echo $joke['authorid'] ?>">
		<textarea rows="4" cols="12" name="jokes" class="form-control form-control-sm"><?php echo $joke['joketext'] ?></textarea>
	</div>
	<input type="submit" name="updateJoke" class="btn btn-primary">
</form>
