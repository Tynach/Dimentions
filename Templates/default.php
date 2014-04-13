<?php

/**************************************************************************
 * Default sample template. Puts one module inside a div, and puts the    *
 * content of the page in the body by itself. This demonstrates different *
 * indentation levels.                                                    *
 *                                                                        *
 * $this represents the current page.                                     *
 **************************************************************************/

$navigation = new Module('numbers.php');

?>
<!DOCTYPE html>
<html>
	<head>
		<title><? echo $this->title ?> - Sample Dry Website</title>
		<meta charset="utf-8">
	</head>

	<body>
		<div id="header">
			<?php echo $navigation->getContent(3) ?>
		</div>
		<?php echo $this->getContent(2) ?>
	</body>
</html>