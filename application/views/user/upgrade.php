<h3>Hi There</h3>

<div style="width:700px">
<div class="lead">
We hope that you <span class="glyphicon glyphicon-heart" ></span> using our product.
</div>

<div class="lead">
In order to create even more bars, we request that you upgrade your account to Pro. This will allow you to create an unlimited number of bars for only <span class="text-success">$5</span> a month.
</div>

<div class="lead">
To make it really easy for you to upgrade right now, all you have to do is fill out the fields below. We look forward to seeing you on the other side!
</div>
</div>

<div style="width:550px">
<?php echo form_open('user/process_upgrade', array('class'=>'form-horizontal well card-form')) ?>
<div class="form-group">
	<label class="col-md-4">Card Type</label>
	<div class="col-md-4">
		<?php
			$cards = array('Visa', 'Mastercard');
			echo form_dropdown('cardType', $cards, '', 'class="form-control"');
		?>
	</div>
</div>

<div class="form-group">
	<label class="col-md-4">Card Holder Name</label>
	<div class="col-md-7">
		<input type="text" class="form-control" name="cardName">
	</div>
</div>

<div class="form-group">
	<label class="col-md-4">Card Number</label>
	<div class="col-md-7">
		<input type="text" autocomplete="off" class="form-control" name="cardNumber">
	</div>
</div>

<div class="form-group">
	<label class="col-md-4">Expiration Date</label>
	<div class="col-md-7">
		<div class="col-md-7">
		<select id="cardExpirationMonth" class="form-control">
			<option value="1">January</option>
		    <option value="2">February</option>
		    <option value="3">March</option>
		    <option value="4">April</option>
		    <option value="5">May</option>
		    <option value="6">June</option>
		    <option value="7">July</option>
		    <option value="8">August</option>
		    <option value="9">September</option>
		    <option value="10">October</option>
		    <option value="11">November</option>
		    <option value="12">December</option>
		</select>
		</div>
		<div class="col-md-5">
		<select id="cardExpirationYear" class="form-control">
			<?php 
				$yearRange = 20;
				$thisYear = date('Y');
				$startYear = ($thisYear + $yearRange);
			
				foreach (range($thisYear, $startYear) as $year) 
				{
					if ( $year == $thisYear) {
						print '<option value="'.$year.'" selected="selected">' . $year . '</option>';
					} else {
						print '<option value="'.$year.'">' . $year . '</option>';
					}
				}
			?>
		</select>
		</div>
	</div>
</div>
<div class="form-group">
	<label class="col-md-4">CVC</label>
	<div class="col-md-3">
		<input type="text" class="form-control" name="cardCVC">
	</div>
</div>
<div style="text-align:center">
	<button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-ok" style="margin-right:5px;"></span>Upgrade My Account</button>
</div>
</form>

</div>

<style type="text/css">
.card-form {
	padding: 25px;
	margin-top:30px;
}
</style>