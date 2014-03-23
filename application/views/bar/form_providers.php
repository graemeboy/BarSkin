<div class="col-lg-6">
<legend>Form Provider</legend>
<div class="form-group">
<label class="form-label col-lg-4">Select from List</label>
<div class="col-lg-6">
<?php
$provider_list = array(
	'aweber' => 'Aweber',
	'mailchimp' => 'MailChimp',
	'constantContact' => 'Constant Contact',
	'feedburner' => 'Feedburner',
	'custom' => 'Custom',
);
echo form_dropdown('formProvider', $provider_list, $ld['formProvider'], 'class="form-control" id="providerMenu"');
?>
<div class="help-block">If you don't see your mailing-list provider here, you can request that we add it by going to the <?php echo anchor('user/support', 'Help') ?> page.</div>
</div><!-- .col-lg-6 -->
</div><!-- .form-group -->
<div class="clearfix"></div>
<legend>Form Options</legend>
	<div class="col-lg-12">
		<div class="form-group">
			<label class="form-label col-lg-5">Form Layout</label>
			<div class="checkbox">
				<label class="control-label" for="includeName">
					<input type="checkbox" id="includeName" name="includeName" value="yes" <?php if ($ld['includeName'] == 'yes') { echo 'checked="checked"'; } ?>/>Include Name field
				</label>
			</div>
		</div>
	</div><!-- .form-group -->
<?php
$this->load->view('bar/providers/aweber');
$this->load->view('bar/providers/mailchimp');
$this->load->view('bar/providers/constantContact');
$this->load->view('bar/providers/feedburner');
$this->load->view('bar/providers/custom');
?>
</div><!-- .col-lg-6 -->
<div class="col-lg-6">

<?php 
$data['font_list_nice'] = $font_list_nice;
$this->load->view('bar/form/design', $data); ?>
</div>
<script type="text/javascript">
jQuery(document).ready(function($) {
	$('#includeName').change(function () {
		if ($(this).is(':checked')) {
			$('#previewName').show();
		} else {
			$('#previewName').hide();
		}
	});
	$('.providerControl').hide();
	
	// Updates the provider settings, toggles visibility.
	function updateProvider() {
		var provider = $('#providerMenu').val();
		var providerClass = $('#provider-' + provider).attr('data-provider');
		$('.providerControl').hide();
		$('.' + providerClass).show();
	}
	// Once to set
	updateProvider();
	// And on change
	$("#providerMenu").change(updateProvider);
});
</script>