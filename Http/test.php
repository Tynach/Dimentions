<?php

/******************************************************************************
 * Test Web Page                                                              *
 *                                                                            *
 * This is a sample web page, which uses a template and outputs a full HTML   *
 * document.                                                                  *
 ******************************************************************************/

require_once('forPages.php');

$page = new Page('default.php');
$page->title = 'Hello, world!';

?>
<p>Hello, world!<?php
// Demonstrate exception handling in the default template. Uncommenting this
// line will create an otherwise omitted 'Exception' div with a list of
// exceptions that occured that were not handled. Probably only one.
throw new Exception('Error handling demonstration.');