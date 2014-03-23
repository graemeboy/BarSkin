<h3>Contact Support</h3>

<?php
	if (isset($messages['success_message']) && 
		trim($messages['success_message']) != '') { ?>
		
		<div class="alert alert-success">
			<?php echo $messages['success_message'] ?>
		</div>
<?php } ?>
<div class="lead">
	Please use the form below to contact support about any queries that you have. We are committed to making BarSkin the best possible service that we can, and so we welcome and queries or concerns.
</div>

<?php echo form_open('user/send_support', array('class="form"')) ?>

<div class="row">
	<div class="form-group">
			<div class="col-md-8" style="margin-bottom:10px">
				<input type="text" placeholder="Subject" class="input-lg form-control" name="subject" />
			</div>
	</div>
	<div class="form-group">
			<div class="col-md-8" style="margin-bottom:10px">
				<textarea class="form-control input-lg" placeholder="Message" name="message" rows="10"></textarea>
			</div>
	</div>
</div>
<div>
	<button type="submit" class="btn-lg btn-primary"><span class="glyphicon glyphicon-send" style="margin-right:5px"></span> Send Message!</button>
</div>
</form>