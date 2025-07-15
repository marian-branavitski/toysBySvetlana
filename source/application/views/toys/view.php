<?php if (!$this->dx_auth->is_admin()): ?>
  <h2><?php echo $title; ?></h2>
<?php else: ?>
  <h2><?php echo $title; ?></h2>
  <a href="/toys/" class="btn btn-success"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Admin</a>  
<?php endif ?>
<p><?php echo $time; ?></p>
<hr>

<div class="col-lg-5 "><img class="img-thumbnail" src="<?php echo $img; ?>" alt="<?php echo $title; ?>"></div>

<div class="col-lg-7">
  <h3>Details</h3>
  <hr>
  <p class="well"><?php echo $content; ?><br>For more information or to pre-order this toy click <a href="/contacts/">here</a></p>
  <?php if ($this->dx_auth->is_admin()): ?>
    <hr>
    <h3>Type</h3>
    <p class="well">
      <?php echo $type." - "; ?>
      <?php foreach ($type_name as $key => $value): ?>
        <?php print_r($value['name']); ?>  
      <?php endforeach ?>
    </p>  
  <?php endif ?>
  <a href="/contacts/" class="btn btn-success pull-right">Pre order</a>
</div>