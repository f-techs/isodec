<?php
require_once('../../config.php');
$response=array('status'=>'', 'class'=>'', 'message'=>'');
if(isset($_POST['oldPass'])){
    $OldPass=$_POST['oldPass'];
    $Password=$_POST['newPass'];
    $sql=DB::getInstance()->get('tbl_users', array('user_id', '=', $_SESSION['userID']));
    $count=$sql->count();
if($count > 0){
    $r=$sql->results();
    foreach($r as $data){
    if(password_verify($OldPass, $data->user_password)){
        $userpassword=password_hash($Password, PASSWORD_DEFAULT);
        $sql=DB::getInstance()->update('tbl_users', $_SESSION['userID'], 'user_id',  array('user_password'=>$userPassword));
        $response['message']='Password Updated successfully';
        $response['class']='success';
        $response['status']='success';
    }else{
        $response['message']='Wrong Old Password';
        $response['class']='info';
        $response['status']='fail';
    }
    echo json_encode($response);
}
}

}

