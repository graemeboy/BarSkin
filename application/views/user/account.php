<h3>Account Settings</h3>

<div class="form-group">
	<label class="control-label col-lg-2">Your Email</label>
	<div class="col-lg-3">
		<input class="form-control" disabled="disabled" value="<?php echo $user_email ?>" >
	</div>
</div>
<div class="clearfix"></div>

<h4 style="margin: 20px 0;">Change Password</h4>

<?php if (isset($messages['error_message']) 
	&& trim($messages['error_message']) != '') { ?>
<div class="alert alert-danger"><?php echo $messages['error_message'] ?></div>
<?php } else if (isset($messages['success_message']) 
	&& trim($messages['success_message']) != '') { ?>
<div class="alert alert-success"><?php echo $messages['success_message'] ?></div>
<?php } ?>

<?php echo form_open('user/change_password', array('class'=>'form-horizontal')); ?>
<div class="form-group">
	<label class="control-label col-lg-2">New Password</label>
	<div class="col-lg-3">
		<input type="password" class="form-control" name="pass">
	</div>
</div>
<div class="form-group">
	<label class="control-label col-lg-2">Confirm Password</label>
	<div class="col-lg-3">
		<input type="password" class="form-control" name="passCon">
	</div>
</div>
<div class="col-lg-offset-2">
	<div class="col-lg-3">
		<input type="submit" class="btn btn-btn-lg btn-block btn-primary" value="Change Password" />
	</div>
</div>
</form>