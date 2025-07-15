<?php
$username = array(
	'name'	=> 'username',
	'id'	=> 'username',
	'size'	=> 30,
	'value' =>  set_value('username')
);

$password = array(
	'name'	=> 'password',
	'id'	=> 'password',
	'size'	=> 30,
	'value' => set_value('password')
);

$confirm_password = array(
	'name'	=> 'confirm_password',
	'id'	=> 'confirm_password',
	'size'	=> 30,
	'value' => set_value('confirm_password')
);

$email = array(
	'name'	=> 'email',
	'id'	=> 'email',
	'maxlength'	=> 80,
	'size'	=> 30,
	'value'	=> set_value('email')
);
?>

<html>
<body>

<fieldset><legend>Sign Up</legend>


<?php echo form_open($this->uri->uri_string())?>

<dl>
	<dt><?php echo form_label('Username', $username['id']);?></dt>
	<dd>
		<input type="text" id="username" class="form-control input-lg" name="username" placeholder="Noble-Six">
    <?php echo form_error($username['name']); ?>
	</dd>

	<dt><?php echo form_label('Password', $password['id']);?></dt>
	<dd>
		<input type="password" id="password" name="password" class="form-control input-lg" placeholder="XmW117nB6">
    <?php echo form_error($password['name']); ?>
	</dd>

	<dt><?php echo form_label('Confirm Password', $confirm_password['id']);?></dt>
	<dd>
		<input type="password" id="confirm_password" name="confirm_password" class="form-control input-lg" placeholder="XmW117nB6">
		<?php echo form_error($confirm_password['name']); ?>
	</dd>

	<dt><?php echo form_label('Email Address', $email['id']);?></dt>
	<dd>
		<input type="text" id="email" name="email" class="form-control input-lg" placeholder="noble.six@reach.com">
		<?php echo form_error($email['name']); ?>
	</dd>
		
<?php if ($this->dx_auth->captcha_registration): ?>

	<dt></dt>
	<dd>
		<?php 
			// Show recaptcha imgage
			echo $this->dx_auth->get_recaptcha_image(); 
			// Show reload captcha link
			echo $this->dx_auth->get_recaptcha_reload_link(); 
			// Show switch to image captcha or audio link
			echo $this->dx_auth->get_recaptcha_switch_image_audio_link(); 
		?>
	</dd>

	<dt><?php echo $this->dx_auth->get_recaptcha_label(); ?></dt>
	<dd>
		<?php echo $this->dx_auth->get_recaptcha_input(); ?>
		<?php echo form_error('recaptcha_response_field'); ?>
	</dd>
	
	<?php 
		// Get recaptcha javascript and non javasript html
		echo $this->dx_auth->get_recaptcha_html();
	?>
<?php endif; ?>

	<dt></dt><br>
	<dd><?php echo form_submit('register','Register', 'class="btn btn-success"');?></dd>
</dl>

<?php echo form_close()?>
</fieldset>
</body>
</html>