<?php

/***************************************************************************
 * This module puts the exceptions that were not caught (which are, by     *
 * default, in the global $exceptions variable) into a well-formatted HTML *
 * list.                                                                   *
 ***************************************************************************/

?>
<p>Exceptions:
<ul><?
global $exceptions;

foreach ($exceptions as $exception) {
	$lines = explode(PHP_EOL, $exception); ?> 
	<li><?
	foreach ($lines as $line) { ?> 
		<? echo $line ?><br><?
	} ?> 
	</li><?
} ?> 
</ul>