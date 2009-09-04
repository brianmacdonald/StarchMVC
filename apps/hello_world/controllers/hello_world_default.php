<?php
/**
 * @package StarchMVC
 * @author Brian Macdonald <brian@zycot.com>
 * @copyright Copyright (c) 2009, Brian Macdonald
 * @license http://opensource.org/licenses/gpl-license.php GNU Public License  
 */ 

/**
 * Sample app for framework.
 */
class hello_world_default extends App
{

    /**
     * Renders hello world homepage.
     */
    public function welcome()
    {
        //This will be a database object
        $colors = array(
            'Red',
            'Blue',
            'Yellow',
            'Green',
            );
        //context as array
        $context = array(
            'name'=>'Hello World',
            'colors'=>$colors,
            );
       
        $this->render($context, 'hello_world/views/base.html');    

    }

    public function colors()
    {
        //This will be a database object
        $colors = array(
            'Red',
            'Blue',
            'Yellow',
            'Green',
            );  

        $context = array(
            'name'=>'another test',
            'colors'=>$colors,
        );

        $this->render($context, 'hello_world/views/base.html');        

    }

}




