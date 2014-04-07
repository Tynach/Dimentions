var nav;
var orig;

function navScroll(event)
{
	event.stopPropagation();
}

function onScroll()
{
	if (window.pageYOffset > orig) {
		nav.style.top = window.pageYOffset + 'px';
	} else {
		nav.style.top = orig + 'px';
	}

	onResize();
}

function onResize()
{
	var fromTop = nav.offsetTop - window.pageYOffset;
	nav.style.maxHeight = (window.innerHeight - fromTop) + 'px';
}

function onLoad()
{
	nav = document.getElementsByTagName('nav')[0];
	onResize();
	orig = nav.offsetTop;

	window.onscroll = onScroll;
	window.onresize = onResize;
	
	nav.onscroll = navScroll;
}

window.onload = onLoad;