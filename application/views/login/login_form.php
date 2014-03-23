<?php
if (isset($success_msg) && trim($success_msg) != '') {
	?>
	<div class="alert alert-success"><?php echo $success_msg ?></div>
	<?php
}
if (isset($error_msg) && trim($error_msg) != '') {
?>
	<div class="alert alert-danger"><?php echo $error_msg ?></div>
<?php
}
?>
<div class="row">
<?php echo form_open('login/validate', array('class'=>'form-horizontal'));
?>
<div class="form-group">
	<label class="col-md-3">Email</label>
	<div class="col-md-5" style="position:relative;">
		<span class="glyphicon glyphicon-envelope" style="position: absolute;top: 8px;left: 25px;font-size: 18px;color: #cacaca;"></span>
		<input type="text" class="form-control login-input" name="email" />
	</div>
</div>
<div class="form-group">
	<label class="col-md-3">Password</label>
	<div class="col-md-5" style="position:relative;">
		<span class="glyphicon glyphicon-lock" style="position: absolute;top: 8px;left: 25px;font-size: 18px;color: #cacaca"></span>
		<input type="password" class="form-control login-input" name="password" />
	</div>
</div>
<div>
	<div class="col-md-offset-3 col-md-4">
		<input type="submit" class="btn btn-lg btn-primary btn-block" value="Sign In">
	</div>
</div>
</form>
</div>
</div>