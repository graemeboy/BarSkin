<form action="http://feedburner.google.com/fb/a/mailverify" method="post" target="popupwindow" onsubmit="window.open('http://feedburner.google.com/fb/a/mailverify?uri=<?php echo $b['feedburnerID'] ?>', 'popupwindow', 'scrollbars=yes,width=550,height=520');return true">

<input type="hidden" name="meta_web_form_id" value="<?php echo $b['aweberID'] ?>">
<input type="hidden" name="redirect" value="<?php echo $b['aweberRedirect'] ?>">
<input type="hidden" name="meta_adtracking" value="<?php echo $b['aweberAd'] ?>">
<input type="hidden" value="<?php echo $b['feedburnerID'] ?>" name="uri"/>
<?php $this->load->view('output/form_main'); ?>
</form>