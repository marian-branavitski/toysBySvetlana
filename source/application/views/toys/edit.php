<form action="/toys/edit/<?php echo $slug_toy; ?>" method="post" enctype="multipart/form-data">
	<input type="text" class="form-control input-lg" name="slug" placeholder="Slug" value="<?php echo $slug_toy; ?>"><br>
	<input type="text" class="form-control input-lg" name="name" placeholder="Name of the toy" value="<?php echo $name_toy; ?>"><br>
	<input type="date" class="form-control input-lg" name="time_added" value="<?php echo $time_toy; ?>"><br>
	<div class="old-img">
		<div class="old-img-label">Old image</div>
		<div><img src="<?php echo $img_toy; ?>" width="100px"></div>
	</div><br> 
	<input type="file" id="img" class="form-control input-lg" name="new_img"><br>

	<select name="category_id" value="<?php echo $category_toy; ?>">
		<option value="1">Rabbit</option>
		<option value="2">Bear</option>
		<option value="3">Other</option>
	</select>
	<div><br></div>

	<textarea class="form-control input-lg" name="description" placeholder="Description"><?php echo $about_toy; ?></textarea><br>
	<input type="submit" class="btn btn-success" name="submit" value="Save">
</form>