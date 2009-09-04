<?php
/**
 * @package StarchMVC
 * @author Brian Macdonald <brian@zycot.com>
 * @copyright Copyright (c) 2009, Brian Macdonald
 * @license http://opensource.org/licenses/gpl-license.php GNU Public License  
 */  

require_once BASE_DIR.'/lib/php-router/php-router.php';

/**
 * Starch wrapper for php-router Router class
 */
class Starch_PHP_Router extends Router{}

/**
 * Starch wrapper for php-router Dispatcher class
 */
class Starch_PHP_Dispatcher extends Dispatcher{}

/**
 * Starch wrapper for php-router Route class
 */
class Starch_PHP_Route extends Route{}
