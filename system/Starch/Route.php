<?php
/**
 * @package StarchMVC
 * @author Brian Macdonald <brian@zycot.com>
 * @copyright Copyright (c) 2009, Brian Macdonald
 * @license http://opensource.org/licenses/gpl-license.php GNU Public License  
 */ 


/**
 * Takes route array, formats and allows later access
 */
class Starch_Route
{

    /**
     * Array containing parameter for the route
     *
     * @var array
     * @access private 
     */
    private $_route_array = array();

    /**
     * Builds the route
     *
     * @param array $url_array
     * @return void
     * @access public
     */
    public function __construct($url_array)
    {
        //Check if array is correct length
        if(count($url_array) >= 5){
            $this->_route_array = array(
                'uri'=>$url_array[0],
                'app_path'=>$url_array[1],
                'controller'=>$url_array[2],
                'method'=>$url_array[3], 
                'arguments'=>''
            );
            //Add name to array
            if($url_array[5]){
                $this->_route_array['name'] = $url_array[5];   
            }
        }else{
            //TODO: Add Starch Error throw 500
            die('URL array is not correct length.');
        }            
    }

    /**
     * Returns array of route parameters
     *
     * @param string $var Optional
     * @return array|string 
     * @access public   
     */
    public function getUrl($var='')
    {  
        $route_array = $this->_route_array;
        if($var && array_key_exists($var, $route_array)){
            return $route_array[$var];
        }
        return $route_array;   
    }

} 
