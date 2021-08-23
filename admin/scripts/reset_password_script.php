<?php
require_once('../../config.php');
$response=array('status'=>'', 'class'=>'', 'message'=>'');
if(isset($_POST['email'])){
    $email=$_POST['email'];
    $Password=$_POST['newpassword'];
    $sql=DB::getInstance()->select_query("SELECT * FROM tbl_users WHERE user_email='$email'");
    $count=$sql->count();
if($count > 0){
    $r=$sql->results();
    foreach($r as $data){
        $userpassword=password_hash($Password, PASSWORD_DEFAULT);
        $sql=DB::getInstance()->gen_query("UPDATE tbl_users set user_password='$userpassword'");
        $response['message']='Password Updated successfully. Go back to login page';
        $response['class']='success';
        $response['status']='success';
}
}else{
    $response['message']='Email not found';
    $response['class']='success';
    $response['status']='fail'; 
   
}
echo json_encode($response);
}

