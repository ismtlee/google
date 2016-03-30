<?php
require_once 'env.php';

$client = new Google_Client();
#$client->addScope('https://www.googleapis.com/auth/adsense.readonly');
$client->setScopes(array('https://www.googleapis.com/auth/androidpublisher'));
$client->setAccessType('offline');

$client->setAuthConfigFile(APP_PATH.'/client_secrets.json');
$refresh_token = $accounts_info['tokens'];
$client->refreshToken($refresh_token);
$access_token = $client->getAccessToken();
$client->setAccessToken($access_token);

$service = new Google_Service_AdSense($client);


