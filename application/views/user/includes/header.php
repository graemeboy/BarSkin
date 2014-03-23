<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 3.2//EN">

<html>
<head>
    <title>BarSkin</title>
	<link href="<?php echo base_url('/css/bootstrap.min.css'); ?>" rel="stylesheet">
	<link href="<?php echo base_url('/css/bootstrap-glyphicons.css'); ?>" rel="stylesheet">
	<script src="<?php echo base_url('/js/jquery.min.js'); ?>"></script>
	<script src="<?php echo base_url('/js/bootstrap.min.js'); ?>"></script>
	<script src="<?php echo base_url('/js/angular.min.js'); ?>"></script>
	<script src="<?php echo base_url('/js/jquery-ui-1.10.3.min.js'); ?>"></script>
	<script src="<?php echo base_url('/js/iris.min.js'); ?>"></script>
	<link rel="stylesheet" href="<?php echo base_url('/css/style.css'); ?>" type="text/css" media="screen" charset="utf-8">
</head>
<body>
<div id="header" class="jumbotron">
	<div class="container">
		<h3>
		<div style=""><a href="<?php echo base_url() ?>"><img style="width: 130px;margin-top: -23px;" src="<?php echo base_url() ?>img/barskin2.png"/></a>
		</div>
		<?php
			if ($this->site_data['logged_in']) { ?>
			<div class="lead pull-right" style="margin-top:-55px;font-size:15px;">
				 Welcome, 
				 <?php echo anchor("user/account", $this->site_data['email_address'], 'style="font-weight:bold;"'); ?>
				 <div>
				  <?php echo anchor("user/account", '<span class="glyphicon glyphicon-user"></span> Account Settings', 'style="margin-right:10px"'); ?>
				  <?php echo anchor("user/logout", '<span class="glyphicon glyphicon-log-out"></span> Logout'); ?>
				 </div>
			<div>
			<a href="#" class="glyphicon glyphicon-"></a>
		</div>
		<?php } else { ?>
			<div class="lead pull-right" style="font-size:15px;margin-top:-55px">
				<div id="header-signIn" style="display:none;"><?php 
				$this->load->view('login/mini_signin');
				?>
				</div>
				<a href="#" id="header-signBtn" class="btn btn-primary btn-lg">Sign In</a>
			</div>
		<?php } ?>
		</h3>
	</div>
</div>
<?php
if ($this->site_data['logged_in']) { ?>
<script type="text/javascript">
jQuery(document).ready(function($) {
	$('.idDrop').dropdown();
});
</script>
<div id="primaryNav" class="navbar">
	<div class="container">
	<ul class="nav navbar-nav">
		<?php
		if ($this->site_data['logged_in']) {
			$this->load->view('user/includes/navbar');
		} ?>
	</ul>
	</div>
</div> <!-- .navbar -->
<div id="page-wrapper">
<?php } else { ?>
	<div id="page-wrapper" style="margin-top: 30px;">
<?php } ?>
<div id="page" class="container">
<script type="text/javascript">
jQuery(document).ready(function ($) {
$('#header-signBtn').click(function(e) {
		e.preventDefault();
		$(this).hide();
		$('#header-signIn').fadeIn('slow');
	});
});
</script>

