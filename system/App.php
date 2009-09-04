<?php
/**
 * @package StarchMVC
 * @author Brian Macdonald <brian@zycot.com>
 * @copyright Copyright (c) 2009, Brian Macdonald
 * @license http://opensource.org/licenses/gpl-license.php GNU Public License  
 */  

/** 
 * App abstration class
 */
class App
{
    /**
     * @param string $template_name
     * return full path to template
     */
    public function getTemplatePath($template_name)
    {
         $template_base = BASE_DIR.'/apps/'; 
         return $template_base.$template_name;
    }

    /**
     * Displays view
     * @param array  $context
     * @param string $template_name
     */
    public function render($context, $template_name)
    {
        $template = new Starch_Template;
        foreach($context as $key=>$value){
            $template->assign($key, $value);
        }
        $template_path = $this->getTemplatePath($template_name);
        return $template->display($template_path);
          
    }


}
