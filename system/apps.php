<?php

class Apps{

    public function Apps(Config $config)
    {
        $this->config = $config;
        return null;
    }

    public function loadApps()
    {
        foreach($this->config->apps as $app){ 
            require_once BASE_DIR.'/apps/'.$app.'/index.php';
        }
    }

}
