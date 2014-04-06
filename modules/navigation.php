<?php

$categories = array(
	'Roleplays' => array(
		'Own',
		'Moderate',
		'Joined',
		'Following'
	),
	'Characters' => array(
		'Own',
		'Permitted To Use'
	),
	'Universes' => array(
		'Own',
		'Permitted To Use'
	),
	'Clubs' => array(
		'Own',
		'Moderate',
		'Joined'
	)
);

?>
<nav>
	<ul><?
	foreach ($categories as $category => $items) { ?> 
		<li><? echo $category; ?> 
			<ul><?
			foreach ($items as $item) { ?> 
				<li><? echo $item ?></li><?
			} ?> 
			</ul>
		</li><?
	} ?> 
		<li>Settings</li>
	</ul>
</nav>