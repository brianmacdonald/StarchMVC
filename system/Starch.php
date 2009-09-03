<?php
/*StarchMVC
 *
 *
 *
 */

require_once BASE_DIR.'/system/config.php';

require_once BASE_DIR.'/system/App.php';
require_once BASE_DIR.'/system/Starch/Router.php';
require_once BASE_DIR.'/system/Starch/Template.php';

$router = new Starch_Router;

//Create a new instance of Dispatcher (again, you would probably utilize a
// factory or container)
$dispatcher = new Starch_Dispatcher;
$dispatcher->setSuffix('_default');
$dispatcher->setClassPath(BASE_DIR.'/apps/hello_world/controllers/');

//Set up a 'catch all' default route and add it to the Router.
//You may want to set up an external file, define your routes there, and
// and include that file in place of this code block.
$default_route = new Route('/starch/');
$default_route->setMapClass( 'hello_world' ); //matches any :class
$default_route->setMapMethod( 'welcome' );
$router->addRoute( 'default', $default_route );

//Find the Route for your url
$url            = urldecode($_SERVER['REQUEST_URI']);
$found_route    = $router->findRoute($url);

//Dispatch the Route
if( FALSE === $found_route )
{
    echo '404';
}
else
{
    //Note: you would likely use some other http status codes depending
    // on the specific Exception thrown.
    try {
        $dispatcher->dispatch( $found_route );
    } catch ( badClassNameException $e ) {
        PageError::show('404', $url);
    } catch ( classFileNotFoundException $e ) {
        echo 'class file not found'.$e;
    } catch ( classNameNotFoundException $e ) {
        PageError::show('404', $url);
    } catch ( classMethodNotFoundException $e ) {
        PageError::show('404', $url);
    } catch ( classNotSpecifiedException $e ) {
        PageError::show('404', $url);
    } catch ( methodNotSpecifiedException $e ) {
        PageError::show('404', $url);
    }
}


/* Abstraction to allow config class to be dynamic.
 *
 */
class Starch
{
    /* Starts the framework
     * @param Starch_Config
     * @return null;
     */
    public function Starch(Starch_Config $config)
    {
        $this->_loadApps();
        return null;
    }

    private function _loadApps()
    {
        if(count($this->config->apps)){
            foreach($this->config->apps as $app){ 
                require_once BASE_DIR.'/apps/'.$app.'/'.$app.'.php';
            }
        }
    }

}
