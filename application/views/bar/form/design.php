<?php ?>
<legend>Form Design</legend>
<legend style="font-size:17px;">Placeholders for Inputs</legend>
<div class="help-block" style="margin-top:-10px;margin-bottom:15px;">
These placeholders will be displayed in the text boxes before your user has written anything in them. It can inform your users about what information they should give.</div>

<div class="form-group col-md-11 namePlaceholder">
	<label class="form-label col-md-4">Name Placeholder</label>
	<div class="col-md-6">
		<input type="text" class="form-control" ng-init="namePlaceholder='<?php echo $ld['namePlaceholder'] ?>'" ng-model="namePlaceholder" name="namePlaceholder" />
	</div>
</div>

<div class="form-group col-md-11">
	<label class="form-label col-md-4">Email Placeholder</label>
	<div class="col-md-6">
		<input type="text" class="form-control" ng-init="emailPlaceholder='<?php echo $ld['emailPlaceholder'] ?>'" ng-model="emailPlaceholder" name="emailPlaceholder" />
	</div>
</div>

<legend style="font-size:17px;">Button Style</legend>
<div class="form-group col-md-11">
	<label class="form-label col-md-4">Button Text</label>
	<div class="col-md-6">
		<input type="text" class="form-control" ng-init="buttonText='<?php echo $ld['buttonText'] ?>'" ng-model="buttonText" name="buttonText" />
	</div>
</div>

<div class="form-group col-md-11">
	<label class="form-label col-md-4">Button Color</label>
	<div class="input-group col-md-4">
		<input type="text" class="form-control color-picker" ng-init="buttonColor='<?php echo $ld['buttonColor'] ?>'" ng-model="buttonColor" name="buttonColor" />
		<span style="display:none;" id="colorpicker-hide-buttonColor" class="input-group-addon" href="#">
		<a href="#" data-model="buttonColor" class="close colorpicker-hide glyphicon glyphicon-ok" style="padding-top:2px;padding-bottom:2px;"></a>
		</span>
	</div>
</div>

<div class="form-group col-md-11">
	<label class="form-label col-md-4">Button Border Color</label>
	<div class="input-group col-md-4">
		<input type="text" class="form-control color-picker" ng-init="buttonBorderColor='<?php echo $ld['buttonBorderColor'] ?>'" ng-model="buttonBorderColor" name="buttonBorderColor" />
		<span style="display:none;" id="colorpicker-hide-buttonBorderColor" class="input-group-addon" href="#">
		<a href="#" data-model="buttonBorderColor" class="close colorpicker-hide glyphicon glyphicon-ok" style="padding-top:2px;padding-bottom:2px;"></a>
		</span>
	</div>
</div>

<div class="form-group col-md-11">
	<label class="form-label col-md-4">Button Border Radius</label>
	<div class="input-group col-md-4">
		<input type="text" class="form-control" ng-init="buttonBorderRadius='<?php echo $ld['buttonBorderRadius'] ?>'" ng-model="buttonBorderRadius" name="buttonBorderRadius" />
		<span class="input-group-addon">px</span>
	</div>
</div>

<legend style="font-size:17px;">Button Text</legend>
<div class="form-group col-md-11">
	<label class="form-label col-md-4">Button Text Color</label>
	<div class="input-group col-md-4">
		<input type="text" class="form-control color-picker" ng-init="buttonTextColor='<?php echo $ld['buttonTextColor'] ?>'" ng-model="buttonTextColor" name="buttonTextColor" />
		<span style="display:none;" id="colorpicker-hide-buttonTextColor" class="input-group-addon" href="#">
		<a href="#" data-model="buttonTextColor" class="close colorpicker-hide glyphicon glyphicon-ok" style="padding-top:2px;padding-bottom:2px;"></a>
		</span>
	</div>
</div>
<div class="form-group col-md-11">
	<label class="form-label col-md-4">Button Font Size</label>
	<div class="input-group col-md-4">
		<input type="text" class="form-control" ng-init="buttonFontSize='<?php echo $ld['buttonFontSize'] ?>'" ng-model="buttonFontSize" name="buttonFontSize" />
		<span class="input-group-addon">px</span>
	</div>
</div>

<div class="form-group col-md-11">
	<label class="form-label col-md-4">Button Font Type</label>
	<div class="input-group col-md-4">
	<?php
	echo form_dropdown('buttonFontType', $font_list_nice, $ld['buttonFontType'], 'class="form-control" ng-model="buttonFontType" ng-init="buttonFontType=\'' . $ld['buttonFontType'] . '\'"'); ?>	
	</div>
</div>

<legend style="font-size:17px;">Button Padding</legend>
<div class="help-block" style="margin-top:-10px;margin-bottom:15px;">This will control the vertical and horizontal size of your button.</div>
<div class="form-group col-md-11">
	<label class="form-label col-md-4">Button Horizontal Padding</label>
	<div class="input-group col-md-4">
		<input type="text" class="form-control" ng-init="buttonHorizontalPadding='<?php echo $ld['buttonHorizontalPadding'] ?>'" ng-model="buttonHorizontalPadding" name="buttonHorizontalPadding" />
		<span class="input-group-addon">px</span>
	</div>
</div>

<div class="form-group col-md-11">
	<label class="form-label col-md-4">Button Vertical Padding</label>
	<div class="input-group col-md-4">
		<input type="text" class="form-control" ng-init="buttonVerticalPadding='<?php echo $ld['buttonVerticalPadding'] ?>'" ng-model="buttonVerticalPadding" name="buttonVerticalPadding" />
		<span class="input-group-addon">px</span>
	</div>
</div>