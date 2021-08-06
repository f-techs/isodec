<?php
require_once('../../config.php');
if(isset($_POST['action'])){
    $response=array('error'=>1, 'status'=>'', 'message'=>'');
    $action=$_POST['action'];
    $firstname=$_POST['first_name'];
    $othernames=$_POST['other_names'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $ID=$_POST['id'];
    if($action=='Add'){
    $userpassword=password_hash('admin@123', PASSWORD_DEFAULT);
    $sql=DB::getInstance()->insert('tbl_users', array('firstname'=>$firstname, 'othernames'=>$othernames, 'user_email'=>$email, 'user_password'=>$userpassword, 'phone'=>$phone, 'created_by'=>1, 'modified_by'=>1));// todo:use session  
    if(isset($sql)){
        $response['status']='success';
        $response['message']='Details saved successfully';
    }else{
        $response['status']='error';
        $response['message']='Something went wrong';
    }
    echo json_encode($response);
    }elseif($action=='Update'){
        $sql=DB::getInstance()->update('tbl_users', $ID, 'user_id',  array('firstname'=>$firstname, 'othernames'=>$othernames, 'user_email'=>$email,  'phone'=>$phone, 'modified_by'=>1));
        if(isset($sql)){
            $response['status']='success';
            $response['message']='Details saved successfully';
        }else{
            $response['status']='error';
            $response['message']='Something went wrong';
        }
        echo json_encode($response);
    }
    
}