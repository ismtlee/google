<?php
define('APP_PATH', dirname(__FILE__));
define('LIB_PATH', dirname(dirname(__FILE__)));
define('CONFIG_INI', APP_PATH . '/conf/application.ini');

set_include_path(LIB_PATH . "/google-api-php-client/src" . PATH_SEPARATOR .
  APP_PATH . "/library" . PATH_SEPARATOR .
  get_include_path());

#require_once 'templates/base.php';
require_once 'Google/autoload.php';


spl_autoload_register(function($class){
   #require_once('examples/'.$class.'.php');
   require_once($class.'.php');
});
