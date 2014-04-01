<?php

/*****************************************************************************
 * Modules are snippets of HTML and PHP which form a portion of a page. They *
 * should typically be page elements which might be re-used across multiple  *
 * templates.                                                                *
 *****************************************************************************/

include_once('container.php');

class Module extends Container
{
	private $method;

	function __construct($module, $method = NULL)
	{
		if ($method != NULL) {
			$this->method = $method;
		}

		ob_start();
		include(sprintf('%s/%s', Location::MODULES(), $module));
		$this->processBuffer();
	}
}