<?php
require_once('../../config.php');
if(isset($_POST['eventID'])){
    $response=array('alert'=>'',  'message'=>'');
    $eventID=$_POST['eventID'];
    $firstname=$_POST['firstname'];
    $othernames=$_POST['other_names'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $organisation=$_POST['organisation'];
    $location=$_POST['location'];
    if(!empty($eventID)){
        $sql=DB::getInstance()->insert('tbl_events_registration', array('event_id'=>$eventID, 'firstname'=>$firstname, 'phone'=>$phone, 'othernames'=>$othernames, 'email'=>$email,  'organisation'=>$organisation, 'location'=>$location));// todo:use session  
    }
    if(isset($sql)){
     $response['alert']='alert-success';
     $response['message']='Successfully Registered. Thank you';
    }else{
        $response['alert']='alert-danger';
     $response['message']='Sorry. Something went wrong';
    }
    echo json_encode($response);
}