<?php
$action = $b['customAction'];
$hidden_fields = array(1,2,3,4);
$hiddens = array();
foreach ($hidden_fields as $field) {
	if (isset($b['customHiddenName' . $field])) {
		$name = $b['customHiddenName' . $field];
		if (trim($name) != '') {
			$value = $b['customHiddenValue' . $field];
		}
		$hiddens[$name] = $value;
	}
}
?>
<form method="post" action="<?php echo $action ?>" target="_parent">
<?php $this->load->view('output/form_main'); ?>

<?php
if (!empty($hiddens)) {
	foreach ($hiddens as $n=>$v) { ?>
	<input type="hidden" name="<?php echo $n ?>" value="<?php echo $v ?>" />
	<?php }
}
?>
</form>