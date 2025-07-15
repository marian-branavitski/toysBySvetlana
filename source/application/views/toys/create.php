<form action="/toys/create/" method="post" enctype="multipart/form-data">
	<input type="text" class="form-control input-lg" name="slug" placeholder="Slug"><br>
	<input type="text" class="form-control input-lg" name="name" placeholder="Name of the toy"><br>
	<input type="date" class="form-control input-lg" name="time_added" placeholder="Time added"><br>
	
	<input type="file" class="form-control input-lg" name="img"><br>

	<select name="category_id">
		<option value="1">Rabbit</option>
		<option value="2">Bear</option>
		<option value="3">Other</option>
	</select>
	<div><br></div>
	<textarea class="form-control input-lg" name="description" placeholder="Description"></textarea><br>
	<input type="submit" class="btn btn-success" name="post" value="Add">
</form>
<!-- enctype="multipart/form-data" -->