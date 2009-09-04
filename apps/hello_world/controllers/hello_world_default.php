<?php
/**
 * @package StarchMVC
 * @author Brian Macdonald <brian@zycot.com>
 * @copyright Copyright (c) 2009, Brian Macdonald
 * @license http://opensource.org/licenses/gpl-license.php GNU Public License  
 */ 

/**
 * Sample app for framework.
 *
 */
class hello_world_default extends App
{

    /**
     * Renders hello world homepage.
     */
    public function welcome()
    {
        //context as array
        $context = array(
            'name'=>'Hello World',
            );
       
        $this->render($context, 'hello_world/views/base.html');    

    }

}




