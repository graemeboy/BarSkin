<?php
$array_out = '';
if (isset($bars) && !empty($bars)) {
	foreach($bars as $i=>$bd) {
		$height = $bd['height'];
		$sticky = $bd['sticky'];
		$exclude_pages = $bd['excludePages'];
		$bar_position = $bd['barPosition'];
		$array_out .= "$i,$height,$exclude_pages,$bar_position,$sticky;";
	}
}
?>
<div class="container col-lg-10">
<h3>Get Your Embed Code!</h3>
<div class="lead">You are seconds away from having your awesome bar on your website! Just stick this bit of code into your footer of your site, and your bar should appear on your site with minimal burden on your website's speed and resources.
</div>
<div class="well">
<textarea class="form-control" style="height:320px;">
<script type="text/javascript">
(function() { 
	var bs = document.createElement('script');
	var s = document.getElementsByTagName('script')[0]; 
	bs.type = 'text/javascript'; bs.async = true; 
	bs.src = '<?php echo base_url() ?>js/barSkin.js';
	s.parentNode.insertBefore(bs, s); 
})();
window.onload = function(){ 
	new barSkin('split', '<?php echo $array_out ?>', '', '', ''); 
};
</script>
</textarea>
</div>
</div>