<?php

ini_set('error_reporting', E_ALL & ~E_DEPRECATED);
ini_set('display_errors', 'STDOUT');

define('BASE_URL', 'http://localhost/fritter/public/');
define('WWW', 'http://localhost/fritter/public/');
define('ROOT_URL', $_SERVER['DOCUMENT_ROOT'].'/fritter/');

define("MYSQL_HOST","localhost");
define("MYSQL_USER","fritteruser");
define("MYSQL_PASS","fritteruser12345");
define("MYSQL_DB","fritter");
// ROUTING 
define("BASE_ROUTE",'fritter/public');

define("SITE_TITLE", "Fritter");
define("SITE_SUBTITLE", "The Freest Twitter");

// Requires
require_once 'vendor/autoload.php';
require_once 'src/modules/DBC.php';

require_once 'src/mvc/controller/Controller.php';

require_once 'src/mvc/model/Model.php';

require_once 'src/modules/User.php';
require_once 'src/modules/auth.php';

require_once 'vendor/jfreeman82/freestrouter/Router.php';
