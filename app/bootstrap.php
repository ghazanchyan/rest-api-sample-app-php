<?php

// Include the composer autoloader
if(!file_exists(__DIR__ .'/../vendor/autoload.php')) {
	echo "The 'vendor' folder is missing. You must run 'composer update' to resolve application dependencies.\nPlease see the README for more information.\n";
	exit(1);
}
require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/common/user.php';
require_once __DIR__ . '/common/order.php';
require_once __DIR__ . '/common/paypal.php';
require_once __DIR__ . '/common/util.php';

// Define the location of the sdk_config.ini file
// This is needed by the REST SDK 
define("PP_CONFIG_PATH", dirname(__DIR__));

// Define connection parameters
define('MYSQL_HOST', 'localhost:3306');
define('MYSQL_USERNAME', 'user');
define('MYSQL_PASSWORD', 'password');
define('MYSQL_DB', 'paypal_pizza_app');