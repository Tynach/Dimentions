<?php

/**************************************************************************
 * Default sample template. Puts one module inside a div, and puts the    *
 * content of the page in the body by itself. This demonstrates different *
 * indentation levels.                                                    *
 *                                                                        *
 * $this represents the current page.                                     *
 **************************************************************************/

requireOnceRoot('module.php');

$navigation = new Module('navigation.php');
$copyright = new Module('copyright.php');

?>
<!DOCTYPE html>

<!-- Metadata -->
<title><?= $this->title ?> - Dimentions</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<!-- External Resources -->
<link rel="stylesheet" type="text/css" href="Styles/main.css">
<script src="Scripts/nav.js"></script>

<!-- Body -->
<header>
	<h1>Dimentions</h1>
	<?= $navigation->getContent(1) ?>
</header>

<main>
	<?= $this->getContent(1) ?>
</main>

<footer>
	<?= $copyright->getContent(1) ?>
</footer>