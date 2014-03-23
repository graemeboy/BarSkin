<?php 
	if (isset($messages['success_message']) && 
		trim($messages['success_message']) != '') {
		?>
		<div class="alert alert-success" style="font-size:16px;text-align:center;"><?php echo $messages['success_message'] ?></div>
		<?php
	}
?>
<h3><span class="glyphicon glyphicon-list-alt" style="margin-right:5px"></span> Split-Testing</h3>
<div class="lead">
Here you can manage your split-testing efforts! Click the "Stats" link to see in-depth details about your split-testing sets, or click "Create New Set" to start a new split-testing project!
</div>
<?php echo anchor('user/create_split', '<span class="glyphicon glyphicon-star-empty"></span> Create a Split-Testing Set', 'style="margin:15px 0;"class="btn btn-primary btn-lg"'); ?>
<?php if (isset($sets) && !empty($sets)) { ?>
<h4>Current Sets</h4>
<table class="table">
	<thead>
		<th class="col-lg-5">Set Name</th>
		<th>Actions</th>
	</thead>
	<tbody>
	<?php
	if (isset($sets) && !empty($sets)) {
		foreach($sets as $set) {
			$id = $set['id'];
			$n = $set['set_name'];
			?>
			<tr>
			<td><?php echo $n ?></td>
			<td><div class="btn-group">
			<?php 
			$buttons = array(
				"user/set_stats/$id" => array (
					'label' => 'Stats',
					'icon' => 'stats',
					'type' => 'info',
				),
				"user/edit_split/$id" => array (
					'label' => 'Edit',
					'icon' => 'wrench',
					'type' => 'warning',
				),
				"user/embed_set/$id" => array (
					'label' => 'Embed',
					'icon' => '',
					'inner' => '<span class="glyphicon glyphicon-chevron-left" style="
"></span><span class="glyphicon glyphicon-chevron-right"></span>',
					'type' => 'success',
				),
				"user/delete_split/$id" => array (
					'label' => 'Delete',
					'icon' => 'trash',
					'type' => 'danger',
				),
			);
			foreach ($buttons as $u=>$b) {
				$ic = $b['icon'];
				$ty = $b['type'];
				$lb = $b['label'];
				?>
				<a href="<?php echo base_url() . "index.php/$u" ?>" class="btn btn-small btn-<?php echo $ty ?> glyphicon glyphicon-<?php echo $ic ?>" style="font-size:20px;padding-top:8px">
					<?php
					if (isset($b['inner'])) {
						echo $b['inner'];
					}
					?>
					<div style="font-size:14px;padding-top:1px"><?php echo $lb ?></div>
				</a>
				<?php } ?>

			</td>
			
			</tr>
			<?php
		}
	}
	?>
	</tbody>
</table>

<?php } else { ?>
	<div class="lead" style="margin-top:10px">You do not currently have any split-testing sets!</div>
	
<?php } ?>