<?php

// Don't tell people viewing the source from a browser that we're using PHP.
ob_start() ?>
/* Ensure this PHP file parses as CSS in editors: <style> /**/<?
ob_end_clean();

// Tell browsers this is a CSS document
header("Content-type: text/css; charset: UTF-8");

// Variables to use in the CSS
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
	min-height: 100%;
	position:relative;
	font-family: sans-serif;
}

main > *, footer > * {
	padding-left: 0.5rem;
	padding-right: 1rem;
}

p {
	margin-top: 0.5rem;
	margin-bottom: 1rem;
	text-align: justify;
}


/*****************
 * Header Styles *
 *****************/

header {
	padding-top: 0.5rem;
}


/* Website 'Logo' Text */

header > h1 {
	font-size: 3em;
	padding: 0.5rem 0;
	margin-left: 1rem;
}


/* Navigation Sidebar */

nav {
	float: left;
	width: <? echo $navWidth ?>rem;
}

nav ul {
	list-style-type: none;
}

nav > ul {
	padding: 0 0.5rem;
}

nav > ul li {
	padding: 0.5rem 0;
}

nav > ul > li li {
	font-weight: normal;
	border-top: 1px solid #CCC;
}

nav > ul > li {
	padding: 0.5rem;
	padding-bottom: 0;
	font-weight: bold;
	border-top: 1px solid black;
}

nav > ul > li li:first-child {
	margin-top: 0.5rem;
}

nav > ul > li:first-child {
	border: 0;
}


/***********************
 * Main Content Styles *
 ***********************/

main {
	margin-left: <? echo $navWidth ?>rem;
	padding-bottom: <? echo $footerHeight ?>rem;
	max-width: 75rem;
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
	margin: 0;
}