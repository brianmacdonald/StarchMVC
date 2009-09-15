<?php
/**
 * @package StarchMVC
 * @author Brian Macdonald <brian@zycot.com>
 * @copyright Copyright (c) 2009, Brian Macdonald
 * @license http://opensource.org/licenses/gpl-license.php GNU Public License  
 */ 


/**
 *
 */
class Starch_Route
{

    private $_array;

    /**
     * Builds the route
     * @param array $url_array
     */
    public function __construct($url_array)
    {
        $this->_array = array(
            'uri'=>$url_array[0],
            'app_path'=>$url_array[1],
            'controller'=>$url_array[2],
            'method'=>$url_array[3], 
            'arguments'=>''
            //'name'=>$url_array[4]
            ); 
    }

    public function getUrls()
    {
        return $this->_array;
    }

} 
