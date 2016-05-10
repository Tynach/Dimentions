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
	<ul><?php
	foreach ($actions as $category => $subCategories) { ?> 
		<li><?= $category ?> 
			<ul><?php
			foreach ($subCategories as $item) { ?> 
				<li><?= $item ?><?php
			} ?> 
			</ul><?php
	} ?> 
		<li>Settings
		<li><a href="https://github.com/Tynach/Dimentions">Source Code</a>
	</ul>
</nav>