<?php
require_once 'env.php';

$client = new Google_Client();
#$client->addScope('https://www.googleapis.com/auth/adsense.readonly');
#$client->setScopes(array('https://www.googleapis.com/auth/androidpublisher'));
$client->setAccessType('offline');

$scopes = array('https://www.googleapis.com/auth/androidpublisher');
$cred = $client->loadServiceAccountJson(APP_PATH.'/oauth2service.json', $scopes);
$client->setAssertionCredentials($cred);
#$client->setAuthConfigFile(APP_PATH.'/oauth2service.json');
#$refresh_token = $accounts_info['tokens'];
#$client->refreshToken($refresh_token);
#$access_token = $client->getAccessToken();
#$client->setAccessToken($access_token);

#$service = new Google_Service_AdSense($client);
$service = new Google_Service_AndroidPublisher($client); 

#$service->edits->get('com.iendlessrun.tombrushtempleescape', 2);
$edits = $service->edits;
$pkgname = 'com.iendlessrun.tombrushtempleescape';
$appEdit = new Google_Service_AndroidPublisher_AppEdit();
#$edit = $edits->insert($pkgname, $appEdit);
editId = '08558593688518203716';
$edit = $edits->get($pkgname, $editId);
$edits_apklistings = $service->edits_apklistings;
print_r($edits_apklistings->get($pkgname, $editId, 1, 'en-US'));


