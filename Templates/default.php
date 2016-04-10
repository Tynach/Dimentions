<?php

/**************************************************************************
 * Default sample template. Puts one module inside a div, and puts the    *
 * content of the page in the body by itself. This demonstrates different *
 * indentation levels.                                                    *
 *                                                                        *
 * $this represents the current page.                                     *
 **************************************************************************/

requireOnceRoot('module.php');

$navigation = new Module('numbers.php');

if (General::ERROR() !== false) {
	$error = new Module('except.php');
}

?>
<!DOCTYPE html>

<title><?= $this->title ?> - Sample Dry Website</title>
<meta charset="utf-8">

<header>
	<nav>
		<?= $navigation->getContent(2) ?>
	</nav><?php
if (isset($error)): ?> 

	<div id="exceptions">
		<?= $error->getContent(2) ?>
	</div><?php
endif ?> 
</header>

<main>
	<?= $this->getContent(1) ?>
</main>