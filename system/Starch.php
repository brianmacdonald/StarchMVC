<?php

require_once BASE_DIR.'/system/config.php';

require_once BASE_DIR.'/system/apps.php';
require_once BASE_DIR.'/system/Starch/Router.php';

//libs
require_once BASE_DIR.'/lib/Smarty/Smarty.class.php';

$config = new Config();

$router = new Starch_Router($config);
$apps = new Apps($config);

//print_r($router->requestURI);

