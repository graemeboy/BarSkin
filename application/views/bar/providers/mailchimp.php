<div id="provider-mailchimp" data-provider="mailchimpControl" class="providerControl mailchimpControl">
	<legend>Provider Details</legend>
	<div class="form-group">
		<label class="form-label col-lg-12">MailChimp Embedded Code</label>
		<div class="col-lg-12">
			<textarea type="text" class="form-control" rows="10" name="mailchimpHTML" ><?php echo stripslashes($ld['mailchimpHTML']) ?></textarea>
			<span class="help-block">Whenever you create a form with MailChimp, they give you some code to embed the form on your website. We're looking for the type of code that they call "Embedded form code."</span>
		</div>
	</div><!-- .form-group -->
	<div class="form-group">
		<label class="form-label col-lg-12">MailChimp Name Name-Value</label>
		<div class="col-lg-12">
			<input type="text" type="text" class="form-control" rows="10" name="mailchimpName" value="<?php echo $ld['mailchimpName'] ?>">
			<span class="help-block">Mailchimp usually sets this to FNAME. You can find the option in your MailChimp settings.</span>
		</div>
	</div><!-- .form-group -->
	<div class="form-group">
		<label class="form-label col-lg-12">MailChimp Email Name-Value</label>
		<div class="col-lg-12">
			<input type="text" type="text" class="form-control" rows="10" name="mailchimpEmail" value="<?php echo $ld['mailchimpEmail'] ?>">
			<span class="help-block">Mailchimp usually sets this to EMAIL. You can find the option in your MailChimp settings.</span>
		</div>
	</div><!-- .form-group -->
</div>