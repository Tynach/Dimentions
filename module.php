<?php

/*****************************************************************************
 * Modules are snippets of HTML and PHP which form a portion of a page. They *
 * should typically be page elements which might be re-used across multiple  *
 * templates.                                                                *
 *****************************************************************************/

requireOnceRoot('container.php');

class Module extends Container
{
	private $method;

	// Creating a module uses output buffering to capture the output of the
	// included PHP file.
	function __construct($module, $method = NULL)
	{
		parent::__construct();

		if ($method !== NULL) {
			$this->method = $method;
		}

		ob_start();
		requireModule($module);
		$this->processBuffer();
	}
}