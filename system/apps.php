<?php

class Apps{

    public function Apps(Starch_Config $config)
    {
        $this->config = $config;

        //load apps from config
        $this->_loadApps();

        return null;
    }

    private function _loadApps()
    {
        foreach($this->config->apps as $app){ 
            require_once BASE_DIR.'/apps/'.$app.'/'.$app.'.php';
        }
    }

}
