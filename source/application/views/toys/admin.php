<h1>Admin/All toys</h1>
<p><a href="/toys/create" class="btn btn-success"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Add a toy</a></p>
<div class="text-center"><?php echo $pagination; ?></div>
<?php foreach ($toys as $key => $value): ?>
	<div class="row">
		<div class="well clearfix">
			<div class="col-lg-3 col-md-2 text-center">
				<img src="<?php echo $value['img'] ?>" alt="<?php echo $value['name']; ?>" class="img-rounded">
				<p><?php echo $value['name']; ?></p>
			</div>
			
			<div class="col-lg-9 col-md-10">
		        <p>
		          <?php echo $value['description']; ?>
		        </p>
		    </div>


		    <div class="col-md-6 col-md-offset-8">
		    	<p><a href="/toys/view/<?php echo $value['slug']; ?>" class="btn btn-success margin-right"><span class="glyphicon glyphicon-open-file" aria-hidden="true"></span> View</a> <a href="/toys/delete/<?php echo $value['slug']; ?>" class="btn btn-success margin-right"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Delete</a> <a href="/toys/edit/<?php echo $value['slug']; ?>" class="btn btn-success"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Edit</a></p>
		    </div>	
		</div>
	</div>
<?php endforeach ?>
<div class="text-center"><?php echo $pagination; ?></div>