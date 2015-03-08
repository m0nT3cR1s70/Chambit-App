<!DOCTYPE html>
<html lang="en" dir="ltr" xmlns:fb="http://ogp.me/ns/fb#">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=Edge" />
    	<title>Camera and Video Control with HTML5 Example</title>
	<meta name="description" content="Access the desktop camera and video using HTML, JavaScript, and Canvas.  The camera may be controlled using HTML5 and getUserMedia." />
	<link rel="stylesheet" type="text/css" href="/wp-content/themes/punky/fonts.css" media="all"><link rel="stylesheet" type="text/css" href="/wp-content/themes/punky/style.css?1425417751597" media="all"><!--[if IE]><script src="//cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7/html5shiv.js"></script><![endif]--><style>
.demo-frame header, .demo-frame h1, .demo-frame .demo-conversion {
	display: none;
}

.demo-wrapper {
	min-height: 500px;
}

.bsap {
	position: absolute;
	top: 0;
	right: 0;
}
</style>	<style>
		video { border: 1px solid #ccc; display: block; margin: 0 0 20px 0; }
		#canvas { margin-top: 20px; border: 1px solid #ccc; display: block; }
	</style>
</head>
<body>
<script>
z={analyticsID:"UA-2087880-2",themePath:"/wp-content/themes/punky",pluginPath:"libs/curl/src/curl/plugin/",domain:"davidwalsh.name",loadSidebar:!(-1!=navigator.userAgent.toLowerCase().indexOf("googlebot")),d:document,w:this},z.baseUrl=z.themePath+"/js/",-1==location.hostname.indexOf(z.domain)&&(z.isDebug=1,z.analyticsID=0),z.moo="//ajax.googleapis.com/ajax/libs/mootools/1.4.5/mootools"+(z.isDebug?"":"-yui-compressed")+".js";z.analyticsID&&function(){!function(e,a,n,t,c,s,i){e.GoogleAnalyticsObject=c,e[c]=e[c]||function(){(e[c].q=e[c].q||[]).push(arguments)},e[c].l=1*new Date,s=a.createElement(n),i=a.getElementsByTagName(n)[0],s.async=1,s.src=t,i.parentNode.insertBefore(s,i)}(z.w,z.d,"script","//www.google-analytics.com/analytics.js","ga"),ga("create",z.analyticsID,z.domain),ga("send","pageview"),ga("set","nonInteraction",!0)}();</script>

<!-- accessibility header --><ul class="a11y-menu"><li><a href="/">Home</a></li><li><a href="#main">Main Content</a></li></ul><!-- site header and nav menu --><header id="top"><div class="center clear"><div class="header-title"><a href="/" class="logo"><img src="/wp-content/themes/punky/images/logo.png" alt="Logo" /><span>DWB</span><i class="fa fa-bars" data-open-icon="fa-times" aria-hidden="true" id="logo-icon"></i></a><nav id="main-nav"><div class="relative clear"><i class="fa fa-caret-up" aria-hidden="true"></i><ul class="main-nav-left"><li><a href="/">Home</a></li><li><a href="/page/1" data-content="tutorials">Tutorials</a></li><li><a href="/tutorials/features" data-content="features">Features</a></li><li><a href="/tutorials/demos" data-content="demos">Demos</a></li><li><a href="/topics" data-content="popular">Topics</a></li><li><a href="/about" data-content="about">The Blog</a></li></ul><ul class="main-nav-right"><li id="nav-tutorials"><div class="heading">Recent Tutorials</div><ul class="nav-posts"><li><a href="http://davidwalsh.name/velocity-conference-santa-clara" class="bold">O'Reilly Velocity Conference - Santa&nbsp;Clara</a></li><li><a href="http://davidwalsh.name/indent-json-javascript">Indent JSON with&nbsp;JavaScript</a></li><li><a href="http://davidwalsh.name/add-html-elements-xul-addons">Add HTML Elements to XUL&nbsp;Addons</a></li><li><a href="http://davidwalsh.name/node-watch-file">Watch Files and Directories with&nbsp;Node.js</a></li><li><a href="http://davidwalsh.name/gulp-run-sequence">Sync Gulp Tasks with&nbsp;run-sequence</a></li></ul></li><li id="nav-features"><div class="heading">Recent Features</div><ul class="nav-posts"><li><a href="http://davidwalsh.name/sass-media-query" class="bold">Write Simple, Elegant and Maintainable Media Queries with&nbsp;Sass</a></li><li><a href="http://davidwalsh.name/responsive-images">Responsive Images: The Ultimate&nbsp;Guide</a></li><li><a href="http://davidwalsh.name/responsive-scalable-animations">Responsive and Infinitely Scalable JS&nbsp;Animations</a></li><li><a href="http://davidwalsh.name/css-flip">Create a CSS Flipping&nbsp;Animation</a></li><li><a href="http://davidwalsh.name/webcam-animated-gif">From Webcam to Animated GIF: the Secret Behind&nbsp;chat.meatspac.es!</a></li></ul></li><li id="nav-demos"><div class="heading">Interactive Demos</div><ul class="nav-posts"><li><a href="http://davidwalsh.name/flexbox-column" class="bold">Create a 2 Column Layout with&nbsp;Flexbox</a></li><li><a href="http://davidwalsh.name/css-vertical-center-flexbox">CSS Vertical Center with&nbsp;Flexbox</a></li><li><a href="http://davidwalsh.name/css-custom-cursor">CSS Custom&nbsp;Cursors</a></li><li><a href="http://davidwalsh.name/css-flip">Create a CSS Flipping&nbsp;Animation</a></li><li><a href="http://davidwalsh.name/svg-animation">The Simple Intro to SVG&nbsp;Animation</a></li></ul></li><li id="nav-popular"><div class="heading">Popular Topics</div><ul class="nav-posts half"><li><a href="/tutorials/html5" class="bold">HTML5</a></li><li><a href="/tutorials/css/animations">CSS Animations</a></li><li><a href="/tutorials/firefoxos">Firefox OS</a></li><li><a href="/tutorials/jquery">jQuery</a></li><li><a href="/tutorials/mootools">MooTools</a></li><li><a href="/tutorials/php">PHP</a></li></ul><ul class="nav-posts half"><li><a href="/tutorials/css" class="bold">CSS3</a></li><li><a href="/tutorials/wordpress">WordPress</a></li><li><a href="/tutorials/mobile">Mobile</a></li><li><a href="/tutorials/seo">SEO</a></li><li><a href="/tutorials/javascript">JavaScript</a></li><li><a href="/tutorials/dojo">Dojo Toolkit</a></li></ul></li><li id="nav-about"><div class="heading">David Walsh Blog</div><ul class="nav-posts"><li><a href="/about-david-walsh" class="bold">About David Walsh</a></li><li><a href="/contact">Contact and Advertise</a></li><li><a href="/deals">Developer Deals</a></li><li><a href="/mozilla">Mozilla</a></li></ul></li></ul></div></nav></div><div class="header-middle"><ul class="social-icons"><li><a href="/feed" data-noxhr="true" class="rss"><i class="fa fa-rss" aria-hidden="true"></i></a></li><li><a href="//twitter.com/davidwalshblog" rel="nofollow" class="twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a></li><li><a href="//facebook.com/davidwalshblog" rel="nofollow" class="facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a></li><li><a href="https://plus.google.com/114538814489633467974?rel=author" rel="nofollow" class="google-plus"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li><li><a href="//github.com/darkwing" rel="nofollow" class="github"><i class="fa fa-github" aria-hidden="true"></i></a></li><li><a href="//linkedin.com/in/davidjameswalsh" rel="nofollow" class="linkedin"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li><li><a href="/?s=search" class="search"><i class="fa fa-search" aria-hidden="true"></i></a></li></ul><div class="header-search"><form action="/"><label for="header-search-field"><span class="offscreen">Search</span><i class="fa fa-search" aria-hidden="true"></i><input type="search" name="s" id="header-search-field"></label></form></div></div><div class="header-sda fx6" id="header-fx"><a href="//dwf.tw/oreillyperf" rel="nofollow"><img src="/wp-content/themes/punky/images/sda/oreilly-header.jpg" alt="O'Reilly" /></a></div></div></header><div id="masthead-title" aria-hidden="true"><div class="center"><!--MASTHEAD--><div id="masthead-title-text"></div><!--/MASTHEAD--></div></div>
<!-- content wrapper --><div class="main"><div class="center clear"><!-- main content column --><main id="main"><!--CONTENT-->
<div class="demo-wrapper">

<h1>Demo:  Camera and Video Control with HTML5</h1>

<div class="demo-conversion">Read <a href="http://davidwalsh.name/browser-camera" target="_top">Camera and Video Control with HTML5</a></div>

<div id="promoNode"></div>	
	<p>Using Opera Next or Chrome Canary, use this page to take your picture!</p>

	<!--
		Ideally these elements aren't created until it's confirmed that the 
		client supports video/camera, but for the sake of illustrating the 
		elements involved, they are created with markup (not JavaScript)
	-->
	<video id="video" width="640" height="480" autoplay></video>
	<button id="snap" class="sexyButton">Snap Photo</button>
	<canvas id="canvas" width="640" height="480"></canvas>

	<script>

		// Put event listeners into place
		window.addEventListener("DOMContentLoaded", function() {
			// Grab elements, create settings, etc.
			var canvas = document.getElementById("canvas"),
				context = canvas.getContext("2d"),
				video = document.getElementById("video"),
				videoObj = { "video": true },
				errBack = function(error) {
					console.log("Video capture error: ", error.code); 
				};

			// Put video listeners into place
			if(navigator.getUserMedia) { // Standard
				navigator.getUserMedia(videoObj, function(stream) {
					video.src = stream;
					video.play();
				}, errBack);
			} else if(navigator.webkitGetUserMedia) { // WebKit-prefixed
				navigator.webkitGetUserMedia(videoObj, function(stream){
					video.src = window.webkitURL.createObjectURL(stream);
					video.play();
				}, errBack);
			} else if(navigator.mozGetUserMedia) { // WebKit-prefixed
				navigator.mozGetUserMedia(videoObj, function(stream){
					video.src = window.URL.createObjectURL(stream);
					video.play();
				}, errBack);
			}

			// Trigger photo take
			document.getElementById("snap").addEventListener("click", function() {
				context.drawImage(video, 0, 0, 640, 480);
			});
		}, false);

	</script>
		
</div>

<p class="demo-conversion">Back to: <a href="http://davidwalsh.name/browser-camera" target="_top">Camera and Video Control with HTML5</a></p>

</main>

	<style>
		body .one .bsa_it_ad { background: #f8f8f8; border: none; font-family: inherit; width: 200px; position: absolute; top: 0; right: 0; text-align: center; border-radius: 8px; }
		body .one .bsa_it_ad .bsa_it_i { display: block; padding: 0; float: none; margin: 0 0 5px; }
		body .one .bsa_it_ad .bsa_it_i img { padding: 10px; border: none; margin: 0 auto; }
		body .one .bsa_it_ad .bsa_it_t { padding: 6px 0; }
		body .one .bsa_it_ad .bsa_it_d { padding: 0; font-size: 12px; color: #333; }
		body .one .bsa_it_p { display: none; }
		body #bsap_aplink, body #bsap_aplink:hover { display: block; font-size: 10px; margin: 12px 15px 0; text-align: right; }
	</style>
	<script type="text/javascript" src="http://cdn.adpacks.com/adpacks.js?legacyid=1280449&zoneid=1386&key=db3b221ddd8cbba67739ae3837520ffe&serve=C6SI42Y&placement=davidwalshname&circle=dev" id="_adpacks_js"></script>


<script>

document.body.className+= ' demo-page';

window.addEventListener('load', function() {
	var s = 'script';
	var d = document;
	var w = window;
	var firstScript = d.getElementsByTagName(s)[0];

	
	(function() {
		var first_paragraph = document.getElementsByTagName('p')[0];
		if(first_paragraph) {
			first_paragraph.className = 'demo-intro';
		}

		setTimeout(function() {
			var headerA = d.getElementById('header-fx');
			headerA.className += ' complete';
		}, 2000);
	})();
	

	// BSA bitches!
	var bsa = d.createElement(s);
	bsa.async = 1;
	bsa.src = '//s3.buysellads.com/ac/bsa.js';
	firstScript.parentNode.insertBefore(bsa, firstScript);

	// Promo!
	(function() {

		var promoNode = d.getElementById('promoNode');

		// Temporary - use MooTools 2.0 when available
		function createElement(tagName, attr, parent) {
			var el = d.createElement(tagName);
			for(prop in attr) {
				if(attr.hasOwnProperty(prop)) el.setAttribute(prop, attr[prop]);
			}
			parent.appendChild(el);
			return el;
		}

		// Loads a script
		function loadScript(url) {
			var script = d.createElement('script');
			script.src = url;
			script.setAttribute('async', 'true');
			d.documentElement.firstChild.appendChild(script);
		}

		// Create the Twitter widget, inject
		createElement('a', {
			href: '//twitter.com/share',
			'data-count': 'horizontal',
			'class': 'twitter-share-button'
		}, createElement('span', {}, promoNode));
		loadScript('http://platform.twitter.com/widgets.js');

		// Create the Google Plus icon
		var gl = createElement('g:plusone', {
			href: w.location,
			size: 'medium'
		}, createElement('span', {}, promoNode));
		loadScript('//apis.google.com/js/plusone.js');
		
		// Create the Facebook widget
		createElement('iframe', {
			src: '//facebook.com/plugins/like.php?href=' + w.location,
			scrolling: 'no',
			frameborder: 0,
			allowTransparency: true,
			style: 'border:none; overflow:hidden; float:left; height:24px; margin-top:3px;'
		}, createElement('span', {}, promoNode));

	})();
});

!function(e){var t=e.createElement("link"),s="setAttribute";t[s]("type","text/css"),t[s]("rel","stylesheet"),t[s]("href","//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css"),e.head.appendChild(t)}(z.d);</script>
</body>
</html>