<?php echo form_open('bar/new_bar', array('class' => 'form-horizontal')); ?>
<h3><span class="glyphicon glyphicon-star" style="margin-right:5px"></span> Bar Setup</h3>
<div class="lead">
Please name your bar before we begin.
</div>
<div class="form-group col-lg-5">
	<div class="col-lg-12">
		<input type="text" id="newName" autocomplete="off" class="form-control input-lg" placeholder="Your Bar Name" name="skinName" value="" />
	</div>
	<div class="col-lg-5" style="margin-top:10px;">
		<button id="readyBtn" disabled="disabled" type="submit" class="btn btn-default btn-lg">
			Enter a name to continue</button>
	</div>
</div>
</form>
<div class="clearfix"></div>
<div class="lead" id="awesomemess" style="display:none;margin-top:5px"><small>Your bar is going to be totally awesome.</small></div>

<script type="text/javascript">
	jQuery(document).ready(function ($) {
		$('#newName').keyup(function() {
			if ($(this).val() != '') {
				$('#readyBtn').removeClass('btn-default');
				$('#readyBtn').addClass('btn-success');
				$('#readyBtn').removeAttr('disabled');
				$('#readyBtn').html("<span id='readyIcon' class='glyphicon glyphicon-ok' style='display:none;margin-right:5px'></span>  I'm ready to begin creating!");
				$('#readyIcon').show();
				$('#awesomemess').show();
			} else {
				$('#readyBtn').removeClass('btn-success');
				$('#readyBtn').addClass('btn-default');
				$('#readyBtn').attr('disabled', 'disabled');
				$('#readyBtn').html('Enter a name to continue');
				$('#readyIcon').hide();
				$('#awesomemess').hide();
			}
		});
	});
</script>