<?php
/**
 * @package StarchMVC
 * @author Brian Macdonald <brian@zycot.com>
 * @copyright Copyright (c) 2009, Brian Macdonald
 * @license http://opensource.org/licenses/gpl-license.php GNU Public License  
 */

/**
 * Require Starch_Route class 
 */
require_once BASE_DIR."/system/Starch/Route.php";

/**
 * Singleton pattern class to hold and process all routes across framework.
 */
class Starch_Router
{
    /**
     * Instance of Starch_Router class
     *
     * @var object Starch_Router
     * @access private 
     */
    private static $instance;

    /**
     * Array of app routes
     *
     * @var array
     * @access private
     */
    private $_routes = array();
    
    /**
     * Boilerplate Singleton method
     *
     * @return object Starch_Router
     *
     * @access public  
     */
    public static function getInstance()
    {
        if(!isset(self::$instance)){
            $object= __CLASS__;
            self::$instance=new $object;
        }
        return self::$instance;
    }

    /**
     * Adds route to routes array
     *
     * @param object $route Starch_Route 
     * @return void
     *
     * @access public 
     */
    public function addRoute(Starch_Route $route)
    {
        $this->_routes[] = $route;
    }

    /**
     * Gets routes array
     *
     * @return array
     *
     * @access public
     */
    public function getRoutes()
    {
        return $this->_routes;
    }

    /**
     * Looks at all of the urls in the config file and builds a route object
     * from each url array then adds it to the array.
     *
     * @param object $config Starch_Config
     * @return void
     *
     * @access public
     */
    public function addRoutesFromConfig(Starch_Config $config)
    {
        if(!$config->urls){ die('No urls found'); }
        foreach($config->urls as $url){
            $route = new Starch_Route($url);
            $this->addRoute($route);    
        }
    }

    /**
     * Find route from routes array using uri and returns 
     * that route object.
     *
     * @param string $uri
     * @return null|object Starch_Route Null if no route is found.
     *
     * @access public
     */
    public function route($uri)
    {
        $routes = $this->_routes;
        #TODO: Starch error to throw 500 
        if(!$routes){ die('No routes found');}
        //find the route in the routes array
        foreach($routes as $route){   
            $url = $route->getUrl('uri');
            if($url == $uri){
                $found_route = $route;
            }
        }
        if(!$found_route){
            #TODO: Starch error to throw 404
            die('404 '.$uri.' not found');
        }
        return $found_url;
    }

}  
