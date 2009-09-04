<?php
/**
 * @package StarchMVC
 * @author Brian Macdonald <brian@zycot.com>
 * @copyright Copyright (c) 2009, Brian Macdonald
 * @license http://opensource.org/licenses/gpl-license.php GNU Public License  
 */
require_once BASE_DIR.'/system/config.php';

require_once BASE_DIR.'/system/App.php';
require_once BASE_DIR.'/system/Starch/Error.php';  
require_once BASE_DIR.'/system/Starch/Router.php';
require_once BASE_DIR.'/system/Starch/Template.php';


class Starch
{
    /**
     * Class Constructor
     * @param Starch_Config
     */
    public function __construct(Starch_Config $config )
    {
        $this->config = $config;
 
        $this->_loadApps();

    }

    /**
     * Load all of the apps that are in the config
     */
    private function _loadApps()
    {
        $router     = new Starch_Router;
        $dispatcher = new Starch_Dispatcher;
        $dispatcher->setSuffix($this->config->app_suffix);
        if(count($this->config->apps)){
            foreach($this->config->apps as $app){ 
                require_once BASE_DIR.'/apps/'.$app.'/'.$app.'.php';
                //load the routes
                $this->_route_app($router, $dispatcher, $app);
                $dispatcher->setClassPath(BASE_DIR.'/apps/'.$app.'/controllers/');
            }
        }
        $router->dispatch_routes($dispatcher);
    }

    /**
     * Creates routing object from each apps routes file
     * @param string $app_name
     * @return Starch_Router
     * @access private 
     */
    private function _route_app(Starch_Router $router, Starch_Dispatcher $dispatcher, $app_name)
    {
        //include app urls
        require_once BASE_DIR.'/apps/'.$app_name.'/urls.php';
        $app_name_urls = $app_name.'_urls';
        $app_urls = new $app_name_urls;
        //cycle through each app  url
        foreach($app_urls->urls() as $url){
            $route = new Starch_Route($url[0]);
            $route->setMapClass($app_name);  
            $route->setMapMethod($url[1]);      
            $router->addRoute($url[2], $route );            
        }
        return $router;  
    }    

}
