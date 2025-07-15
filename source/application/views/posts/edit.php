<form action="/posts/edit/" method="post">
	<input type="text" class="form-control input-lg" placeholder="Slug" name="slug" value="<?php echo $post_slug; ?>"><br>
	<input type="date" class="form-control input-lg" name="time_added" value="<?php echo $post_time; ?>"><br>
	<input type="text" class="form-control input-lg" placeholder="Title" name="title" value="<?php echo $post_title; ?>"><br>
	<textarea name="text" class="form-control input-lg" placeholder="Post text"><?php echo $post_text; ?></textarea><br>
	<input type="submit" class="btn btn-success" name="submit" value="Save">
</form>