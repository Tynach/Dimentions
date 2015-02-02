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

/******************************************************************************
 * WARNING: For some reason, we must get the path for the template ahead of   *
 * time with templatePath() instead of calling requireTemplate(). Otherwise,  *
 * the template file believes it is no longer able to use $this for the page. *
 ******************************************************************************/

requireOnceRoot('container.php');

class Page extends Container
{
	public $title;
	private $templateFile;

	// Start output buffering once page is created.
	function __construct($template)
	{
		parent::__construct();

		$this->templateFile = templatePath($template);
		ob_start();
	}

	// When page is done processing, end output buffering and load the
	// template file, which will (or should) put the contents of the page in
	// the appropriate place.
	function __destruct()
	{
		$this->processBuffer();
		require($this->templateFile);
	}
}