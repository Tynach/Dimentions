<?php

/******************************************************************************
 * Represents a generic self-contained unit of web content. Usually HTML, but *
 * might be JSON or whatever else.                                            *
 *                                                                            *
 * Containers are generally created using output buffering, so that you can   *
 * capture things like the contents of the main page being displayed, as well *
 * as treat things like PHP file output as string values.                     *
 *                                                                            *
 * $content is generally said string value.                                   *
 ******************************************************************************/

requireOnceRoot('general.php');

abstract class Container
{
	private $content;

	// Create initial contents of the container upon creation.
	public function __construct($string = '')
	{
		$this->content = $string;
	}

	// Return an indented copy of the container's contents.
	private function indent($indent)
	{
		$line_start = str_repeat(General::INDENT(), $indent);
		$output = str_replace("\n", "\n" . $line_start, $this->content);

		return sprintf("%s\n", $output);
	}

	// Put the contents of the output buffer into the container.
	protected function processBuffer()
	{
		$this->content .= ob_get_contents();
		ob_end_clean();
	}

	// Get the contents of the container, optionally indenting.
	public function getContent($indent = 0)
	{
		if ($indent === 0) {
			return $this->content;
		} else {
			return $this->indent($indent);
		}
	}
}