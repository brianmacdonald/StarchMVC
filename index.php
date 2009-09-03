<?php
/* StarchMVC
 *
 *
 *
 *
 */
define("BASE_DIR", dirname(__FILE__));      

require_once BASE_DIR.'/system/Starch.php';
require_once BASE_DIR.'/system/config.php';

$config = new Starch_Config;    

/* This will hold the code to start the framework.
 *
 */
class Init extends Starch
{

    /**
     * @return null
     */
    public function my_addon_method()
    {
        return null;
    }

}

//run code
$init = new Init($config);

//thanks
