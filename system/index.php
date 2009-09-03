<?php

require_once 'config.php';

require_once 'apps.php';
require_once 'router.php';

//libs
require_once BASE_DIR.'/lib/Smarty/Smarty.class.php';

$config = new Config();

$router = new Starch_Router($config);
$apps = new Apps($config);

$apps->loadApps();

//print_r($router->requestURI);

