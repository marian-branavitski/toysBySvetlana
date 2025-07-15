<?php

$login = array(
	'name'	=> 'login',
	'id'	=> 'login',
	'maxlength'	=> 80,
	'size'	=> 30,
	'value' => set_value('login')
);

?>

<fieldset><legend accesskey="D" tabindex="1">Forgotten Password</legend>
<?php echo form_open($this->uri->uri_string()); ?>

<?php echo $this->dx_auth->get_auth_error(); ?>

<dl>
	<dt><?php echo form_label('Enter your Username or Email Address', $login['id']);?>
	<dd>
		<input type="text" id="login" name="login" class="form-control input-lg" placeholder="Noble-Six">
	<?php echo form_error($login['name']); ?>	
	</dd>

	<dt></dt><br>
	<dd><?php echo form_submit('reset', 'Reset Now', 'class="btn btn-success"'); ?></dd>
</dl>

<?php echo form_close()?>
</fieldset>