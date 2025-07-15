<form action="/news/edit/" method="post">
	<input type="text" class="form-control input-lg" name="slug" placeholder="Slug" value="<?php echo $slug_news; ?>"> <br>
	<input type="text" class="form-control input-lg" name="title" placeholder="Title for the article" value="<?php echo $title_news; ?>"> <br>
	<input type="date" class="form-control input-lg" name="time_added" value="<?php echo $time_news; ?>"><br>
	<textarea class="form-control input-lg" name="text"><?php echo $content_news; ?></textarea><br>
	<input type="submit" class="btn btn-success" name="submit" value="Save">
</form>