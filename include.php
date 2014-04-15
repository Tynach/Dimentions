<?php

/*******************************************************************************
 * This file essentially defines several functions to make 'includes' and      *
 * 'requires' easier when using the the project's configured folder locations. *
 *******************************************************************************/

require_once('locations.php');

// The extra curly braces around these sections are so I can 'fold' and hide
// them in my editor of choice. They apparently do not hinder the parser, and
// the code runs just fine.

// Functions to grab the file's real path:
{
	function rootPath($file)
	{
		return sprintf('%s/%s', Location::ROOT(), $file);
	}

	function publicHtmlPath($file)
	{
		return sprintf('%s/%s', Location::PUBLIC_HTML(), $file);
	}

	function templatePath($file)
	{
		return sprintf('%s/%s', Location::TEMPLATES(), $file);
	}

	function modulePath($file)
	{
		return sprintf('%s/%s', Location::MODULES(), $file);
	}
}

// Functions equivalent to 'include()':
{
	function includeRoot($file)
	{
		include(rootPath($file));
	}

	function includePublicHtml($file)
	{
		include(publicHtmlPath($file));
	}

	function includeTemplate($file)
	{
		include(templatePath($file));
	}

	function includeModule($file)
	{
		include(modulePath($file));
	}
}

// Functions equivalent to 'include_once()':
{
	function includeOnceRoot($file)
	{
		include_once(rootPath($file));
	}

	function includeOncePublicHtml($file)
	{
		include_once(publicHtmlPath($file));
	}

	function includeOnceTemplate($file)
	{
		include_once(templatePath($file));
	}

	function includeOnceModule($file)
	{
		include_once(modulePath($file));
	}
}

// Functions equivalent to 'require()':
{
	function requireRoot($file)
	{
		require(rootPath($file));
	}

	function requirePublicHtml($file)
	{
		require(publicHtmlPath($file));
	}

	function requireTemplate($file)
	{
		require(templatePath($file));
	}

	function requireModule($file)
	{
		require(modulePath($file));
	}
}

// Functions equivalent to 'require_once()':
{
	function requireOnceRoot($file)
	{
		require_once(rootPath($file));
	}

	function requireOncePublicHtml($file)
	{
		require_once(publicHtmlPath($file));
	}

	function requireOnceTemplate($file)
	{
		require_once(templatePath($file));
	}

	function requireOnceModule($file)
	{
		require_once(modulePath($file));
	}
}