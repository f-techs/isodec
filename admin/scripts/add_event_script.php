<?php
require_once('../../config.php');

if(isset($_FILES['img_file']) && isset($_POST['event_content'])  && isset($_POST['event_title'])){
    $response=array('error'=>1, 'status'=>'', 'message'=>'');
    //$eventCode=$_POST['event_code'];
    $title=$_POST['event_title'];
    $details=$_POST['event_content'];
    $eventType=$_POST['event_type'];
    $eventDate=$_POST['event_date'];
    $eventTime=$_POST['event_time'];
    //set img name if already exist
    if(isset($_POST['event_code']) && !empty($_POST['event_code'])){
      $code=$eventCode;
    }else{
        $code=random_code(20);
    }
    if($eventType==2){
      $webinarUrl=$_POST['webinar_url'];
    }else{
        $webinarUrl='';
    }
    if($_FILES['img_file']['error']==4){
        $imgname=$eventImg;
    }else{
        $Img = $_FILES['img_file']['name'];
        $image_ext =strtolower(pathinfo($Img, PATHINFO_EXTENSION));
        $imgname = random_code(20). '.' . $image_ext;
        $image_old_location = $_FILES['img_file']['tmp_name'];
        $image_new_location = APPROOT.'/assets/admin/media/uploadImages/events/'. $imgname;
        $img_upload= move_uploaded_file($image_old_location, $image_new_location);
}
    if(isset($img_upload) || isset($imgname)){
        $sql=DB::getInstance()->gen_query("call pro_insertEvents('$code', '$details', '$imgname', '$eventType', '$title', '$webinarUrl', '$eventDate', '$eventTime', 1)");// todo:use session
    }
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

