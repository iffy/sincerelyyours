<?php

include('public/database.php');
require_once('public/initialize.php');

updateSchema();

redirect_to("/index.php");

?>