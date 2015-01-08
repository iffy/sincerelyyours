<?php

// load server config first
require_once('public/config.php');

// load basic functions so that everything after can use them
require_once('public/functions.php');

// load core oops
require_once('public/session.php');
require_once('public/database.php');
// this is not used yet but left in for now
require_once('public/database_object.php');

// load database related class
require_once('public/user.php');
require_once('public/photograph.php');
require_once('public/story.php');
require_once('public/guest.php');

?>
