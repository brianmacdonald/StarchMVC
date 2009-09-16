<?php
/**
 * @package StarchMVC
 * @author Brian Macdonald <brian@zycot.com>
 * @copyright Copyright (c) 2009, Brian Macdonald
 * @license http://opensource.org/licenses/gpl-license.php GNU Public License  
 */ 


/**
 * Framework user request
 */
class Starch_Request
{
    /**
     * $_GET request array
     *
     * @var array
     * @access private
     */
    private $_get_request = array();

    /**
     * $_POST request array
     *
     * @var array
     * @access private
     */ 
    private $_post_request = array();

    /**
     * URI string
     *
     * @var string
     * @access private
     */
    private $_uri;

    /**
     * Array of uri segments split by '/'
     *
     * @var array
     * @access private
     */    
    private $_uri_array = array();

    /**
     * Set all properties when object is created
     *
     * @return void
     * @access public
     */
    public function __construct()
    {
        $this->_setGetRequest();
        $this->_setPostRequest();
        $this->_setURI(); 
    }

    /**
     * Set get request array
     *
     * @return void
     * @access private
     */ 
    private function _setGetRequest()
    {
        $this->_get_request = $_GET;
    }

    /**
     * Returns get request array or value from key
     *
     * @param string $var Optional
     * @return array|string 
     * @access public  
     */     
    public function getGetRequest($var='')
    {
        $request = $this->_get_request;
        if($var && in_array($var, $request)){
            return $request[$var];
        }
        return $request;
    }

    /**
     *
     */     
    private function _setPostRequest()
    {
        $this->_post_request = $_POST;         
    }  

    /**
     * Returns get request array or value from key
     *
     * @param string $var Optional
     * @return array|string 
     * @access public
     */     
    public function getPostRequest($var='')
    {
        $request = $this->_post_request;
        if($var && in_array($var, $request)){
            return $request[$var];
        }
        return $request;  
    } 

    /**
     * Sets uri as string and array
     *
     * @return void
     * @access private
     */
    private function _setURI()
    {
        $uri = urldecode($_SERVER['REQUEST_URI']);  
        $this->_uri = preg_replace('/^([^?]*).*$/', '$1', $uri);  
        $this->_uri_array = explode($this->_uri,'/');
    }

    /**
     * Gets uri as string
     *
     * @return string
     * @access public
     */
    public function getURI()
    {
        return $this->_uri;
    }    

    /**
     * Gets uri as array
     *
     * @return array
     * @access public
     */
    public function getURIArray()
    {
        return $this->_uri_array;
    }

}    
