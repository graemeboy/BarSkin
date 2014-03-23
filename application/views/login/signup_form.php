<div class="col-md-12">
<?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>
<?php echo form_open('login/signup_process', array('class'=>'form-horizontal'));
?>
<div class="form-group">
	<label class="col-md-5">Your Email Address</label>
	<div class="col-md-7" style="position:relative;">
		<span class="glyphicon glyphicon-envelope" style="position: absolute;top: 8px;left: 25px;font-size: 18px;color: #cacaca;"></span>
		<input type="text" id="signup-email" class="form-control login-input" name="email" />
	</div>
</div>
<div class="form-group">
	<label class="col-md-5">Password</label>
	<div class="col-md-7" style="position:relative;">
		<span class="glyphicon glyphicon-lock" style="position: absolute;top: 8px;left: 25px;font-size: 18px;color: #cacaca"></span>
		<input type="password" id="password" class="form-control login-input" name="password" />
	</div>
</div>
<div class="form-group">
	<label class="col-md-5">Confirm Password</label>
	<div class="col-md-7" style="position:relative;">
		<div class="input-group" style="width:85%;">
		<span class="glyphicon glyphicon-lock" style="position: absolute;top: 8px;left: 10px;font-size: 18px;color: #cacaca"></span>
			<input type="password" id="passwordCon" class="form-control login-input" name="password-confirm" />
			<span class="input-group-addon" id="con-check" style="display:none;">
				<span class="glyphicon glyphicon-ok" style="font-size:21px;color:#aaa;"></span>
			</span>
		</div>
	</div>
<div>
	<div class="col-md-offset-4 col-md-5" style="margin-top:15px">
		<input type="submit" class="btn btn-lg btn-primary" value="Sign Up">
	</div>
</div>
</form>
</div>
</div>
</div>
<script type="text/javascript">
	$('#passwordCon, #password').keyup(function () {
		var con = $('#passwordCon').val();
		var pass = $('#password').val();
		if (pass != '') {
			if (con == pass) {
				$('#con-check').show();
			} else {
				$('#con-check').hide();
			}
		}
	});
</script>