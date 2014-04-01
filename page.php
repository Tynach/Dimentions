<?php

/******************************************************************************
 * Pages are full HTML documents sent to the browser. In Dry, pages use       *
 * output buffering to capture the intended content of a page, and then after *
 * the website loads, outputs a template that puts that page content into an  *
 * appropriate place in the document. This way, it's easy to separate the     *
 * layout of a page from the content.                                         *
 *                                                                            *
 * The templates that pages include can include modules, so module.php is     *
 * included in this file. Also, since module.php includes container.php       *
 * (which is needed by this file for the definition of the Container class),  *
 * it's easiest just to include that one file rather than several.            *
 ******************************************************************************/

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