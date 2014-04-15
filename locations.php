<?php

/******************************************************************************
 * This file handles the Location settings for various asset directories so   *
 * that most other files don't need to figure out where to find other things. *
 *                                                                            *
 * Paths defined in the $values array can be relative *or* absolute.          *
 ******************************************************************************/

require_once('settings.php');

class Location extends Settings
{
	private static $values = array(
		'ROOT' => __DIR__,          // Path to project's root directory.
		'PUBLIC_HTML' => 'Public',  // Path to public-facing files.
		'TEMPLATES' => 'Templates', // Path to template files.
		'MODULES' => 'Modules'      // Path to module files.
	);

	// Get the absolute path for the directory.
	public static function __callstatic($name, $arguments)
	{
		if (!array_key_exists($name, static::$values)) {
			throw new Exception(sprintf('Error: %s not found in %s.', $name, __CLASS__));
		} elseif (static::$values[$name][0] == '/') {
			return realpath(static::$values[$name]);
		} else {
			return sprintf("%s/%s", Location::ROOT(), static::$values[$name]);
		}
	}
}