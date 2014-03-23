<div class="row mini-signin">
	<?php echo form_open('login/validate', array('class'=>'form-inline', 'role' => 'form'));?>
	<div class="form-group">
		<label class="sr-only" for="signin-email">Email address</label>
		<div style="position:relative;">
			<span class="glyphicon glyphicon-envelope" style="position: absolute;top: 8px;left:10px;font-size: 18px;color: #cacaca;"></span>
			<input type="text" id="signin-email" placeholder="Email" class="form-control login-input" name="email" />
		</div>
	</div>
	<div class="form-group">
		<label class="sr-only" for="signin-password">Password</label>
		<div style="position:relative;">
			<span class="glyphicon glyphicon-lock" style="position: absolute;top: 8px;left: 10px;font-size: 18px;color: #cacaca"></span>
			<input id="signin-password" placeholder="Password" type="password" class="form-control login-input" name="password" />
		</div>
	</div>
		<input type="submit" class="btn btn-primary btn-lg" value="Sign In" />
	</form>
</div>