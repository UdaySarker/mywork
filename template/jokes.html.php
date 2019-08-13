<p class="badge badge-primary">Site Contains's
	<span class="badge badge-light"><?php echo $totalJokes ?></span>&nbsp;Jokes
</p>
<div class="table-responsive-md">
<table class="table">
	<thead>
		<tr>
			<th>Joke Id</th>
			<th>Joke</th>
			<th>Author</th>
			<th>Published On</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
<?php foreach($jokes as $joke):?>
	<tr>
		<td><?php echo $joke['jokeid'] ?></td>
		<td><?php echo $joke['joketext'] ?></td>
		<td><?php echo $joke['name'] ?></td>
		<td><?php $date=new DateTime($joke['jokedate']); echo $date->format('jS F Y') ?></td>
		<td>
			<a href="updateJoke.php?jokeid=<?php echo $joke['jokeid'] ?>" class="btn btn-info btn-sm">Edit</a>
			<form action="deletejoke.php" method="POST">
				<input type="hidden" name="jokeid" value="<?php echo $joke['jokeid'] ?>">
				<input type="submit" class="btn btn-danger btn-sm" name="delete" value="Delete">
			</form>
		</td>
<?php endforeach; ?>
	</tbody>
</table>
</div>
