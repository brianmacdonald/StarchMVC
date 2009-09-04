<?php
/**
 * @package StarchMVC
 * @author Brian Macdonald <brian@zycot.com>
 * @copyright Copyright (c) 2009, Brian Macdonald
 * @license http://opensource.org/licenses/gpl-license.php GNU Public License  
 */ 



class hello_world_urls
{

    /**
     * Builds array of url parameters
     * @param string $url
     * @param string $method
     * @param string $name
     * @return array
     */
    public function url($url, $method, $name)
    {
        return array($url, $method, $name);    
    }

    public function urls()
    {
         return array(
             $this->url('/starch/', 'welcome', 'welcome'),
             $this->url('/starch/index.php/colors/', 'colors', 'colors'),
         ); 
    }
   
}
