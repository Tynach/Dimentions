<?php

/**********************************************************
 * A silly demo module that counts to 10 in an HTML list. *
 **********************************************************/

?>
<ul><?
foreach (range(1, 10) as $i) { ?> 
	<li>Item <? echo $i ?></li><?
} ?> 
</ul>