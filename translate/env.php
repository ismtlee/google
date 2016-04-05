<?php
define('ROOT_PATH',dirname(dirname(__FILE__)));
#define('CONFIG_INI', ROOT_PATH . '/conf/application.ini');

#set_include_path(ROOT_PATH . "/application/models" . PATH_SEPARATOR . ROOT_PATH . "/application/library" . PATH_SEPARATOR . get_include_path());

#spl_autoload_register(function($class){
#   if(substr($class, -5) ==  'Model') {
#      $class = substr($class, 0, -5);
#   } 
#   $file = $class.'.php';
#   require_once $file;
#});

