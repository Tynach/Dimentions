<?php

// Don't tell people viewing the source from a browser that we're using PHP.
ob_start() ?>
/* Ensure this PHP file parses as CSS in editors: <style> /**/<?
ob_end_clean();

// Tell browsers this is a CSS document
header("Content-type: text/css; charset: UTF-8");

// Variables to use in the CSS
$navWidth = '10rem';

?>
/*****************
 * Global Styles *
 *****************/

* {
	margin: 0;
	padding: 0;
	line-height: 1em;
}


/***************
 * Body Styles *
 ***************/

body {
	font-family: sans-serif;
}

p {
	margin: 0.5em 0;
}


/*****************
 * Header Styles *
 *****************/

header {
	width: 100%;
	position: fixed;
	top: 0;
	left: 0;
}


/* Website 'Logo' Text */

header > h1 {
	height: 3rem;
	line-height: 3rem;
	vertical-align: middle;
	background-color: white;
}


/* Navigation Sidebar */

header > nav {
	float: left;
	width: <? echo $navWidth ?>;
}


/***********************
 * Main Content Styles *
 ***********************/

main {
	margin-top: 3rem;
	margin-left: <? echo $navWidth ?>;
}


/*****************
 * Footer Styles *
 *****************/

footer {
	position: absolute;
	bottom: 0;
	left: <? echo $navWidth ?>;
}