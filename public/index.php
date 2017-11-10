<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

use framework\mvc\controller\Controller as Controller;

require '../global_config.php';

// Start controller
$controller = new Controller();

// Invoke Controller
$controller->invoke();

/**
 * TODO
 * 
 * - Add business 
 */