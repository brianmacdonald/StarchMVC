<?php
/**
 * @package StarchMVC
 * @author Brian Macdonald <brian@zycot.com>
 * @copyright Copyright (c) 2009, Brian Macdonald
 * @license http://opensource.org/licenses/gpl-license.php GNU Public License  
 */   

/**
 * Calls the method of a requested uri.
 */
class Starch_Dispatcher
{
    /**
     * Array of arguments
     *
     * @var array
     * @access private
     */
    private $_arguments = array();

    /**
     * Finds the route from the request uri then loads the route 
     * adds the request as an argument and calls the method.
     *
     * @param object $request Starch_Request
     * @return void
     */
    public function __construct(Starch_Request $request)
    {
        //find route
        $route = $this->findRoute($request->getUri());  
        //load controller
        $obj = $this->loadRoute($route->getUrl('app_path'));
        //arguments
        if(is_array($route->getUrl('arguments'))){
            $this->addArguments($route->getUrl('arguments')); 
        }  
        //a request as default argument
        $this->addArguments(array($request));    
        //call method
        $method_array = array($route->getUrl('controller'), $route->getUrl('method'));
        call_user_func_array($method_array, $this->getArguments());
    }

    /**
     * Loads route array
     *
     * @param array $app_path
     *
     * @access public
     */
    public function loadRoute($app_path)
    {
        //TODO: Add an exception
        if($app_path){
            require_once(BASE_DIR.$app_path.'.php');
        }else{
            die('App not found. ' . BASE_DIR . $app_path . '.php does not exist.');
        }
    }

    /**
     * Add arguments to array
     *
     * @param string|array $args
     * @return void
     * @access public
     */
    public function addArguments($args)
    {
        $args_array = $args;
        if(!is_array($args)){
            $args_array = array($args);    
        }
        $this->_arguments = array_merge($this->_arguments, $args_array);
    }      

    /**
     * Returns arguments array
     *
     * @return array
     * @access public
     */
    public function getArguments()
    {
        return $this->_arguments;
    }  

    /**
     * Finds route matching URI.
     *
     * @param string $uri
     * @return object|null Starch_Route
     *
     * @access public
     */
    public function findRoute($uri)
    {    
        $router = Starch_Router::getInstance();
        $route = $router->route($uri);
        return $route; 
    }
}
