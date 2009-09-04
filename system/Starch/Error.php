<?php
/**
 * @package StarchMVC
 * @author Brian Macdonald <brian@zycot.com>
 * @copyright Copyright (c) 2009, Brian Macdonald
 * @license http://opensource.org/licenses/gpl-license.php GNU Public License  
 */ 


class Error 
{

    public function Show($status_code, $error='')
    {
        echo implode(array($status_code, $error), ' ');
    }

}
