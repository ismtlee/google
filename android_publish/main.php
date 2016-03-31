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

$service = new Google_Service_AndroidPublisher($client); 

$edits = $service->edits;
$pkgname = 'com.iendlessrun.tombrushtempleescape';

$editId = '08558593688518203716';
$edit = $edits->get($pkgname, $editId);

#print_r($edit);
return;


$appEdit = new Google_Service_AndroidPublisher_AppEdit();
#$edit = $edits->insert($pkgname, $appEdit);
$editId = '08558593688518203716';
$edit = $edits->get($pkgname, $editId);
$edits_apklistings = $service->edits_apklistings;
$apkVersionCode = 4;
#print_r($edits_apklistings->get($pkgname, $editId, $apkVersionCode, 'en-US'));

$edits_listings = $service->edits_listings;
$listings = $edits_listings->get($pkgname, $editId, $language);
$fullDesc = $listings->getFullDescription();
print_r($fullDesc);
//$edits_listings);
/*
$listings = $service->listings;
print_r($listings->getFullDescription());
 */



