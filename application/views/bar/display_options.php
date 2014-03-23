<div class="help-block" style="margin-bottom:20px;"><strong>Note:</strong> Whenever you change the following display settings, you must re-embed the bar's code on your site.</div>
<div class="col-md-6">
    <div class="form-group">
        <legend style="font-size:17px;">Exclude Pages</legend>

        <div class="help-block" style="margin-top:-10px;margin-bottom:15px;">
            Choose which pages this bar should not display on. For example, if you have a link in your bar to some page, you might not want the bar to appear on that page as well! Separate these with a space.
        </div>

        <div class="col-md-10">
            <textarea class="form-control" placeholder="http://www.example.com/page1 http://www.example.com/page2" name="excludePages" rows="5" style="margin-bottom:15px"><?php echo $ld['excludePages'] ?></textarea>
        </div>
    </div>

    <div class="form-group radio">
        <legend style="font-size:17px;">Bar Positioning</legend>

        <div class="help-block" style="margin-top:-10px;margin-bottom:15px;">
            Where would you like your bar to appear on the page?
        </div>

        <div class="col-md-6">
            <label><input type="radio" name="barPosition" <?php if ($ld['barPosition'] == 'top') { echo 'checked="checked"'; } ?> value="top"> Top of Window</label>
        </div>

    <div class="col-md-6">
        <label><input type="radio" name="barPosition" <?php if ($ld['barPosition'] == 'bottom') { echo 'checked="checked"'; } ?> value="bottom"> Bottom of Window</label>
    </div>
   </div>
</div>
<div class="col-md-6">
   <div class="form-group radio">
        <legend style="font-size:17px;">Sticky Option</legend>

        <div class="help-block" style="margin-top:-10px;margin-bottom:15px;">
            Would you like the bar to stay fixed at the top or bottom of the browser window (thus always visible as users scroll down), or should it remain at the top of the page?
        </div>

        <div class="col-md-6">
            <label><input type="radio" name="sticky" <?php if ($ld['sticky'] == 'yes') { echo 'checked="checked"'; } ?> value="yes"> Stick to top or bottom of window</label>
        </div>

    <div class="col-md-6">
        <label><input type="radio" name="sticky" <?php if ($ld['sticky'] == 'no') { echo 'checked="checked"'; } ?> value="no"> Do not stick</label>
    </div>
   </div>
</div>