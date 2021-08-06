<?php
require_once('../../config.php');
if(isset($_POST['userID']) && isset($_POST['changePass'])){
    $response=array('status'=>'');
    $userID=$_POST['userID'];
    $userPassword=password_hash($_POST['changePass'], PASSWORD_DEFAULT);
    $sql=DB::getInstance()->update('tbl_users', $userID, 'user_id',  array('user_password'=>$userPassword));
    if(isset($sql)){
        $response['status']='success';
    }else{
        $response['status']='fail';  
    }
    echo json_encode($response);
}