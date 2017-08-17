<?php

namespace freest\fritter;

use freest\fritter\mvc\controller\Controller as Controller;

require '../config.php';

$controller = new Controller();
$controller->invoke();
