<?php

/***************************************************************************
 * This module puts the exceptions that were not caught (which are, by     *
 * default, in the global $exceptions variable) into a well-formatted HTML *
 * list.                                                                   *
 ***************************************************************************/

$problem = General::ERROR();

if ($problem === false) {
	return;
}

?>
<p><?= $problem->getmessage();