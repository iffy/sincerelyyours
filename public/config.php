<?php

//Database Constants

defined('DB_SERVER') 	?null : define ("DB_SERVER",getenv('MYSQL_HOST') ?: "localhost");
defined('DB_USER') 		?null : define ("DB_USER",getenv('MYSQL_USER') ?: "root");
defined('DB_PASS') 		?null : define ("DB_PASS",getenv('MYSQL_PASSWORD') ?: "remote99");
defined('DB_NAME') 		?null : define ("DB_NAME",getenv('MYSQL_DATABASE') ?: "story");
defined('DB_PORT')      ?null : define ("DB_PORT",getenv("MYSQL_PORT") ? intval(getenv("MYSQL_PORT")) : NULL);

defined('UPLOAD_DIR') ?null : define ('UPLOAD_DIR', getenv('UPLOAD_DIR') ?: "images");

?>
