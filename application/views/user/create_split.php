<h3><span class="glyphicon glyphicon-star-empty" style="margin-right:5px"></span> Create a New Split-Testing Set</h3>

<?php echo form_open('user/process_split', array('class'=>'form')); ?>
<div class="lead">
Please name your testing set before we begin.
</div>
<div class="form-group col-lg-5">
	<div class="col-lg-12">
		<input type="text" id="newName" autocomplete="off" class="form-control input-lg" placeholder="Your Set's Name" name="setName" value="" />
	</div>
	<div class="col-lg-5" style="margin-top:10px;">
		<button id="readyBtn" disabled="disabled" type="submit" class="btn btn-default btn-lg">
			Enter a name to continue</button>
	</div>
</div>
</form>

<script type="text/javascript">
	jQuery(document).ready(function ($) {
		$('#newName').keyup(function() {
			if ($(this).val() != '') {
				$('#readyBtn').removeClass('btn-default');
				$('#readyBtn').addClass('btn-success');
				$('#readyBtn').removeAttr('disabled');
				$('#readyBtn').html("<span id='readyIcon' class='glyphicon glyphicon-ok' style='display:none;margin-right:5px'></span>  Let's create a set!");
				$('#readyIcon').show();
			} else {
				$('#readyBtn').removeClass('btn-success');
				$('#readyBtn').addClass('btn-default');
				$('#readyBtn').attr('disabled', 'disabled');
				$('#readyBtn').html('Enter a name to continue');
				$('#readyIcon').hide();
			}
		});
	});
</script>