<?php

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