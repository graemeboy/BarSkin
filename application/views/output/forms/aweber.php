<form method="post" action="http://www.aweber.com/scripts/addlead.pl" target="_parent">

<input type="hidden" name="meta_web_form_id" value="<?php echo $b['aweberID'] ?>">
<input type="hidden" name="redirect" value="<?php echo $b['aweberRedirect'] ?>">
<input type="hidden" name="meta_adtracking" value="<?php echo $b['aweberAd'] ?>">

<?php 
$this->load->view('output/form_main'); ?>

</form>