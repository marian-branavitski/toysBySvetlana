<?php if (!$this->dx_auth->is_admin()): ?>
  <h1><?php echo $title; ?></h1>
<?php else: ?>
  <h1><?php echo $title; ?></h1>
  <a href="/news/" class="btn btn-success"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Admin</a>  
<?php endif ?>
<hr>
<div class="text-center">
<?php echo $pagination; ?>
</div>
<?php foreach ($news_data as $key => $value): ?>
	<div class="well well-sm">
		<h2><?php echo $value['title']; ?></h2>
		<p><?php echo $value['time_added']; ?></p>
		<hr>
		<p><?php echo $value['text']; ?></p>
	</div>
<?php endforeach ?> 
<div class="text-center">
<?php echo $pagination; ?>
</div>