<h3 style="margin-bottom:20px;">Edit Split-Testing Set</h3>

<?php
if (isset($success_message) && trim($success_message) != '') {
	?><div class="alert alert-success"><span class="glyphicon glyphicon-ok" style="margin-right:5px"></span> <?php echo $success_message ?></div>
<?php } ?>
<?php echo form_open('user/process_split', array('class'=>'form')); ?>
<div class="create-split-table" style="margin-bottom:20px;margin-top:0px;">
<div class="lead col-lg-12">
Select which bars you would like to include in your new Split-Testing Set.
<br/><small style="font-size:14px">BarSkin will randomly display one of the selected bars whenever someone views your page.</small>
</div>

<table class="table">
<thead>
	<th style="width:35px;"></th>
	<th>Bar Name</th>
</thead>
<tbody>
<?php
if (isset($bars) && !empty($bars)) {
	foreach($bars as $bar) { ?>
		<tr>
		<td><input type="checkbox" name="bars[]" value="<?php echo $bar['id'] ?>" <?php
		if (is_array($selected_bars)) {
			if (in_array($bar['id'], $selected_bars)) {
				echo 'checked="checked"';
			}
		}
		?>></td>
		<td><?php echo $bar['name'] ?></td>
		</tr>
	<?php }
	} ?>
</tbody>
</table>
<input type="hidden" name="set_id" value="<?php echo $set_id ?>" />
<button type="submit" class="btn btn-success btn-lg"><span class="glyphicon glyphicon-save" style="margin-right:5px"></span> Update Set</button>
<?php echo anchor("user/embed_set/$set_id", '<span class="glyphicon glyphicon-qrcode" style="margin-right:5px"></span> Get Embed Code', 'class="btn btn-lg btn-info"') ?>
</form>
</div>