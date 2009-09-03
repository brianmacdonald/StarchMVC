<?php
/* StarchMVC
 *
 *
 *
 *
 */


/* Sample app for frame work.
 *
 */
class hello_world_default
{

    public function welcome()
    {
       
        $smarty = new Smarty;

        $smarty->assign('name', 'Hello World');

        $smarty->display(BASE_DIR.'/apps/hello_world/views/base.html');    

    }

}




