<?php

/**************************************************************************
 * Default sample template. Puts one module inside a div, and puts the    *
 * content of the page in the body by itself. This demonstrates different *
 * indentation levels.                                                    *
 *                                                                        *
 * $this represents the current page.                                     *
 **************************************************************************/

$navigation = new Module('numbers.php');

if (General::ERROR() !== false) {
	$error = new Module('except.php');
}

?>
<!DOCTYPE html>

<title><? echo $this->title ?> - Sample Dry Website</title>
<meta charset="utf-8">

<header>
	<nav>
		<? echo $navigation->getContent(2) ?>
	</nav><?

if (isset($error)): ?>


	<div id="exceptions">
		<? echo $error->getContent(2) ?>
	</div><?

endif ?>

</header>

<main>
	<?php echo $this->getContent(1) ?>
</main>