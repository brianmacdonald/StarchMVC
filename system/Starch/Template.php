<?php
/**
* Basic template system
* Usage:
* <code>
* $template = new Template(BASE_DIR.'/templates/my_template.tpl.php',
*                          array('title'=>'My title'));
* echo $template->render();
* </code>
*/
 
class Template
{

    /**
     * Path to template
     *
     * @var string
     */
    private $template_path;

    /**
     * Array of variables
     *
     * @var array
     */
    private $var_array;

    /**
    * Create the template
    * @param string $template_path
    * @param array $var_array
    */
    public function __constuct($template_path, $var_array)
    {
        $this->set_template_path($template_path);
        $this->set_var_array($var_array);
    }

    /**
     * Set the template path
     * @param string
     */
    public set_template_path($template_path)
    {
        $this->template_path = $template;   
    }

    /**
     * Get the template path
     * @return string
     */
    public get_template_path()
    {
        return $this->template_path;
    }    

    /**
     * Sets the variables array
     * @param array $var_array
     */
    public set_var_array($var_array)
    {
        $this->var_array = $var_array;
    }

    /**
     * Gets the var array
     * @return array 
     */
    public get_var_array()
    {
        return $this->var_array;
    }    

    /**
     * Render the template
     * @return string
     */
    public function render()
    {
        foreach($this->get_var_array() as $key=>$value) {
            $this->$key = $value;
        }
        ob_start();
        include $this->get_template_path();
        return ob_get_clean();          
    }

    /**
     * Escapes string
     * @param string $unsafe
     * @return string 
     */
    private function escape($unsafe)
    {
        return htmlspecialchars($unsafe);
    }
 
} 

