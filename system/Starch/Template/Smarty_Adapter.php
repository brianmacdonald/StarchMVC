<?php
/**
 * @package StarchMVC
 * @author Brian Macdonald <brian@zycot.com>
 * @copyright Copyright (c) 2009, Brian Macdonald
 * @license http://opensource.org/licenses/gpl-license.php GNU Public License  
 */

require_once BASE_DIR.'/libs/Smarty/Smarty.class.php';  

/** 
 * Smarty template adapter.
 */
class Smarty_Adapter extends Smarty{

    public render($template){
        $this->display($template);
    }

}
