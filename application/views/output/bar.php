<?php
//print_r($bar_properties);
$b = $bar_properties;
$bgTop = $b['bgTopColor'];
$bgBot = $b['bgBottomColor'];
$brSize = $b['bgBorderBottomSize'];
$brColor = $b['bgBorderBottomColor'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

<html>
<head>
	<script type="text/javascript" src="<?php echo base_url() ?>js/jquery.min.js"></script>
	
	<script type="text/javascript">
		jQuery(document).ready(function ($) {
			$('form').submit(function (e) {
				var self = $(this);
				// Form has been submitted!!
				e.preventDefault();
				$.ajax({
				  type: "POST",
				  url: "<?php echo base_url() ?>index.php/us/s/<?php echo $bar_id ?>",
				  data: { bar_id: "<?php echo $bar_id ?>" }
				}).done(function() {
					self.unbind('submit').submit();
				});
			});
			$('a').click(function (e) {
				var self = $(this);
				// Form has been submitted!!
				e.preventDefault();
				$.ajax({
				  type: "POST",
				  url: "<?php echo base_url() ?>index.php/us/s/<?php echo $bar_id ?>",
				  data: { bar_id: "<?php echo $bar_id ?>" }
				}).done(function() {
					self.unbind('submit').submit();
				});
			});
		});
	</script>
<style type="text/css">
    body {
	    margin: 0;
	    padding:0;
    }
    a {
	    text-decoration: none;
    }
    .barskin {
	    padding-top: <?php echo $b['bgPaddingTop'] ?>px;
	    padding-bottom: <?php echo $b['bgPaddingBottom'] ?>px;
	    width: 100%;
	    text-align: center;
	    background-color: <?php echo $bgTop ?>;
	    background-image: -webkit-gradient(linear, 0% 0%, 0% 100%, from(<?php echo $bgTop ?>), to(<?php echo $bgBot ?>));
	    background-image: -webkit-linear-gradient(top, <?php echo $bgTop ?>, <?php echo $bgBot ?>); 
	    background-image: -moz-linear-gradient(top, <?php echo $bgTop ?>, <?php echo $bgBot ?>);
	    background-image: -ms-linear-gradient(top, <?php echo $bgTop ?>, <?php echo $bgBot ?>);
	    background-image: -o-linear-gradient(top, <?php echo $bgTop ?>, <?php echo $bgBot ?>);
	    border-bottom: <?php echo "{$brSize}px solid $brColor" ?>;
    }
	#leftContent {
	    font-family: <?php echo $b['leftFontType'] ?>;
	    color: <?php echo $b['leftColor'] ?>;
	    <?php if ($b['leftPaddingLeft'] != '') { ?>
	    padding-left: <?php echo $b['leftPaddingLeft'] ?>px;
	    <?php } ?>
	    <?php if ($b['leftPaddingRight'] != '') { ?>
	    padding-right: <?php echo $b['leftPaddingRight'] ?>px;
	    <?php } ?>
	    font-size: <?php echo $b['leftFontSize'] ?>px;
	    font-weight: <?php echo $b['leftFontWeight'] ?>;
	    text-shadow: <?php 
	    	echo $b['leftTextShadowRight'] ?>px <?php 
	    	echo $b['leftTextShadowBottom'] ?>px <?php 
	    	echo $b['leftTextShadowLeft'] ?>px <?php 
	    	echo $b['leftTextShadowColor'] ?>;
    }
    #rightContent {
	    font-family: <?php echo $b['rightFontType'] ?>;
	    color: <?php echo $b['rightColor'] ?>;
	    <?php if ($b['rightPaddingLeft'] != '') { ?>
	    padding-left: <?php echo $b['rightPaddingLeft'] ?>px;
	    <?php } ?>
	    <?php if ($b['rightPaddingRight'] != '') { ?>
	    padding-right: <?php echo $b['leftPaddingRight'] ?>px;
	    <?php } ?>
	    font-size: <?php echo $b['rightFontSize'] ?>px;
	    font-weight: <?php echo $b['rightFontWeight'] ?>;
	    text-shadow: <?php 
	    	echo $b['rightTextShadowRight'] ?>px <?php 
	    	echo $b['rightTextShadowBottom'] ?>px <?php 
	    	echo $b['rightTextShadowLeft'] ?>px <?php 
	    	echo $b['rightTextShadowColor'] ?>;
    }
    
<?php if ($b['middleContentType'] == 'link') { ?>
    #barLink {
	    color: <?php echo $b['linkColor'] ?>;
	    font-family: <?php echo $b['linkFontType'] ?>;
	    font-size: <?php echo $b['linkSize'] ?>px;
	    font-weight: <?php echo $b['linkFontWeight'] ?>;
	    text-shadow: <?php 
	    	echo $b['linkTextShadowRight'] ?>px <?php 
	    	echo $b['linkTextShadowBottom'] ?>px <?php 
	    	echo $b['linkTextShadowLeft'] ?>px <?php 
	    	echo $b['linkTextShadowColor'] ?>;
    }
    <?php } else if ($b['middleContentType'] == 'form') { ?>
    form {
    	display: inline;    
		margin: 0;
		padding:0;
    }
    .barskin input[type="text"]  {
		-webkit-appearance: none;
		-webkit-rtl-ordering: logical;
		-webkit-user-select: text;
		-webkit-writing-mode: horizontal-tb;
		background-color: rgb(255, 255, 255);
		background-image: none;
		border-bottom-color: rgb(204, 204, 204);
		border-bottom-left-radius: 2.9861111640930176px;
		border-bottom-right-radius: 2.9861111640930176px;
		border-bottom-style: solid;
		border-bottom-width: 1.1111111640930176px;
		border-image-outset: 0px;
		border-image-repeat: stretch;
		border-image-slice: 100%;
		border-image-source: none;
		border-image-width: 1;
		border-left-color: rgb(204, 204, 204);
		border-left-style: solid;
		border-left-width: 1.1111111640930176px;
		border-right-color: rgb(204, 204, 204);
		border-right-style: solid;
		border-right-width: 1.1111111640930176px;
		border-top-color: rgb(204, 204, 204);
		border-top-left-radius: 2.9861111640930176px;
		border-top-right-radius: 2.9861111640930176px;
		border-top-style: solid;
		border-top-width: 1.1111111640930176px;
		box-sizing: border-box;
		color: rgb(85, 85, 85);
		cursor: auto;
		display: inline-block;
		font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
		font-size: 13.333333969116211px;
		font-weight: normal;
		height: 29.75694465637207px;
		letter-spacing: normal;
		line-height: normal;
		margin-bottom: 0px;
		margin-left: 0px;
		margin-right: 0px;
		margin-top: 0px;
		padding-bottom: 5.989583492279053px;
		padding-left: 5.989583492279053px;
		padding-right: 5.989583492279053px;
		padding-top: 5.989583492279053px;
		text-align: start;
		text-indent: 0px;
		text-shadow: none;
		text-transform: none;
		width: 138.64584350585938px;
		word-spacing: 0px;
		writing-mode: lr-tb;
	}
	.barskin input[type="submit"] {
		-webkit-align-items: flex-start;
		-webkit-appearance: none;
		-webkit-rtl-ordering: logical;
		-webkit-user-select: text;
		-webkit-writing-mode: horizontal-tb;
		background-image: none;
		border-bottom-left-radius: 2.9861111640930176px;
		border-bottom-right-radius: 2.9861111640930176px;
		border-bottom-style: solid;
		border-bottom-width: 1.1111111640930176px;
		border-image-outset: 0px;
		border-image-repeat: stretch;
		border-image-slice: 100%;
		border-image-source: none;
		border-image-width: 1;
		border-left-style: solid;
		border-left-width: 1.1111111640930176px;
		border-right-style: solid;
		border-right-width: 1.1111111640930176px;
		border-top-left-radius: 2.9861111640930176px;
		border-top-right-radius: 2.9861111640930176px;
		border-top-style: solid;
		border-top-width: 1.1111111640930176px;
		box-sizing: border-box;
		cursor: pointer;
		display: inline-block;
		font-weight: normal;
		letter-spacing: normal;
		line-height: 1;
		margin: 0;
		text-align: center;
		text-indent: 0px;
		text-shadow: none;
		text-transform: none;
		white-space: pre;
		word-spacing: 0px;
		writing-mode: lr-tb;

		padding: <?php 
			echo $b['buttonVerticalPadding'] ?>px <?php 
			echo $b['buttonHorizontalPadding'] ?>px;
		background-color: <?php echo $b['buttonColor'] ?>;
		color: <?php echo $b['buttonTextColor'] ?>;
		border-radius: <?php echo $b['buttonBorderRadius'] ?>px;
		-webkit-border-radius: <?php echo $b['buttonBorderRadius'] ?>px;
		-moz-border-radius: <?php echo $b['buttonBorderRadius'] ?>px;
		border: 1px solid <?php echo $b['buttonBorderColor'] ?>;
		font-size: <?php echo $b['buttonFontSize'] ?>px;
	}
    <?php } ?>
    
    .barSkinSpan {
    	display: inline-block;
    }

    </style>

    <title></title>
</head>

<body>
    <div class="bar-wrapper">
        <div class="barskin">
            <div class="barSkinSpan" id="leftContent">
                <?php echo $b['leftContent'] ?>
            </div><?php if ($b['middleContentType'] == 'link') { ?>

            <div class="barSkinSpan">
                <a href="<?php echo $b['linkLocation'] ?>" id="barLink" target="_parent"><?php echo $b['linkText'] ?></a>
            </div><?php } else if ($b['middleContentType'] == 'form') { ?>
				<div class="barSkinSpan barForm">
            <?php
            	$p = $b['formProvider'];
	            if ($p == 'aweber') {
	            	$this->load->view('output/forms/aweber', array('b' => $b));
	            } else if ($p == 'mailchimp') {
		            $this->load->view('output/forms/mailchimp', array('b' => $b));
	            } else if ($p == 'custom') {
		            $this->load->view('output/forms/custom', array('b' => $b));
	            } else if ($p == 'feedburner') {
		            $this->load->view('output/forms/feedburner', array('b' => $b));
	            }
            ?>
            </div>
            <?php } ?>
            <div class="barSkinSpan" id="rightContent">
                <?php echo $b['rightContent'] ?>
            </div>
            <div style="clear:both"></div>
        </div>
    </div>
</body>
</html>