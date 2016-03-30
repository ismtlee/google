<?php
require_once 'env.php';


$client = new Google_Client();
$client->addScope('https://www.googleapis.com/auth/adsense.readonly');
$client->setAccessType('offline');

$client->setAuthConfigFile(APP_PATH.'/client_secrets.json');

$today = date("Y-m-d");
$start_date = $today;
$end_date = $today;
if(isset($argv[1]))  {
  $start_date = $argv[1];
} 

if(isset($argv[2])) {
  $end_date = $argv[2];
}

function all_tokens() {
       $sql = "select pub_id, tokens from accounts where enable = 1 and type = 2";
        $conn = JoyDb::getInstance();
        $stmt = $conn->prepare($sql);
	$result = null;
        if($stmt->execute()) {
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC); //fetchAll
        } else {
            JoyDb::exception($stmt);
        }
	return $result;
            
} 


function gen_report($client, $accounts_info, $start_date, $end_date) {
 try {
  #$refresh_token = "1/70ALxwKQWXHltiqHiDCpLZW8R742A7xdT3piUGvZWFE";
  $refresh_token = $accounts_info['tokens'];
  $client->refreshToken($refresh_token);
  $access_token = $client->getAccessToken();
  $client->setAccessToken($access_token);

  $service = new Google_Service_AdSense($client);

  $opt_params = array(
     'useTimezoneReporting' => true,
     'currency' => 'USD',
     'metric' => array('earnings', 
                       'clicks', 
                       'individual_ad_impressions_ctr',
		       'individual_ad_impressions_rpm',
                       'individual_ad_impressions',
                       'page_views_ctr',
                       'page_views_rpm',
                       'page_views'
	           	), 
                       'dimension' => array('date', 'ad_unit_name', 'AD_CLIENT_ID')
                       #'dimension' => array('date', 'ad_unit_name' )
        );

        //$start_date = '2015-10-10';
        //$end_date = '2015-10-12';
        $reports = $service->reports->generate($start_date, $end_date, $opt_params);

        $rows = $reports['rows'];
       # print_r($rows);
        save_report($rows, $accounts_info['pub_id']);
 } catch (Exception $e) {
  error_log($e);
 }
}

function save_report($rp, $pub_id) {
    if(!$rp || !is_array($rp)||count($rp) <=0) {
	print_r("The account of $pub_id has no reports.\n");
	return;
    }
    $conn = JoyDb::getInstance();
    foreach ($rp as $e) {
      $sql = "replace into rp_adsense(ad_unit_name, ad_client_id, 
  clicks, earnings, rp_date, individual_ad_impressions_ctr, individual_ad_impressions_rpm,
  individual_ad_impressions, page_views_ctr,page_views_rpm, page_views) values(?, ?, ?, ?, ?,?,?,?,?,?,?)";
      $stmt = $conn->prepare($sql);
      $params = array($e[1], $e[2], $e[4], $e[3], $e[0], $e[5], $e[6], $e[7], $e[8], $e[9], $e[10]);
      if($stmt->execute($params)) {
    //    echo $conn->lastInsertId();//如果想取自增长id
      } else {
        JoyDb::exception($stmt);
      }
    } 
}


$all_tokens = all_tokens();
foreach($all_tokens as $e) {
  gen_report($client, $e, $start_date, $end_date);
}

