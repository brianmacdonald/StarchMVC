<?php 

/* Url router class
 *
 *
 */
class Router
{
    /**
     * @return null
     */
    public function Router(Config $config)
    {

       $this->config = $config;

       $base_url = str_replace('/', '', $config->base_url);
       $full_requestURI = explode('/', $_SERVER['REQUEST_URI']);
       $base_url_key = array_search($base_url, $full_requestURI);

       if($base_url_key){
            unset($full_requestURI[$base_url_key]); 
       }
        
       $this->requestURI = $full_requestURI; 
       return null;
    }

    /**
     * @param Config
     * @return array
     */
    public function parseAppsUrls(Config $config){
        $urls = array();
        foreach($config->apps as $app){
            foreach(loadAppUrls($app) as $url){
                $urls[] = $url;
            }
        }
        return $urls;
    }

    /**
     * @param string $app
     * @return 
     */
    public function loadAppUrl($app){
        $urls = array();
        eval(sprintf('$url_obj = new %s_urls;', $app));
        if($url_obj){
             $urls = $url_obj->getUrls();
        }
        return $urls; 
    }

    /**
     * @return string
     */
    public function getCurrentUrl()
    {
        return $_SERVER['REQUEST_URI']; 
    }

    /**
     * @return array
     */
    public function getCurrentUrlArray()
    {
        return $this->requestURI;
    }


}
