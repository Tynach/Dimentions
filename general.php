<?php

/*******************************************************
 * This file handles 'General' configuration settings. *
 *******************************************************/

require_once('settings.php');

class General extends Settings
{
	protected static $values = array(
		'INDENT' => "\t", // The indentation character (spaces or tab).
	);
}