<?php
/**
 * @package StarchMVC
 * @author Brian Macdonald <brian@zycot.com>
 * @copyright Copyright (c) 2009, Brian Macdonald
 * @license http://opensource.org/licenses/gpl-license.php GNU Public License  
 */


require_once BASE_DIR.'/system/Starch/Request.php';
require_once BASE_DIR.'/system/Starch/Dispatcher.php'; 
require_once BASE_DIR.'/system/Starch/Router.php';
require_once BASE_DIR.'/system/Starch/Controller.php';

/**
 * Base class for frame work.
 *
 * To use, create a static call to run with Starch_Config as 
 * argument.
 */
final class Starch
{
    /**
     * @var Starch_Config object
     */
    static private $_config;

    /**
     * Runs framework
     */
    public function run(Starch_Config $config)
    {
        //Set config for class
        self::setConfig($config);
        //Create router object
        $router = Starch_Router::getInstance();
        $router->addRoutesFromConfig($config);
        //Load request        
        $request = new Starch_Request;
        //Send request to dispatch
        $dispatch = new Starch_Dispatcher($request);
    }

    /**
     * Sets the config for the class
     */
    public function setConfig(Starch_Config $config)
    {
        self::$_config = $config;
    } 

    /**
     * Gets the config for the class
     */
    public function getConfig()
    {
        return self::$_config;
    }

}
