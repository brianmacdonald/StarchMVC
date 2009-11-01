<?php 


require_once '../../lib/simpletest/autorun.php';  

define("BASE_DIR", dirname('../../index.php'));

require_once BASE_DIR.'/system/Starch.php';
require_once BASE_DIR.'/config.php';  

require_once BASE_DIR.'/system/Starch/Request.php';
require_once BASE_DIR.'/system/Starch/Dispatcher.php'; 
require_once BASE_DIR.'/system/Starch/Router.php';
require_once BASE_DIR.'/system/Starch/Controller.php';        

class testStarchSystem extends UnitTestCase
{
    function testSmoke()
    {
        //Load project config
        //TODO: Change to test config (?)
        $config = new Example_Config;
        //Check Starch and Request
        $this->assertTrue(new Starch());   
        $this->assertTrue(new Starch_Request()); 
        //Check set config staic call
        Starch::setConfig($config);
        $this->assertEqual(Starch::getConfig(), $config);
        //Start the router instance
        $this->assertTrue(Starch_Router::getInstance());
        //Check Route class
        $url_array = array('/',
                           '/system/test/test_app.php',
                           'test_app',
                           'test_method',
                           '' //TODO: should be blank(?)
                          );
        $this->assertTrue(new Starch_Route($url_array));    
    }

    function testRoute()
    {
        //Create an array to create route
        $url_array = array('/',
                           '/system/test/test_app.php',
                           'test_app',
                           'test_method',
                           '' //TODO: should be blank(?)
                       );
        //Create route
        $route = new Starch_Route($url_array);
        //Corret output of route getUrl
        $route_array = array('uri'=>'/',
                             'app_path'=>'/system/test/test_app.php',
                             'controller'=>'test_app',
                             'method'=>'test_method',
                             'arguments'=>'',
                         );
        //Compare                    
        $this->assertEqual($route->getUrl(), $route_array);
    }

}
