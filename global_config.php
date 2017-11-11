<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

if (!file_get_contents("../local_config.php")) {
    die("Please set up local_config.php.");
}
require_once '../local_config.php';
define('WWW', BASE_URL);

define("MYSQL_HOST","localhost");
define("MYSQL_USER","fritteruser");
define("MYSQL_PASS","fritteruser12345");
define("MYSQL_DB","fritter");

define('SITE_TITLE', 'Fritter');

//router
define('BASE_ROUTE', 'public/');

// Requires
require_once 'vendor/JochenTimmermans/freestrouter/Router.php';

require_once 'vendor/autoload.php';

require_once 'src/mvc/controller/Controller.php';
require_once 'src/mvc/controller/LoggedInController.php';

require_once 'src/mvc/model/UserModel.php';

require_once 'src/modules/classes/DBC.php';
require_once 'src/modules/classes/Error.php';
require_once 'src/modules/classes/Follow.php';
require_once 'src/modules/classes/Freet.php';
require_once 'src/modules/classes/User.php';
