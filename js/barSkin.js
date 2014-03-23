var barSkin = function(s, h, e, p, st) {
	
	if (s == 'split') {
		var skins = h.split(';');
		var s = '';
		while (s == '') {
			var skin = skins[Math.floor(Math.random()*(skins.length))];
			var sh = skin.split(',');
			var s = sh[0];
		}
		
		h = sh[1];
		e = sh[2];
		p = sh[3];
		st = sh[4];
	}
	
	if (e != '') {
		e = e.split(',');
		// if not in_array (current url, e ) {
		// then do the rest, else just do nothing at this point.
		//}
	}

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