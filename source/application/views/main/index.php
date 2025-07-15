<!-- <?php if (!$this->dx_auth->is_admin()): ?>
  <h2>New toys</h2>
<?php else: ?>
  <h2>New toys</h2>
  <a href="/toys/" class="btn btn-success"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Admin</a>  
<?php endif ?>

<hr>
<div class="row">
  <?php foreach ($toys as $key => $value): ?>
    <span><div class="col-lg-3">
      <a href="/toys/view/<?php echo $value['slug']; ?>"><img width="140px" height="190px" src="<?php echo $value['img']; ?>" alt="<?php echo $value['name']; ?>" class="img-rounded" ></a>
      <p><?php echo $value['name'] ?></p>
    </div> </span>
  <?php endforeach ?>
</div> -->


<div class="row">
<span>
<!-- Corusel -->
<div id="carousel-example-generic" class="carousel slide img-rounded" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
    <li data-target="#carousel-example-generic" data-slide-to="3"></li>
    <li data-target="#carousel-example-generic" data-slide-to="4"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
    
    <?php foreach ($one_toy as $key => $value): ?>
      <div class="item active text-center">
        <img src="<?php echo $value['img']; ?>" alt="<?php echo $value['name']; ?>">
        <!-- <div class="carousel-caption">
          <p><?php echo $value['name']; ?></p>
        </div> -->
      </div>  
    <?php endforeach ?>

    <?php foreach ($slider_toys as $key => $value): ?>
      <div class="item">
        <img src="<?php echo $value['img']; ?>" alt="<?php echo $value['name']; ?>">
        <!-- <div class="carousel-caption">
          <p><?php echo $value['name']; ?></p>
        </div> -->
      </div>  
    <?php endforeach ?>
  </div>

  <!-- Controls -->
  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
<div class="col-lg-5 pull-right about-text well well-lg">
  <?php foreach ($about_info as $key => $value): ?>
    <p><?php echo $value['home_page_text']; ?></p>
  <?php endforeach ?>
  <?php if ($this->dx_auth->is_admin()): ?>
    <div class="col-md-4 col-md-offset-5">
      <a href="/about/edit/1/" class="btn btn-success"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Edit</a>
    </div>
  <?php endif ?>
  <a href="/about/page/" class="btn btn-success pull-right">More</a>
</div></span>
</div>

 <div class="margin-8"></div>

<?php if (!$this->dx_auth->is_admin()): ?>
  <h2 class="text-center">New toys</h2>
<?php else: ?>
  <h2 class="text-center">New toys</h2>
  <a href="/toys/" class="btn btn-success"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Admin</a>  
<?php endif ?>

<hr>
<div class="row">
  <?php foreach ($toys as $key => $value): ?>
    <span><div class="col-lg-3">
      <a href="/toys/view/<?php echo $value['slug']; ?>"><img width="140px" height="190px" src="<?php echo $value['img']; ?>" alt="<?php echo $value['name']; ?>" class="img-rounded" ></a>
      <p><?php echo $value['name'] ?></p>
    </div> </span>
  <?php endforeach ?>
</div>

<?php if (!$this->dx_auth->is_admin()): ?>
  <h2 class="text-center">Important notices</h2>
<?php else: ?>
  <h2 class="text-center">Important notices</h2>
  <a href="/posts/" class="btn btn-success"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Admin</a>  
<?php endif ?> 
<hr>
<?php foreach ($posts as $key => $value): ?>
  <h3><a href="/posts/view/<?php echo $value['slug']; ?>"><?php echo $value['title']; ?></a></h3>
  <p class="well well-lg"><?php echo $value['text']; ?></p>
  <a href="/posts/view/<?php echo $value['slug']; ?>" class="btn btn-success pull-right">Read</a>
  <div class="margin-8"></div>
<?php endforeach ?>
