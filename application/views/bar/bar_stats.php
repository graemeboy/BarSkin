<?php if (!$bar_name) {
	$bar_name = 'Untitled';
	echo $url;
} 
$ranges = array (
	'5' => '5 Days',
	'10' => '10 Days',
	'30' => '30 Days',
	'60' => '60 Days',
	'360' => '1 Year',
);
if ($date_range == 360) {
	$date_range_out = 'year';
} else {
	$date_range_out = "$date_range days";
	$step = 2;
}
if ($date_range >= 60) {
	$step = 8;
}
if ($date_range > 100) {
	$step = 30;
}

// Now we find out how many impressions and submissions their are:
$impression_count = 0;
$cumulative_rate = array();
if (!empty($impressions)) {
	foreach ($impressions as $date=>$imp) {
		$impression_count += $imp;
		if (isset($submissions[$date]) && $imp != 0) {
			$cumulative_rate[$date] = $submissions[$date]/$imp;
		} else {
			$cumulative_rate[$date] = 0;
		}
	}
}
$submission_count = 0;
if (!empty($submissions)) {
	foreach ($submissions as $sub) {
		$submission_count += $sub;
	}
}
$conversion_rate = 0;
if ($impression_count != 0) {
	$conversion_rate = number_format($submission_count/$impression_count, 2);
}

if ($type == 'Form') {
	$goal_word = 'submission';
	$goal_conversion = 'conversion rate';
	$goal_explanation = 'The conversion rate is the percent of times that a person viewing your form enters their details clicks the submit button';
} else if ($type == 'Link') {
	$goal_word = 'click';
	$goal_conversion = 'clickthrough rate';
	$goal_explanation = 'The clickthrough rate is the percent of times a person who sees your bar clicks on a link';
}

?>
<div id="loading-tag" style="text-align:center;">

<div class="progress progress-striped active" style="width: 650px;margin: 20 auto;height: 41px;">
  <div class="progress-bar"  role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:100%;padding-top:5px;">
    <span class='lead'>Your visualizations are loading. Thank you for your patience.</span>
  </div>
</div>
</div>
<script type="text/javascript" src="https://www.google.com/jsapi"></script>
<script type="text/javascript">
	// Load the Visualization API and the piechart package.
      google.load('visualization', '1.0', {'packages':['corechart']});
</script>
<div class="row" style="margin-bottom:15px">
<div class="col-md-6">
<h3>Bar Stats for <span class="text-info"><?php echo $bar_name ?></span> <small>Type: <?php echo $type ?></small></h3>
</div>
<div class="col-md-6">
	<div class="col-md-12" style="margin-top:15px;margin-bottom:15px">
		<div class="pull-right">
			<label for="date-range" class="form-label col-md-2">Date Range</label>
			<div class="col-md-10 btn-group" style="padding-right:0;margin-right:0;">
			<?php
			 foreach ($ranges as $r=>$l) {
			 	echo anchor("bar/stats/$bar_id/$r", $l, 'class="btn btn-default"');
			 }
			?>
			</div>
			</div><!-- .btn-group -->
	</div><!-- pull-right -->
</div><!-- .col-md-7 -->
</div>
<div class="row col-md-12">
	<div class="col-md-4">
		<legend>By the Numbers</legend>
		<table class="table">
			<thead>
				<th>Statistic</th>
				<th>Count</th>
			</thead>
			<tr>
				<td><?php echo ucfirst($goal_conversion) ?> in last <?php echo $date_range_out ?></td>
				<td><?php echo $conversion_rate ?>%</td>
			</tr>
			<tr>
				<td>Impressions in last <?php echo $date_range_out ?></td>
				<td><?php echo $impression_count ?></td>
			</tr>
			<tr>
				<td><?php echo ucfirst($goal_word)?>s in last <?php echo $date_range_out ?></td>
				<td><?php echo $submission_count ?></td>
			</tr>
			<tr>
				<td>Overall <?php echo ucwords($goal_conversion) ?></td>
				<td><?php echo 0 ?>%</td>
			</tr>
			<tr>
				<td>Total Impressions</td>
				<td><?php echo $total_impressions ?></td>
			</tr>
			<tr>
				<td>Total <?php echo ucfirst($goal_word)?>s</td>
				<td><?php echo $total_submissions ?></td>
			</tr>
		</table>
		</div>
	<div class="col-md-8">
	<legend>Visualizations</legend>
	<div class="lead">Scroll down to see visualizations of your Bar data</div>
	<legend style="font-size:18px"><?php echo ucwords($goal_conversion) ?></legend>
	<div id="conversion_chart"></div>
	<script type="text/javascript">
	google.setOnLoadCallback(drawConversion);
      function drawConversion() {
        // Create the data table.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Date');
        data.addColumn('number', '<?php echo ucwords($goal_conversion) ?>');
        <?php
        if (!empty($cumulative_rate)) {
        	$rows = '[';
	        foreach ($cumulative_rate as $d=>$n) {
	        	$d = explode(' ', $d);
	        	$d = "{$d[0]} {$d[1]}";
		        $rows .= "['$d', $n],";
	        }
	        $rows .= ']';
        }
        ?>
        data.addRows(<?php echo $rows ?>);
        // Set chart options
        var options = {
        	'title': '<?php echo ucwords($goal_conversion) ?> in Last <?php echo ucwords($date_range_out) ?>',	
        	'colors': ['#563d7c'],
            'width':'100%',
            'height': 350,
			hAxis: {showTextEvery: <?php echo $step ?>, },
			vAxis: { 
			    viewWindowMode:'explicit',
			    viewWindow: {
			        min:0
			    }
			}
        };

        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.LineChart(document.getElementById('conversion_chart'));
        chart.draw(data, options);
      }
</script>

<legend style="font-size:18px">Impressions</legend>
<div id="impression_chart"></div>
<script type="text/javascript">
	google.setOnLoadCallback(drawImpressions);
      function drawImpressions() {
        // Create the data table.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Date');
        data.addColumn('number', 'Impressions');
        <?php
        if (isset($impressions) && !empty($impressions)) {
        	$rows = '[';
	        foreach ($impressions as $d=>$n) {
	        	$d = explode(' ', $d);
	        	$d = "{$d[0]} {$d[1]}";
		        $rows .= "['$d', $n],";
	        }
	        $rows .= ']';
        }
        ?>
        data.addRows(<?php echo $rows ?>);
        // Set chart options
        var options = {
        	'title': 'Impressions in Last <?php echo ucwords($date_range_out) ?>',	
        	'colors': ['#3a87ad'],
            'width':'100%',
            'height': 350,
			hAxis: {showTextEvery: <?php echo $step ?>, },
			vAxis: { 
			    viewWindowMode:'explicit',
			    viewWindow: {
			        min:0
			    }
			}
        };

        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.LineChart(document.getElementById('impression_chart'));
        chart.draw(data, options);
      }
</script>
<legend style="font-size:18px"><?php echo ucwords($goal_word)?>s</legend>
<div id="submission_chart"></div>
<script type="text/javascript">
	google.setOnLoadCallback(drawImpressions);
      function drawImpressions() {
        // Create the data table.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Date');
        data.addColumn('number', '<?php echo ucfirst($goal_word)?>s');
        <?php
        if (isset($submissions) && !empty($submissions)) {
        	$rows = '[';
	        foreach ($submissions as $d=>$n) {
	        	$d = explode(' ', $d);
	        	$d = "{$d[0]} {$d[1]}";
		        $rows .= "['$d', $n],";
	        }
	        $rows .= ']';
        }
        ?>
        data.addRows(<?php echo $rows ?>);
        // Set chart options
        var options = {
        	'title': '<?php echo ucfirst($goal_word)?>s in Last <?php echo ucwords($date_range_out) ?>',	
        	'colors': ['#3a87ad'],
            'width':'100%',
            'height': 350,
			hAxis: {showTextEvery: <?php echo $step ?>, },
			vAxis: { 
			    viewWindowMode:'explicit',
			    viewWindow: {
			        min:0
			    }
			}
        };

        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.LineChart(document.getElementById('submission_chart'));
        chart.draw(data, options);
      }
      
      jQuery(document).ready(function($) {
	    $('#loading-tag').hide();
      });
</script>


	</div>
</div>
</div>