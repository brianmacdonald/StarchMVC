<?php
/**
 * @package StarchMVC
 * @author Brian Macdonald <brian@zycot.com>
 * @copyright Copyright (c) 2009, Brian Macdonald
 * @license http://opensource.org/licenses/gpl-license.php GNU Public License  
 */  

/**
 * Example app
 */
class hello_world extends Starch_Controller
{

    public function index($request)
    {
        echo 'Hello World!';
        print_r($request->getPostRequest());
    }

}

