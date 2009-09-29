<?php
/**
 * @package StarchMVC
 * @author Brian Macdonald <brian@zycot.com>
 * @copyright Copyright (c) 2009, Brian Macdonald
 * @license http://opensource.org/licenses/gpl-license.php GNU Public License  
 */ 

abstract class Starch_Controller
{
    public function getStarchConfig()
    {
        return Starch::getConfig();
    }

    public function addTag($tag_key, $tag_value)
    {
        $this->_tags = array_merge($this->_tags, array($tag_key=>$tag_value)); 
    }

    public function addTagArray($tag_array)
    {
        $this->_tags = array_merge($this->_tags, $tag_array);   
    }

    public function getTags()
    {
        return $this->_tags;   
    } 

    public function setTemplate($template)
    {
        $this->_template = $template;
    }

    public function getTemplate()
    {
        return $this->_template;
    }  

    public function render($template=null)
    {
        if(!$template){
            $template = $this->getTemplate();
        }
        //$adapter = new self::_config->template_engine.'_Adapter';
        foreach($this->_tags as $tag_key=>$tag_value){
            $adapter->append($tag_key, $tag_value);
            $adapter->render($template);
        }  
    }   

}
