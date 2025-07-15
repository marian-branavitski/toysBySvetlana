<?php if (!$this->dx_auth->is_admin()): ?>
  <h1><?php echo $title; ?></h1>
<?php else: ?>
  <h1><?php echo $title; ?></h1>
  <a href="/toys/" class="btn btn-success"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Admin</a>  
<?php endif ?>
<hr>
<div class="text-center"><?php echo $pagination; ?> </div>
<?php foreach ($toys_data as $key => $value): ?>
  <div class="row">
    <div class="well clearfix">
      <div class="col-lg-3 col-md-2 text-center">
        <img class="img-rounded" src="<?php echo $value['img']; ?>" alt="<?php echo $value['name']; ?>">
        <p><?php echo $value['name']; ?></p>
      </div>

      <div class="col-lg-9 col-md-10">
        <p>
          <?php echo $value['description']; ?>
        </p>
      </div>
      
      <div class="col-lg-12 col-md-12">
        <a href="/toys/view/<?php echo $value['slug']; ?>/" class="btn btn-lg btn-success pull-right">подробнее</a>
      </div>

    </div>

  </div>
<?php endforeach ?>

<div class="text-center"><?php echo $pagination; ?> </div>