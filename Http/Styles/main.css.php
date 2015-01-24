<?php

/***********************************************************************
 * This file defines the main, global stylesheet for the website. It's *
 * designed most specifically for the 'dimentions.php' template.       *
 ***********************************************************************/

// Most text editors will parse this file as HTML, and it screws
// up the syntax highlighting. Instead, lets use a '<style>' tag
// to tell at least the editors that support CSS syntax
// highlighting inside HTML that they should highlight things
// from here on as CSS.

// We use 'output buffering' so that the tag is not actually
// sent to the browser. We of course want to ignore the contents
// of the buffer, so we use ob_end_clean().

ob_start()
?><style><?
ob_end_clean();

// Tell browsers this is a CSS document
header("Content-type: text/css; charset: UTF-8");

// Variables to use in the CSS
$logoHeight = 3;
$navWidth = 11;
$footerHeight = 1.1;

?>
/*****************
 * Global Styles *
 *****************/

* {
	margin: 0;
	padding: 0;
	line-height: 1em;
}

html {
	height: 100%;
}


/***************
 * Body Styles *
 ***************/

body {
	max-width: 75rem;
	min-height: 100%;
	position:relative;
	font-family: sans-serif;
}


/*****************
 * Header Styles *
 *****************/

/* Website 'Logo' Text */

header {
	margin: 0 0.5rem;
}

header > h1 {
	height: <? echo $logoHeight ?>rem;
	display: table-cell;
	vertical-align: bottom;
	font-size: <? echo $logoHeight - 0.5 ?>rem;
}


/* Navigation Sidebar */

nav#primary {
	position: absolute;
	top: <? echo $logoHeight ?>rem;
	left: 0;
	width: <? echo $navWidth ?>rem;
	overflow: auto;
}

nav#primary * {
	line-height: 2em;
}

nav#primary ul {
	list-style-type: none;
}

nav#primary li {
	margin-left: 0.5rem;
	margin-right: 0.5rem;
}

nav#primary > ul > li {
	font-weight: bold;
	border-bottom: 1px solid black;
}

nav#primary > ul > li li {
	font-weight: normal;
	border-top: 1px solid #CCC;
}


/***********************
 * Main Content Styles *
 ***********************/

main {
	margin-left: <? echo $navWidth ?>rem;
	padding-bottom: <? echo $footerHeight ?>rem;
}

main p {
	margin: 0.5rem;
	text-align: justify;
}


/*****************
 * Footer Styles *
 *****************/

footer {
	font-size: 0.8em;
	position: absolute;
	bottom: 0;
	left: <? echo $navWidth ?>rem;
}

footer p {
	height: <? echo $footerHeight ?>rem;
	line-height: <? echo $footerHeight ?>rem;
	vertical-align: middle;
	margin: 0 0.5rem;
}


/**************************
 * Small Screen Rendering *
 **************************/

@media screen and (max-width: <? echo $navWidth * 3 ?>rem)
{
	nav#primary {
		left: -<? echo $navWidth ?>rem;
	}

	main {
		margin-left: 0;
	}

	footer {
		left: 0;
	}
}