<?php

/******************************************************
 * Files necessary for every page to function at all. *
 ******************************************************/

// Change the first one to the path of your config file.
include_once('../config.php');
include_once(sprintf('%s/%s', Location::ROOT(), 'page.php'));