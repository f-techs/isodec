<?php
function get_client_ip() {
    $ipaddress = '';
    if (getenv('HTTP_CLIENT_IP'))
        $ipaddress = getenv('HTTP_CLIENT_IP');
    else if(getenv('HTTP_X_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
    else if(getenv('HTTP_X_FORWARDED'))
        $ipaddress = getenv('HTTP_X_FORWARDED');
    else if(getenv('HTTP_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_FORWARDED_FOR');
    else if(getenv('HTTP_FORWARDED'))
       $ipaddress = getenv('HTTP_FORWARDED');
    else if(getenv('REMOTE_ADDR'))
        $ipaddress = getenv('REMOTE_ADDR');
    else
        $ipaddress = 'UNKNOWN';
    return $ipaddress;
}
$userIP=get_client_ip();
/*
$pageName=basename($_SERVER['PHP_SELF']);
$ch = curl_init('http://ipwhois.app/json/'.$userIP);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$json = curl_exec($ch);
curl_close($ch);

// Decode JSON response
$apiData = json_decode($json, true);
if(!empty($apiData['ip']) &&  $apiData['success']=='true'){
   $country= $apiData['country'];
   $countryCode=$apiData['country_code'];
   $countryFlag= $apiData['country_flag'];
}else{
   $country= 'unknown';
   $countryCode='unknown';
   $countryFlag= 'unknown';
}

*/
$chkIP=DB::getInstance()->select_query("SELECT * FROM tbl_visitors WHERE userip='$userIP'");
$row=$chkIP->count();
if($row < 1){
   $insertIP=DB::getInstance()->insert('tbl_visitors', array('userip'=>$userIP));
}else{
  
}

$sqlVisitors=DB::getInstance()->select_query("SELECT * FROM tbl_visitors");
$totalVisitors=$sqlVisitors->count();
