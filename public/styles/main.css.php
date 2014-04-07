<?php

// Don't tell people viewing the source from a browser that we're using PHP.
ob_start() ?>
/* Ensure this PHP file parses as CSS in editors: <style> /**/<?
ob_end_clean();

// Tell browsers this is a CSS document
header("Content-type: text/css; charset: UTF-8");

// Variables to use in the CSS
$logoHeight = 3;
$navWidth = 10;
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

nav {
	position: absolute;
	top: <? echo $logoHeight ?>rem;
	left: 0;
	width: <? echo $navWidth ?>rem;
	overflow: auto;
}

nav ul {
	list-style-type: none;
}

nav li {
	margin-left: 0.5rem;
	margin-right: 0.5rem;
}

nav > ul > li {
	padding-top: 0.5rem;
	font-weight: bold;
	border-bottom: 1px solid black;
}

nav > ul > li li {
	padding: 0.5rem 0;
	font-weight: normal;
	border-top: 1px solid #CCC;
}

nav > ul > li li:first-child {
	margin-top: 0.5rem;
}

nav > ul > li:last-child {
	padding-bottom: 0.5rem;
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

@media screen and (max-width: 30rem) {
	nav {
		left: -<? echo $navWidth ?>rem;
	}
	
	main {
		margin-left: 0;
	}
	
	footer {
		left: 0;
	}
}