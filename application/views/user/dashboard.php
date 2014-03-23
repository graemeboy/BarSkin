<?php
if (!isset($num_bars)) {
	$num_bars = 0;
}
?>
<div class="dash-main col-md-8">
<h3>Dashboard</h3>
<div class="lead">
	<blockquote>
		<p>
			You have created <?php echo anchor('user/bars', "$num_bars bars" ) ?></a>
			<?php echo anchor('bar/create', "<span class='glyphicon glyphicon-star'></span> Create a new bar", 'class="btn btn-default btn-sm"' ) ?>
		</p>
		<p>
			You have created <?php echo anchor('user/bars', "$num_sets split-testing sets" ) ?></a>
			<?php echo anchor('user/create_split', "<span class='glyphicon glyphicon-star-empty'></span> Create a new testing set", 'class="btn btn-default btn-sm"' ) ?>
		</p>
	</blockquote>
	
</div>

<?php
if ($role == 'free') { ?>

<div class="">
<h4 style="margin-top:40px">You are currently using a free account.</h4>
<div class="lead">Upgrade your current for $5 per month, and get access to:
<ul style="font-size:19px">
	<li>Unlimited bar creation</li>
	<li>A/B split-testing statistics</li>
	<li>Insights into bar design optimizations (coming soon!)</li>
</ul>
<div>
<?php echo anchor('user/upgrade', '<span class="glyphicon glyphicon-shopping-cart"></span> Upgrade Now', 'class="btn btn-success col-md-offset-3"'); ?>
</div>
</div>
</div>
<?php }
?>
</div>
<div class="dash-side col-md-4">
<h3>How to use this site</h3>
<div class="lead" style="font-size:17px">
<p>Use the menu bar above to navigate. For example, click on "Create Bar" to create a new bar.</p>
<p>Once you have created more than one bar, you can create A/B testing sets to compare the performance of each of your bars! Just click "Create A/B Test" for this option.</p>
<p>If you have any problems using the site, you can contact our support team by clicking the "Help" link.
</div>
</div>