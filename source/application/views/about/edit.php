<form action="/about/edit/1" method="post">
	<input type="text" class="form-control input-lg" value="<?php echo $about_title; ?>" placeholder="Title" name="title"><br>
	<input type="date" class="form-control input-lg" value="<?php echo $about_time; ?>" name="time_added" name="time_added"><br>
	<textarea name="text" class="form-control input-lg"><?php echo $about_text; ?></textarea>
	<hr>
	<h3>Info about this site on the home page</h3>
	<textarea name="home_page_text" class="form-control input-lg" placeholder="Text that will be displayed in the home page"><?php echo $about_home_page_text; ?></textarea><br>
	<input type="submit" class="btn btn-success" name="submit" value="Save">
</form>

