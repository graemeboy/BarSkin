<?php
$html = stripslashes($b['mailchimpHTML']);
$code = explode('<form action="', $html);
$code = explode('" method="post"', $code[1]);
$action = $code[0];
?>
<form method="post" action="<?php echo $action ?>" target="_parent">
<?php $this->load->view('output/form_main'); ?>
</form>