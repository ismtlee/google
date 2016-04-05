<?php
#require_once 'env_tumblr.php';
#define('ENV_PATH', dirname(dirname(__FILE__)));
#require_once ENV_PATH.'/env.php';
require_once 'vendor/autoload.php';

use Stichoza\GoogleTranslate\TranslateClient;
$tr = new TranslateClient();
$txt = "Features
    ★One impressive wallpaper every day. All the wallpapers are carefully picked up by designers daily. 
    ★Well-Designed Wallpaper Themes: We provided numerous high resolution wallpaper themes
    ★Prevent your SMS, Contacts, Gallery, or any other apps from checking by others without your permit.";
echo $tr->setSource('en-US')->setTarget('zh-CN')->translate($txt);
echo "\n";
