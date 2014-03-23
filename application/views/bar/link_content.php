<div class="col-md-6">
	<div class="form-group row">
		<label class="form-label col-md-4">Link Text<br/><small>What should it say?</small></label>
		<div class="col-md-8">
			<input type="text" class="form-control" ng-init="linkText='<?php echo $ld['linkText'] ?>'" ng-model="linkText" name="linkText" />
		</div>
	</div>
	<div class="form-group row">
		<label class="form-label col-md-4">Link Color</label>
		<div class="input-group col-md-4">
			<input type="text" class="form-control color-picker" ng-init="linkColor='<?php echo $ld['linkColor'] ?>'" ng-model="linkColor" name="linkColor" />
			<span style="display:none;" id="colorpicker-hide-linkColor" class="input-group-addon" href="#">
				<a href="#" data-model="linkColor" class="close colorpicker-hide glyphicon glyphicon-ok" style="padding-top:2px;padding-bottom:2px;"></a>
			</span>
		</div>
	</div>
	

	<div class="form-group row">
		<label class="form-label col-md-4">Link Size</label>
		<div class="input-group col-md-3">
			<input type="text" class="form-control" ng-init="linkSize='<?php echo $ld['linkSize'] ?>'" ng-model="linkSize" name="linkSize" />
			<span class="input-group-addon">px</span>
		</div>
	</div>
	<div class="form-group row">
		<label class="form-label col-md-4">Link Font Type</label>
		<div class="col-md-8">
		<?php
			echo form_dropdown('linkFontType', $font_list_nice, $ld['linkFontType'], 'class="form-control" ng-model="linkFontType" ng-init="linkFontType=\''.$ld['linkFontType'].'\'"');
		?></div>
	</div>
</div>
<div class="col-md-6">
	<div class="form-group">
	<label class="form-label col-md-4">Reference<br/><small>Where should the user to go?</small></label>
	<div class="col-md-8">
		<input type="text" class="form-control" ng-model="linkLocation" ng-init="linkLocation='<?php echo $ld['linkLocation'] ?>'" name="linkLocation" />
		<span class="help-block">e.g. http://www.example.com/example</span>
	</div>
	</div>
	<div class="form-group row">
		<label class="form-label col-md-4">Link Font Weight</label>
		<div class="col-md-8">
		<?php
			$font_weights = array(100,200,300,400,500,600,700,800);
			$font_weights_list = array();
			foreach ($font_weights as $f) {
				$font_weights_list[$f] = $f;
			}
			echo form_dropdown('linkFontType', $font_weights_list, $ld['linkFontWeight'], 'class="form-control" ng-model="linkFontWeight" ng-init="linkFontWeight=\''.$ld['linkFontWeight'].'\'"');
		?></div>
	</div>
	<?php
				$pos = 'link';
				$shadowColor = $bar_properties[$pos . 'TextShadowColor'];
				$shadowSizeRight = $bar_properties[$pos . 'TextShadowRight'];
				$shadowSizeBottom = $bar_properties[$pos . 'TextShadowBottom'];
				$shadowSizeLeft = $bar_properties[$pos . 'TextShadowLeft'];
					?>
<legend style="font-size:17px;">Text Shadow</legend>
				<div class="help-block" style="margin-top:-10px;margin-bottom:15px;">
You can create an awesome shadow around your text. Try setting the three position settings to 1, 1, 1.</div>
			<div class="form-group row">
				<label class="form-label col-md-12">Text Shadow Color</label>
				<div class="col-md-5">
				<div class="input-group">
				<input type="text" ng-init="<?php echo "{$pos}TextShadowColor='$shadowColor'" ?>" ng-model="<?php echo $pos ?>TextShadowColor" class="form-control color-picker" name="<?php echo $pos ?>TextShadowColor" value="<?php echo $shadowColor ?>">
				<span style="display:none;" id="colorpicker-hide-<?php echo $pos ?>TextShadowColor" class="input-group-addon" href="#">
							<a href="#" data-model="<?php echo $pos ?>TextShadowColor" class="close colorpicker-hide glyphicon glyphicon-ok" style="padding-top:2px;padding-bottom:2px;"></a>
				</span>
				</div>
				</div>
				<div id="open-picker-<?php echo $pos ?>TextShadowColor"></div>
			</div>
			<div class="form-group row">
				<label class="form-label col-md-12">Text Shadow Position</label>
				<div class="col-md-12">
					<div class="col-md-4">
						<label class="form-label">Horizontal</label>
						<div class="input-group">
						<input type="text" 
							ng-init="<?php echo "{$pos}TextShadowRight='$shadowSizeRight'" ?>" ng-model="<?php echo $pos ?>TextShadowRight" class="form-control" name="<?php echo $pos ?>TextShadowRight" value="<?php echo $shadowSizeRight ?>">
							<span class="input-group-addon">px</span>
						</div>
					</div>
					<div class="col-md-4">
						<label class="form-label">Vertical</label>
						<div class="input-group">
						<input type="text" ng-init="<?php echo "{$pos}TextShadowBottom='$shadowSizeBottom'" ?>" ng-model="<?php echo $pos ?>TextShadowBottom"
							class="form-control" name="<?php echo $pos ?>TextShadowBottom" value="<?php echo $shadowSizeBottom ?>">
							<span class="input-group-addon">px</span>
						</div>
					</div>
					<div class="col-md-4">
						<label class="form-label">Blur</label>
						<div class="input-group">
						<input type="text" ng-init="<?php echo "{$pos}TextShadowLeft='$shadowSizeLeft'" ?>" ng-model="<?php echo $pos ?>TextShadowLeft"
							class="form-control" name="<?php echo $pos ?>TextShadowLeft" value="<?php echo $shadowSizeLeft ?>">
							<span class="input-group-addon">px</span>
						</div>
					</div>
				</div>
			</div>


	
	<!-- Can't do this anymore because target="_parent" is required in iFrame.
<div class="form-group">
	<label class="form-label col-md-4">Click Options<br/><small>Where happens on a click?</small></label>
	<div class="col-md-8">
		<?php
		$click_options = array (
			'_blank' => 'Open in New Tab/Window',
			'_self' => 'Open in Same Tab/Window',
		);
		echo form_dropdown('onClick', $click_options, $ld['onClick'], 'class="form-control"');
		?>
	</div>
</div>
-->
</div>
