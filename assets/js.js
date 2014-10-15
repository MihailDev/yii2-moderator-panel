if (typeof mihaildev == "undefined" || !mihaildev) {
	var mihaildev = {};
}

mihaildev.moderatorPanel = {
	buttonClick: function(){
		if(document.getElementById('moderator-panel').style.display == 'none' || document.getElementById('moderator-panel').style.display == ''){
			var doc = document.documentElement;
			var top = (window.pageYOffset || doc.scrollTop)  - (doc.clientTop || 0) + 100;

			document.getElementById('moderator-panel').style.display = 'block';
			document.getElementById('moderator-panel').style.top = top + 'px';
			console.log(top);
		}else{
			document.getElementById('moderator-panel').style.display = 'none';
		}
	},
	closeFrame: function(){
		if(document.getElementById('moderator-panel-frame').style.display == 'none' || document.getElementById('moderator-panel-frame').style.display == '') {
			return true;
		}

		var frame = document.getElementById("moderator-panel-frame-body-frame");
		frame.parentNode.removeChild(frame);

		document.getElementById('moderator-panel-frame').style.display = 'none';
		return true;
	},
	openFrame: function(width, height, src, title){
		this.closeFrame();
		document.getElementById('moderator-panel-frame-title').innerHTML = title;

		var frame = document.createElement("IFRAME");
		frame.id = 'moderator-panel-frame-body-frame';
		var w = parseInt(width, 10);
		var h = parseInt(height, 10);
		frame.width = w + 'px';
		frame.height = h + 'px';
		frame.src = src;
		frame.frameborder = "0";
		frame.style.border = "0";
		frame.style.padding = "0";
		frame.style.margin = "0";
		frame.hspace="0";
		frame.vspace="0";
		frame.marginwidth="0";
		frame.marginheight="0";

		document.getElementById('moderator-panel-frame-body').appendChild(frame);
		document.getElementById('moderator-panel-frame-body').style.height = h + 'px';
		document.getElementById('moderator-panel-frame').style.display = 'block';

		var doc = document.documentElement;
		var left = (screen.width/2)-(w/2);
		var top = (window.pageYOffset || doc.scrollTop)  - (doc.clientTop || 0) + (screen.height/2) - (h/2) - 70;
		if(top < 0)
			top = 0;
		if(left < 0)
			left = 0;
		document.getElementById('moderator-panel-frame').style.top = top + 'px';
		document.getElementById('moderator-panel-frame').style.left = left + 'px';
	}
};