<?php foreach ($about_item as $key => $value): ?>
	<?php if (!$this->dx_auth->is_admin()): ?>
	  <h2><?php echo $value['title']; ?></h2>
	<?php else: ?>
	  <h2><?php echo $value['title']; ?></h2>
	  <a href="/about/" class="btn btn-success"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Admin</a>  
	<?php endif ?>
	<hr>
	<p><?php echo $value['time_added']; ?></p>
	<div class="well well-sm"><?php echo $value['text']; ?></div>
<?php endforeach ?>