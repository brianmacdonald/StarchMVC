<?php
/* StarchMVC
 *
 *
 *
 */

/* App abstration class
 *
 */
class App
{
    /*
     *
     */
    public function buildTemplate()
    {
        $this->template = new Starch_Template();
    }

    /* Assigns tag for template system
     * @param string $tagname
     * @param string $value
     */
    protected function assignTag($tagname, $value)
    {    
        if($this->template){
            $this->template->assign($tagname, $value);
        }
    }

    /* Displays view
     * @param string $template_name
     */
    protected function render($template_name)
    {
        if($this->template){  
            $this->template_name = $template_name;
            if($this->app_dir){
                $this->template_name = $this->app_dir.$template_name;
            }
                $this->template->display($this->template_name);
            } 
    }


}
