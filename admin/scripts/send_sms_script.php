<?php

include_once (dirname(dirname(dirname(__FILE__))).'/Zenoph/Notify/AutoLoader.php');
use Zenoph\Notify\Enums\AuthModel;
use Zenoph\Notify\Request\Request;
use Zenoph\Notify\Request\SMSRequest;
use Zenoph\Notify\Enums\TextMessageType;
$response=[];
$contacts = [];
$detials  = '';
if(isset($_POST['send'])){
    $contacts = $_POST['contacts'];
    $detials = $_POST['message'];

}
//var_dump($contacts);


try {
    Request::setHost('smsonlinegh.com');

    // On a live (production) server, comment out the following call
    // or call it with value 'true' to use https connection
    Request::useSecureConnection(true);    // to use http connection when testing locally

    // initialise request
    $smsReq = new SMSRequest();
    $smsReq->setAuthModel(AuthModel::API_KEY);
    $smsReq->setAuthApiKey('6c12dd86361ccc43c37deda025414c7532079130deba7b6db432e242dceeef9a');
    // data for two clients

    if($contacts){
        // set message properties
        $smsReq->setMessage($detials);
        $smsReq->setSender('ISODEC');
        $smsReq->setMessageType(TextMessageType::TEXT);

        // add phone numbers in an array
        $addedCount = $smsReq->addDestinationsFromCollection($contacts);

        // submit must be after the loop
        $msgResp = $smsReq->submit();
        if($msgResp){
            $response['status']='success';
        }else{
            $response['status']='fail'; 
        }
       // echo json_encode(['success' => true]);
       echo json_encode($response);
    }
}

catch (Exception $ex) {
    $error = "Error: %s.". $ex->getMessage();
    $response['status']='fail';
    $response['err-msg']=$error;
    //echo json_encode(['success' => false, 'error' => $error ]);
//    die (printf());
      echo json_encode($response);
}
