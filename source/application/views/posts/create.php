<form action="/posts/create" method="post">
	<input type="text" class="form-control input-lg" placeholder="Slug" name="slug"><br>
	<input type="text" class="form-control input-lg" placeholder="Title" name="title"><br>
	<input type="date" class="form-control input-lg" name="time_added"><br>
	<textarea name="text" class="form-control input-lg" placeholder="Post text"></textarea><br>
	<input type="submit" class="btn btn-success" name="post" value="Add">
</form>