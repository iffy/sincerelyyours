<?php

//Database Constants

defined('DB_SERVER') 	?null : define ("DB_SERVER",getenv('MYSQL_HOST'));
defined('DB_USER') 		?null : define ("DB_USER",getenv('MYSQL_USER'));
defined('DB_PASS') 		?null : define ("DB_PASS",getenv('MYSQL_PASSWORD'));
defined('DB_NAME') 		?null : define ("DB_NAME",getenv('MYSQL_DATABASE'));
defined('DB_PORT')      ?null : define ("DB_PORT",intval(getenv("MYSQL_PORT")));

?>
