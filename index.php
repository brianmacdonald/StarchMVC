<?php
/* StarchMVC
 *
 *
 *
 *
 */
define("BASE_DIR", dirname(__FILE__));      


require_once 'system/Starch.php';

/*
 * temp
 */

   
require_once('apps/hello_world/controllers/core.php');

$view = new hello_world_welcome;

$view->welcome();

/*
 * end temp
 */  


class Init
{

    /**
     * @return null
     */
    public function Init()
    {
        return null;
    }

}

class Site_Router extends Starch_Router
{
    var $baseurls = 'test';  

    public function base_router(){
        return null;
    }
}
    //    '/' => app('sample_app')
    //    );



$router = new Site_Router;

//run code
$init = new Init($router->baseurls);

//thanks
