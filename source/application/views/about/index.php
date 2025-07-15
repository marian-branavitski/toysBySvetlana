<?php foreach ($info as $key => $value): ?>
	<h1><?php echo $value['title']; ?></h1>
	<p><?php echo $value['time_added']; ?></p>
	<hr>
	<p><?php echo $value['text']; ?></p>
	<a href="/about/edit/<?php echo $value['id']; ?>" class="btn btn-success">
		<span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Edit
	</a>
<?php endforeach ?>