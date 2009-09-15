<?php
/**
 * @package StarchMVC
 * @author Brian Macdonald <brian@zycot.com>
 * @copyright Copyright (c) 2009, Brian Macdonald
 * @license http://opensource.org/licenses/gpl-license.php GNU Public License  
 */ 

//Base directory
define("BASE_DIR", dirname(__FILE__));      
//Framework
require_once BASE_DIR.'/system/Starch.php';
//Your config file
require_once BASE_DIR.'/config.php';
//create configuration object
$config = new Example_Config;    

/** 
 * Starts the framework with configuration.
 */
Starch::run($config);
