<?php

require_once(BASE_DIR.'/system/Starch/Config.php');

class Example_Config extends Starch_Config
{ 
    var $site_name = 'Starch';
    var $database_type = 'mysql';
    var $database_server = 'localhost';
    var $database_name = '';
    var $database_user = '';
    var $database_password = '';

    var $apps = array(
        'hello_world'
    );

    var $urls = array(
            array('/starch/',
                  '/apps/hello_world/controllers/hello_world',
                  'hello_world',
                  'index',
                  ''
                  ),
         );





}

