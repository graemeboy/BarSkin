<div class="splash-panel" style="padding-top:10px;padding-bottom:5px;">
	<h3 style="text-align:center;margin-top:-10px;">Maximize Control of Your Traffic, Today!</h3>
	<div class="lead" style="text-align:center">Make every visitor count, by presenting them with attractive call-to-action bars.<br/>Increase subscribers with opt-in forms, or direction your traffic with targeted links.</div>
	</div>
	<div class="row">
		<div class="col-lg-7">
			<div style="text-align:center">
				<div style="height:350px; margin: 0 0 10px 0; border: 1px solid #eee">
					Video goes here.
				</div>
			</div>
		</div>
		<div class="col-lg-5 well" id="signup-wrapper">
			<div class="lead">Complete the form below to sign up for free!</div>
			<?php $this->load->view('login/signup_form'); ?>
		</div><!-- .col-lg-5 -->
	</div>
</div>
<div class="clearfix"></div>
<div class="container">
<div class="splash-panel alert splash-dark">
	<h3><span class="glyphicon glyphicon-cog" style="vertical-align:middle;margin-right:15px;"></span>Full Customization - No Coding Required</h3>
	<div class="lead">
		With over 50 controls for customization, you can make your bar look exactly how you want it on your page. Expert tutorials can guide you through the process of designing an attractive form, with no knowledge of coding required.
	</div>
</div>
<div class="splash-panel alert alert-info">
	<h3><strong style="font-family:'Times New Roman';"><span>A</span>/<span style="margin-right:15px;">B</span></strong>
		Split-Test Your Designs</h3>
	<div class="lead">
		If you want to know what works with your website users, the only way to tell is by testing. BarSkin makes split-testing effortless and fun - just set up two or more bars, and tell BarSkin to place one random bar on your site at a time. Come back in a few days and compare performances!
	</div>
</div>
<div class="splash-panel alert splash-dark">
	<h3><span class="glyphicon glyphicon-signal" style="vertical-align:middle;margin-right:15px;"></span>
		Live Statistics</h3>
	<div class="lead">
		Know exactly how your bars are performing with instantly-updating statistics, including visualizations.
	</div>
</div>
<div class="splash-panel alert alert-info">
	<h3><span class="glyphicon glyphicon-globe" style="vertical-align:middle;margin-right:15px;"></span>
		Support and Community</h3>
	<div class="lead">
		Join a community of thousands of other website owners who are successfully using BarSkin to increase their subscriber counts and user engagement. Our support team in on-call from around the world to help improve your gains and experience.
	</div>
</div>
<div class="splash-panel alert-success alert">
	<h3><span class="glyphicon glyphicon-star" style="vertical-align:middle;margin-right:15px;"></span>
		Unlimited Creativity for only $5 per month</h3>
	<div class="lead">
		Grab full access to <strong>our entire collection of pre-made designs</strong>, <strong>full customization</strong>, <strong>lifetime updates</strong>, and more for only $5 per month.
	</div>
	<div style="text-align:center">
<a href="#" class="btn btn-lg btn-success signup-button" style="font-size:22px;padding:25px 60px 25px 60px" >
<div>
<span class="glyphicon glyphicon-shopping-cart" style="vertical-align:middle;margin-right:10px;"></span><span>Sign Up Now</span>
</div>
</a>
</div>
</div>

<style type="text/css">
	#page {
		border: none !important;
	}
	.splash-panel {
		padding: 30px 60px;
		margin-bottom: 0px;
	}
	.splash-dark:hover{
		background-image: -webkit-gradient(linear, 0 top, 100% top, from(rgba(0, 0, 0, 0.05)), to(rgba(255, 255, 255, 0.1)));
background-image: -webkit-linear-gradient(left, color-stop(rgba(0, 0, 0, 0.05) 0), color-stop(rgba(255, 255, 255, 0.1) 100%));
background-image: -moz-linear-gradient(left, rgba(0, 0, 0, 0.05) 0, rgba(255, 255, 255, 0.1) 100%);
background-image: linear-gradient(to right, rgba(0, 0, 0, 0.05) 0, rgba(255, 255, 255, 0.1) 100%);
	}
	.splash-panel:hover {
		border-width: 2px;
	}
	.splash-dark {
		background-color: #357ebd;
		color: #ffffff;
		border-color: #357ebd;
		border-style: solid;
		border-width: 1px;
	}
	.glyphicon-chevron-right, .glyphicon-chevron-left {
		color: #357ebd;
	}
	.carousel-control {
		
		background-color: rgba(0,0,0,0.0001) !important;
background-color: transparent !important;
background-image: none !important;
	}
</style>
<script type="text/javascript">
jQuery(document).ready(function ($) {
	$('.signup-button').click(function() {
		$('#signup-email').focus();
		$('#signup-wrapper').addClass('alert-info')
	});
});
</script>
</div>