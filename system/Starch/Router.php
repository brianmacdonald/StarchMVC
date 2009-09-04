<?php
/**
 * @package StarchMVC
 * @author Brian Macdonald <brian@zycot.com>
 * @copyright Copyright (c) 2009, Brian Macdonald
 * @license http://opensource.org/licenses/gpl-license.php GNU Public License  
 */    

require_once BASE_DIR.'/system/Starch/Router/php_router_wrapper.php'; 

/**
 * Url router class
 */
class Starch_Router extends Starch_PHP_Router
{

    public function getCurrentURI()
    {
        return urldecode($_SERVER['REQUEST_URI']); 
    }

    public function dispatch_routes(Starch_Dispatcher &$dispatcher)
    {
        $found_route = $this->findRoute($this->getCurrentURI());
        if( FALSE === $found_route ){
            Error::show('404');
        }else{
            try {
                $dispatcher->dispatch( $found_route );
            } catch ( badClassNameException $e ) {
                Error::show('404', $e);
            } catch ( classFileNotFoundException $e ) {
                Error::show('404', $e);
            } catch ( classNameNotFoundException $e ) {
                Error::show('404', $e);
            } catch ( classMethodNotFoundException $e ) {
                Error::show('404', $e);
            } catch ( classNotSpecifiedException $e ) {
                Error::show('404', $e);
            } catch ( methodNotSpecifiedException $e ) {
                Error::show('404', $e);
            }
        }   
    }     

}

class Starch_Dispatcher extends Starch_PHP_Dispatcher
{

}

class Starch_Route extends Starch_PHP_Route
{


}
