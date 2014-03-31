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

abstract class Container
{
	private $content = '';

	// Indent the contents of the container.
	private function indent($indent)
	{
		return sprintf("%s\n", str_replace("\n", "\n".str_repeat(General::INDENT(), $indent), $this->content));
	}

	// Put the contents of the output buffer into the container.
	protected function processBuffer()
	{
		$this->content .= ob_get_contents();
		ob_end_clean();
	}

	// Get the contents of the container.
	public function getContent($indent = 0)
	{
		if ($indent == 0) {
			return $this->content;
		} else {
			return $this->indent($indent);
		}
	}
}