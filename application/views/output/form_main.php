<?php
$p = $b['formProvider'];
if ($p == 'mailchimp') {
	$name = $b['mailchimpName'];
	$email = $b['mailchimpEmail'];
} else if ($p = 'custom') {
 	$name = $b['customName'];
 	$email = $b['customEmail'];
} else if ($p == 'aweber') {
	$name = 'name';
	$email = 'email';
} else {
	$name = 'name';
	$email = 'email';
}
?>

<?php if ($b['includeName'] == 'yes') { ?>
<input type="text" placeholder="<?php echo $b['namePlaceholder'] ?>" name="<?php echo $name ?>"> 
<?php } ?>
<input type="text" placeholder="<?php echo $b['emailPlaceholder'] ?>" name="<?php echo $email ?>"> 
<input type="submit" value="<?php echo $b['buttonText'] ?>">