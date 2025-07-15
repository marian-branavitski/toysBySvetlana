<?php
$username = array(
	'name'	=> 'username',
	'id'	=> 'username',
	'size'	=> 30,
	'value' => set_value('username')
);

$password = array(
	'name'	=> 'password',
	'id'	=> 'password',
	'size'	=> 30
);

$remember = array(
	'name'	=> 'remember',
	'id'	=> 'remember',
	'value'	=> 1,
	'checked'	=> set_value('remember'),
	'style' => 'margin:0;padding:0'
);

$confirmation_code = array(
	'name'	=> 'captcha',
	'id'	=> 'captcha',
	'maxlength'	=> 8
);

?>

<fieldset><legend>Login</legend>
<?php echo form_open($this->uri->uri_string())?>
<br>
<?php echo $this->dx_auth->get_auth_error(); ?>


<dl>	
	<dt><?php echo form_label('Username', $username['id']);?></dt>
	<dd>
		<input id="username" type="text" class="form-control input-lg" placeholder="Username" name="username">
    <?php echo form_error($username['name']); ?>
	</dd>

  <dt><?php echo form_label('Password', $password['id']);?></dt>
	<dd>
		<input id="password" type="password" class="form-control input-lg" placeholder="Password" name="password">
    <?php echo form_error($password['name']); ?>
	</dd>
	<br>
	<dt></dt>
	<dd><?php echo form_submit('login','Login', 'class="btn btn-success"');?></dd>

	<dt></dt>
	<dd>
		<p class="success text-center"><a href="/Auth/forgot_password/">Forgotten password</a>
			<?php if ($this->dx_auth->allow_registration): ?>
				 | <a href="/Auth/register/">Sign up</a>
			<?php endif ?>
		</p>
	</dd>

</dl>

<?php echo form_close()?>
</fieldset>
