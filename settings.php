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
 * values by using "ClassName::CONSTANT_NAME()". The array's name is $values. *
 ******************************************************************************/

abstract class Settings
{
	protected static $values = [];

	// Returns false if the setting $value refers to does not exist.
	public static function __callstatic($name, $arguments)
	{
		if (!isset(static::$values[$name])) {
			return false;
		}

		return static::$values[$name];
	}
	
	public static function insertSetting($name, $value)
	{
		// No mercy. If someone tries to override an existing setting,
		// throw an exception and cause their page to basically not work
		// anymore.
		if (isset(static::$values[$name])) {
			throw exception("The '$name' setting already exists.");
		}

		static::$values[$name] = $value;
	}
}