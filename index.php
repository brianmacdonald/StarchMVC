<?php
/**
 * @package StarchMVC
 * @author Brian Macdonald <brian@zycot.com>
 * @copyright Copyright (c) 2009, Brian Macdonald
 * @license http://opensource.org/licenses/gpl-license.php GNU Public License  
 */ 

define("BASE_DIR", dirname(__FILE__));      

require_once BASE_DIR.'/system/Starch.php';
require_once BASE_DIR.'/system/config.php';

$config = new Starch_Config;    

/** 
 * Starts the framework.
 */
class Init extends Starch{}

//run code
$init = new Init($config);

//thanks
