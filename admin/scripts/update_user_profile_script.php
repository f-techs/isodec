<?php
require_once('../../config.php');
if(isset($_POST['action'])){
    $response=array('error'=>1, 'status'=>'', 'message'=>'');
    $firstname=trim($_POST['first_name']);
    $othernames=trim($_POST['other_names']);
    $phone=trim($_POST['phone']);
    $email=trim($_POST['email']);
    $sql=DB::getInstance()->update('tbl_users', $_SESSION['userID'], 'user_id',  array('firstname'=>$firstname, 'othernames'=>$othernames, 'user_email'=>$email, 'phone'=>$phone));
    if(isset($sql)){
        $response['status']='success';
        $response['message']='Profile Updated successfully';
    }else{
        $response['status']='error';
        $response['message']='Oops something went wrong';
    }
    echo json_encode($response);
}