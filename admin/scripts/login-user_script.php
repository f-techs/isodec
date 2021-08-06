<?php
require_once('../../config.php');
if(isset($_POST['email']) && isset($_POST['userpassword'])){
    $response=array('status'=>'', 'class'=>'', 'message'=>'', 'userID'=>'', 'username'=>'');
    $email=trim($_POST['email']);
    $userpassword=trim($_POST['userpassword']);
    $sql=DB::getInstance()->get('tbl_users', array('user_email', '=', $email));
    $count=$sql->count();
    if($count > 0){
        $r=$sql->results();
        foreach($r as $data){
            if(password_verify($userpassword, $data->user_password)){
                if($userpassword=='admin@123'){
                    $response['status']='default';
                    $response['userID']=$data->user_id;
                    $response['username']=$data->firstname.' '.$data->othernames ;
                  }else{
                      $response['status']='changed';
                      $_SESSION['userID']=$data->user_id;
                      $_SESSION['name']=$data->firstname;
                      $_SESSION['email']=$data->user_email;
                      $_SESSION['loginTime']=time();
                  }
            }else{
                $response['status']='wrong';
                $response['class']='error';
                $response['message']='Wrong Password';
            }
            }
    }else{
      $response['status']='fail';
      $response['message']='Wrong email or does not exist';
      $response['class']='error';
    }
    echo json_encode($response);
  

}