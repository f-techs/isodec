<?php
require_once('../../config.php');

if(isset($_POST['action'])){
    $response=array('error'=>1, 'status'=>'', 'message'=>'');
    //$blogCode=$_POST['blog_code'];
    $action=$_POST['action'];
    $facebook=$_POST['facebook'];
    $twitter=$_POST['twitter'];
    $instagram=$_POST['instagram'];
    $skype=$_POST['skype'];
    $linkedIn=$_POST['linkedIn'];
    $youtbube=$_POST['youtube'];
    $ID=$_POST['ID'];
    $date=date("Y-m-d");
    //set img name if already exist
    if(!empty($_POST['entry_code'])){
      $code=$entryCode;
    }else{
        $code=random_code(15);
    }
   if($action=='Add'){
    $sql=DB::getInstance()->insert('tbl_social_media', array('entry_code'=>$code, 'facebook_url'=>$facebook, 'twitter_url'=>$twitter, 'skype_url'=>$skype, 'linkedIn_url'=>$linkedIn, 'instagram_url'=>$instagram, 'youtube_url'=>$youtbube, 'created_date'=>$date, 'created_by'=>$_SESSION['userID'], 'modified_date'=>$date, 'modified_by'=>$_SESSION['userID']));
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
   }elseif($action=='Update'){
    $sql=DB::getInstance()->update('tbl_social_media', $ID, 'social_media_id', array('entry_code'=>$code, 'facebook_url'=>$facebook, 'twitter_url'=>$twitter, 'skype_url'=>$skype, 'linkedIn_url'=>$linkedIn, 'instagram_url'=>$instagram, 'youtube_url'=>$youtbube, 'created_date'=>$date, 'created_by'=>$_SESSION['userID'], 'modified_date'=>$date, 'modified_by'=>$_SESSION['userID']));
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
   }
   
    // echo $imgname;
    //var_dump($_FILES['img_name']);
}

