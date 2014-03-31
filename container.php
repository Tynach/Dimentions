<?php

/******************************************************************************
 * Represents a generic self-contained unit of web content. Usually HTML, but *
 * might be JSON or whatever else.                                            *
 ******************************************************************************/

abstract class Container
{
	private $content; // The contents of the container.

	// Indent the content of the container.
	protected function indent($level)
	{
		$this->content = str_replace("\n", "\n".str_repeat(General::INDENT(), $level), $this->content);
		$this->content .= "\n";
	}
}