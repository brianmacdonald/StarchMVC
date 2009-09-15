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
class Starch_Request
{

    private $_get_request;

    private $_post_request;

    private $_uri;

    private $_uri_array = array();

    /**
     *
     */
    public function __construct()
    {
        $this->_setGetRequest();
        $this->_setPostRequest();
        $this->_setURI(); 
    }

    /**
     *
     */ 
    private function _setGetRequest()
    {
        $this->_get_request = $_GET;
    }

    /**
     *
     */     
    public function getGetRequest()
    {
        return $this->_get_request;
    }

    /**
     *
     */     
    private function _setPostRequest()
    {
        $this->_post_request = $_POST;         
    }  

    /**
     *
     */     
    public function getPostRequest()
    {
        return $this->_post_request;
    } 

    private function _setURI()
    {
        $this->_uri = urldecode($_SERVER['REQUEST_URI']);
        $this->_uri_array = explode($this->_uri,'/');
    }

    public function getURI()
    {
        return $this->_uri;
    }    

    public function getURIArray()
    {
        return $this->_uri_array;
    }

}    
