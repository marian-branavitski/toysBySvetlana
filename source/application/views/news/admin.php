<h1>Admin/All news</h1>
<p><a href="/news/create" class="btn btn-success"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Add an article</a></p>
<div class="text-center"><?php echo $pagination; ?></div>
<?php foreach ($news as $key => $value): ?>
	<div class="row">
		<div class="well clearfix">
			<h2><?php echo $value['title']; ?></h2>
			<p><?php echo $value['time_added']; ?></p>
			<hr>
			<p><?php echo $value['text']; ?></p>

			<div class="col-md-6 col-md-offset-8">
		    	<p><a href="/news/<?php echo $value['slug']; ?>" class="btn btn-success margin-right"><span class="glyphicon glyphicon-open-file" aria-hidden="true"></span> View</a> <a href="/news/delete/<?php echo $value['slug']; ?>" class="btn btn-success margin-right"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Delete</a> <a href="/news/edit/<?php echo $value['slug']; ?>" class="btn btn-success"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Edit</a></p>
		    </div>	
		</div>
	</div>
<?php endforeach ?>
<div class="text-center"><?php echo $pagination; ?></div>