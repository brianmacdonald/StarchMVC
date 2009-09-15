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
     * Path to app
     *
     * @var string
     * @access private
     */
    private $_app_path;

    /**
     * Controller name
     *
     * @var string
     * @access private
     */   
    private $_controller;

    /**
     * Method name
     *
     * @var string
     * @access private    
     */
    private $_method; 

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
        $obj = $this->loadRoute($route);
        //a request as default argument
        $this->addArguments(array($request));    
        //call method
        $method_array = array($this->getController(), $this->getMethod());
        call_user_func_array($method_array, $this->getArguments());
    }

    /**
     * Loads route array
     *
     * @param array $route
     *
     * @access public
     */
    public function loadRoute($route)
    {
        //TODO: Add some exceptions
        require_once(BASE_DIR.$route['app_path'].'.php');
        $this->setController($route['controller']);
        $this->setMethod($route['method']);
        $this->setPath($route['app_path']);
        if(is_array($route['arguments'])){
            $this->addArguments($route['arguments']); 
        }
    }

    public function setController($controller)
    {
        $this->_controller = $controller;
    }

    public function getController()
    {
        return $this->_controller;
    }

    public function setMethod($method)
    {
        $this->_method = $method;
    }  

    public function getMethod()
    {
        return $this->_method;
    }  

    public function setPath($path)
    {
        $this->_app_path = $path;
    } 

    public function getPath()
    {
        return $this->_app_path;
    }

    public function addArguments($args)
    {
        $args_array = $args;
        if(!is_array($args)){
            $args_array = array($args);    
        }
        $this->_arguments = array_merge($this->_arguments, $args_array);
    }      

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
        return $router->route($uri); 
    }
}
