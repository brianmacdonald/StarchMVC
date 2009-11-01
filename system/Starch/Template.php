<?php
/**
* Basic template system
* Usage:
* <code>
* $template = new Template(BASE_DIR.'/templates/my_template.tpl.php',
*                          array('title'=>'My title'));
* echo $template;
* </code>
*/
 
class Template
{
    /**
    * Render the template
    * @param string $template_path
    * @param array $var_array
    */
    function __constuct($template_path, $var_array)
    {
        foreach($var_array as $key=>$value) {
            $this->$key = $value;
        }
        ob_start();
        include $template_path
        return ob_get_clean();
    }
 
} 

