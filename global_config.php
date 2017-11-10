<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

if (!file_get_contents("../local_config.php")) {
    die("Please set up local_config.php.");
}
require_once '../local_config.php';
define('WWW', BASE_URL);

define("MYSQL_HOST","localhost");
define("MYSQL_USER","fritter");
define("MYSQL_PASS","fritteruser");
define("MYSQL_DB","fritteruser12345");

define('SITE_TITLE', 'Fritter');

//router
define('BASE_ROUTE', 'public/');

// Requires
require_once 'src/modules/DBC.php';
require_once 'vendor/JochenTimmermans/freestrouter/Router.php';

require_once 'vendor/autoload.php';

require_once 'src/mvc/controller/Controller.php';
