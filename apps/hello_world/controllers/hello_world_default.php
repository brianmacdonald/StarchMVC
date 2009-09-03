<?php
/* StarchMVC
 *
 *
 *
 *
 */


/* Sample app for framework.
 *
 */
class hello_world_default extends App
{

    public function welcome()
    {
       
        $this->buildTemplate();

        $this->assignTag('name', 'Hello World');

        $this->render(BASE_DIR.'/apps/hello_world/views/base.html');    

    }

}




