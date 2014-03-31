<?php

include_once('module.php');

class Page extends Container
{
	public $title;
	private $templateFile;

	function __construct($template)
	{
		$this->templateFile = sprintf('%s/%s', Location::TEMPLATES(), $template);
		ob_start();
	}

	function __destruct()
	{
		$this->processBuffer();
		include($this->templateFile);
	}
}