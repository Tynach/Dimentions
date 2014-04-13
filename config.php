<?php

/******************************************************************************
 * Constants need to be faked because these are often more dynamically        *
 * generated than is allowed by the 'const' keyword. We don't want these to   *
 * change at runtime, so they have to be private. They're global settings for *
 * the project, so we make them static members of a class.                    *
 *                                                                            *
 * We fake them by creating a private static array, and then implementing     *
 * __callstatic() in such a way that it pulls out the relevant value.         *
 *                                                                            *
 * The array format is "$CONSTANT_NAME => $constant_value", and you retrieve  *
 * values by using "ClassName::CONSTANT_NAME()".                              *
 ******************************************************************************/

abstract class Settings
{
	private static $values;

	public static function __callstatic($name, $arguments)
	{
		return static::$values[$name];
	}
}

// This class stores the locations of various resources for the project relative
// to the project's root directory.
class Location extends Settings
{
	$values = array(
		'ROOT' => __DIR__,          // Path to project's root directory.
		'PUBLIC' => 'Public',       // Path to public-facing files.
		'TEMPLATES' => 'Templates', // Path to template files.
		'MODULES' => 'Modules'      // Path to module files.
	);
	
	public static 

	public static function __callstatic($name, $arguments)
	{
		if (static::$values[$name][0] == '/') {
			return realpath(static::$values[$name]);
		} else {
			return sprintf("%s/%s", static::$values['ROOT'], static::$values[$name]);
		}
	}
}

// This class stores general settings.
class General extends Settings
{
	$values = array(
		'INDENT' => "\t", // The indentation character (spaces or tab).
	);
}