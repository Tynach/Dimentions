<?php

/**************************************************************************
 * Default sample template. Puts one module inside a div, and puts the    *
 * content of the page in the body by itself. This demonstrates different *
 * indentation levels.                                                    *
 *                                                                        *
 * $this represents the current page.                                     *
 **************************************************************************/

$navigation = new Module('numbers.php');
$except = new Module('except.php');

?>
<!DOCTYPE html>

<title><? echo $this->title ?> - Sample Dry Website</title>
<meta charset="utf-8">

<header>
	<nav>
		<?php echo $navigation->getContent(2) ?>
	</nav><?

global $exceptions;
if (!empty($exceptions)) { ?> 

	<div id="exceptions">
		<? echo $except->getContent(2) ?>
	</div><?
}

?> 
</header>

<main>
	<?php echo $this->getContent(1) ?>
</main>