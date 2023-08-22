<?php

use framework\App;
use framework\Router;

require_once dirname(__DIR__) . '/config/init.php';

new App();

debug($_SERVER);
echo "<hr>";
debug(Router::getRoutes());