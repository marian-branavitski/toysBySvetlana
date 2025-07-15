<h2>Showing results for "<?php echo $q_search; ?>"</h2>
<div class="text-center">
	<?php echo $pagination; ?>
</div> 
<?php foreach ($search_result as $key => $value): ?>
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
<p class="well well-sm">If you can't find the toy you're looking for try to use key words like: colour of toy or colour of cloth it has on.</p>
<div class="text-center">
	<?php echo $pagination; ?>  
</div>