<?php
$menu_items = array (
	'user/dashboard' => '<span class="glyphicon glyphicon-home"></span> Your Dashboard',
	'bar/create' => '<span class="glyphicon glyphicon-star"></span> Create Bar',
	'user/bars' => '<span class="glyphicon glyphicon-list"></span> Your Bars',
	//'user/manage' => 'Manage Bars',
	'user/create_split' => '<span class="glyphicon glyphicon-star-empty"></span> Create A/B Test',
	'user/split_testing' => '<span class="glyphicon glyphicon-list-alt"></span> Your A/B Tests',
	'user/support' => '<span class="glyphicon glyphicon-envelope"></span> Help',
);
$right_items = array(
	
);
$cur_page = $this->uri->rsegment(1) . '/' . $this->uri->rsegment(2);
?>
<?php
	if (!empty($menu_items)) {
		foreach ($menu_items as $i=>$n) {
			?>
			<li class="<?php 
				if ($i == $cur_page) { echo 'active'; } 
			?>"><?php echo anchor($i, $n)?></li>
			<?php	
		}
	}
	?>
