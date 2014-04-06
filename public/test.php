<?php

/******************************************************************************
 * Test Web Page                                                              *
 *                                                                            *
 * This is a sample web page, which uses a template and outputs a full HTML   *
 * document.                                                                  *
 ******************************************************************************/

include_once('forPages.php');

$page = new Page('default.php');
$page->title = 'Hello, world!';

?>
<p>Hello, world!
</p>