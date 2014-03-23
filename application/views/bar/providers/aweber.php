<div id="provider-aweber" data-provider="aweberControl" class="providerControl aweberControl">
	<div class="form-group">
		<label class="form-label col-md-12">Aweber List ID</label>
		<div class="col-md-12">
			<input type="text" class="form-control" value="<?php echo $ld['aweberID'] ?>" name="aweberID" />
			<span class="help-block">Be sure to get the ID of the list that you want your users to subscribe to. Don't put your Aweber username here!</span>
		</div>
	</div><!-- .form-group -->
	<div class="form-group">
		<label class="form-label col-md-12">Redirect URL (Optional)</label>
		<div class="col-md-12">
			<input type="text" class="form-control" value="<?php echo $ld['aweberRedirect'] ?>" name="aweberRedirect" />
			<span class="help-block">Include the full URL of wherever you want to redirect your users.</span>
		</div>
	</div><!-- .form-group -->
	<div class="form-group">
		<label class="form-label col-md-12">Ad Tracking (Optional)</label>
		<div class="col-md-12">
			<input type="text" class="form-control" value="<?php echo $ld['aweberAd'] ?>" name="aweberAd" />
			<span class="help-block">Paste your ad tracking code here.</span>
		</div>
	</div><!-- .form-group -->
</div>