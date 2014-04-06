<?php

/**************************************************************************
 * Default sample template. Puts one module inside a div, and puts the    *
 * content of the page in the body by itself. This demonstrates different *
 * indentation levels.                                                    *
 *                                                                        *
 * $this represents the current page.                                     *
 **************************************************************************/

$navigation = new Module('navigation.php');
$copyright = new Module('copyright.php');

?>
<!DOCTYPE html>
<html>
	<head>
		<title><? echo $this->title ?> - Dimentions</title>
		<meta charset="utf-8">

		<link rel="stylesheet" type="text/css" href="styles/main.css">
	</head>

	<body>
		<header>
			<h1>Dimentions</h1>
			<? echo $navigation->getContent(3) ?>
		</header>
		<main>
			<? echo $this->getContent(3) ?>
		</main>
		<footer>
			<? echo $copyright->getContent(3) ?>
		</footer>
	</body>
</html>