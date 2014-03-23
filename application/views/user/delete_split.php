<h3><span class="glyphicon glyphicon-trash"></span> Delete Request</h3>

<div class="well" style="text-align:center">
	<div class="lead">Are you sure you want to delete your split-set, 
		<span class="text-info"><?php echo $split_name ?>?</span>
	</div>
	
	<?php echo anchor("user/delete_split/$split_id/true", 'Yes, please', 'class="btn btn-danger"'); ?>
	<?php echo anchor("user/bars", 'No, thank you', 'class="btn btn-default"'); ?>	
</div>