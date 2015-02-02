<?php

/****************************************************************************
 * This file tells the PHP engine to use a specific exception handling      *
 * function. This allows us to catch exceptions that occur during the       *
 * execution of the PHP page or file the browser requested, and while the   *
 * content may not finish 'rendering', the template will appear and the     *
 * exception(s) can be printed nicely in a list or div.                     *
 *                                                                          *
 * This will NOT work inside modules and the templates themselves, and also *
 * assumes that the framework itself is properly set up/working.            *
 ****************************************************************************/

requireOnceRoot('general.php');

function handleException($exception)
{
	General::insertSetting('ERROR', $exception);
}

set_exception_handler('handleException');