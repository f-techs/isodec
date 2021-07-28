<?php
require_once('../../config.php');

if(isset($_POST['action'])){
    $response=array('error'=>1, 'status'=>'', 'message'=>'');
    //$blogCode=$_POST['blog_code'];
    $facebook=$_POST['facebook'];
    $twitter=$_POST['twitter'];
    $instagram=$_POST['instagram'];
    $skype=$_POST['skype'];
    $linkedIn=$_POST['linkedIn'];
    //set img name if already exist
    if(!empty($_POST['entry_code'])){
      $code=$entryCode;
    }else{
        $code=random_code(15);
    }
   
    
        $sql=DB::getInstance()->gen_query("call pro_insertSocialMedia('$code', '$facebook', '$twitter', '$skype', '$linkedIn', '$instagram', 1)");// todo:use session
    
    if(isset($sql)){
        //$response['error']=0;
        $response['status']='success';
        $response['message']='Details saved successfully';
    }else{
       // $response['error']=1;
        $response['status']='error';
        $response['message']='Something went wrong. Failed to save details';
    }
     echo json_encode($response);
    // echo $imgname;
    //var_dump($_FILES['img_name']);
}

