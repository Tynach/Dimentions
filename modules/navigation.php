<?php

/*************************************************************
 * This file generates the navigation links for the website. *
 *************************************************************/

$items = array(
	'Universes',
	'Characters',
	'Roleplays'
);

$actions = array(
	'My' => $items,
	'Create' => $items,
	'Find' => $items
);

?>
<nav id="primary">
	<ul><?
	foreach ($actions as $category => $subCategories) { ?> 
		<li><? echo $category ?> 
			<ul><?
			foreach ($subCategories as $item) { ?> 
				<li><? echo $item ?><?
			} ?> 
			</ul><?
	} ?> 
		<li>Settings
	</ul>
</nav>