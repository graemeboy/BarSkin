var barSkin = function() {
	var s = '<?php echo $bar_id ?>';
	var h = '<?php echo $height ?>';
	var st = '<?php echo $sticky ?>';
	var p = '<?php echo $position ?>';
	var ex = '<?php echo $exclude_pages ?>';
	var showBar = true;
	
	if (ex !== '') {
		ex = ex.split(',');
		if (ex.indexOf(document.URL) > 0) {
			showBar = false;
		}
	}
	
	if (showBar) {
		var d = window.document,
			b = d.createElement('div');
		var f = 'fixed';
		if (st == 'no') {
			if (p == 'top') {
				f = 'absolute';
			} else {
				f = 'static';
			}
		}
		var d = window.document,
			b = d.createElement('div');
		b.setAttribute('style', 'position:' + f + ';width:100%;' + p + ':0;');
		b.id = 'bskn-' + s;
		d.body.appendChild(b);
		d.body.style.margin = 0;
		d.body.style.paddingTop = h + 5 + "px";
		var l = "//localhost:8888/index.php/us/b/" + s;
		var i = d.createElement('iframe');
		i.setAttribute("scrolling", "no");
		i.frameBorder = 0;
		i.width = "100%";
		i.height = h + "px";
		i.setAttribute("src", l);
		d.getElementById("bskn-" + s).appendChild(i);
	}

}