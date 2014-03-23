<div class="container col-lg-10">
<h3><span class="glyphicon glyphicon-qrcode" style="margin-right:5px"></span> Get Your Embed Code!</h3>
<div class="lead">You are seconds away from having your awesome bar on your website! Just stick this bit of code into your footer of your site, and your bar should appear. Enjoy!
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
	var excludePages = "<?php echo $exclude_pages ?>";
	var position = "<?php echo $bar_position ?>";
	var sticky = "<?php echo $sticky ?>"; 
	new barSkin(<?php echo "$bar_id, $bar_height" ?>, excludePages, position, sticky); 
};
</script></textarea>
</div>
</div>