<h2><?php echo $title; ?></h2>
<p>The easiest way to ask a question or pre-order a toy</p>
<hr>
<?php if ($this->dx_auth->is_logged_in()): ?>
	<form action="">
    <div class="form-group">
      <input type="text" placeholder="Email" class="form-control input-lg" value="<?php echo $user_adress; ?>">
    </div>
    <div class="form-group">
      <input type="text" placeholder="Subject" class="form-control input-lg">
    </div>
    <div class="form-group">
      <textarea class="form-control" placeholder="Write your mail here..."></textarea>
    </div>
    <button class="btn btn-success btn-lg">Submit</button>
  </form>
<?php else: ?>
	<form action="">
    <div class="form-group">
      <input type="text" placeholder="Your e-mail" class="form-control input-lg">
    </div>
    <div class="form-group">
      <input type="text" placeholder="Subject" class="form-control input-lg">
    </div>
    <div class="form-group">
      <textarea class="form-control" placeholder="Write your mail here..."></textarea>
    </div>
    <button class="btn btn-success btn-lg">Submit</button>
  </form>	
<?php endif ?>
