<?php

include_once('container.php');

class Module extends Container
{
	private $method;

	function __construct($module, $indent)
	{
		ob_start();
		include(sprintf('%s/%s', Location::MODULES(), $module));
		$this->processBuffer();
	}
}