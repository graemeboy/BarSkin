<?php 
	if (isset($messages['success_message']) && 
		trim($messages['success_message']) != '') {
		?>
		<div class="alert alert-success" style="font-size:16px;text-align:center;"><?php echo $messages['success_message'] ?></div>
		<?php
	}
	
?>
<h3><span class="glyphicon glyphicon-list" style="margin-right:5px"></span> Your Bars</h3>
<div class="lead">Manage your bars from this page. You can view in-depth statistics for each bar, by clicking the "Stats" link.</div>

<table class="table">
	<thead>
		<th class="col-lg-3">Bar Name</th>
		<th>Impressions (Today)</th>
		<th>Impressions (Month)</th>
		<th>Submissions (Today)</th>
		<th>Submissions (Month)</th>
		<th class="col-lg-3">Actions</th>
	</thead>
	<tbody>
		<?php
		if (!empty($bars_list)) {
			foreach ($bars_list as $id=>$bar) { ?>
				<tr>
					<td><?php echo $bar['name'] ?></td>
					<td><?php echo $bar['impressions_today'] ?></td>
					<td><?php echo $bar['impressions_30'] ?></td>
					<td><?php echo $bar['submissions_today'] ?></td>
					<td><?php echo $bar['submissions_30'] ?></td>
					<td><div class="btn-group">
		<?php
		/*
$bc = 'btn btn-small btn-default';
		$edit = anchor("bar/edit/$id", 'Edit', "class='$bc'");
		$stats = anchor("bar/stats/$id", 'Stats', "class='$bc'");
		$embed = anchor("bar/embed/$id", 'Embed', "class='$bc'");
		$delete = anchor("bar/delete/$id", 'Delete', "class='$bc'");
*/
	$buttons = array(
				"bar/stats/$id" => array (
					'label' => 'Stats',
					'icon' => 'stats',
					'type' => 'info',
				),
				"bar/edit/$id" => array (
					'label' => 'Edit',
					'icon' => 'edit',
					'type' => 'warning',
				),
				"bar/embed/$id" => array (
					'label' => 'Embed',
					'icon' => 'qrcode',
					'inner' => '',
					'type' => 'success',
				),
				"bar/delete/$id" => array (
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
				<?php
			}
		?>
	<!--
	<?php echo $stats ?>
		<?php echo $edit ?>
		<?php echo $embed ?>
		<?php echo $delete ?>
-->
					</div></td>
				</tr>
			<?php }
		}
		?>
	</tbody>
</table>