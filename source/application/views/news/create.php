<form action="/news/create" method="post">
	<input type="input" class="form-control input-lg" name="slug" placeholder="Slug"><br>
	<input type="input" class="form-control input-lg" name="title" placeholder="Title for the article"><br>
	<input type="date" class="form-control input-lg" name="time_added" ><br>
	<textarea name="text" class="form-control input-lg" placeholder="Article content"></textarea> <br>
	<input type="submit" class="btn btn-success" name="post" value="Add">
</form>