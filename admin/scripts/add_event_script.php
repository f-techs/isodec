<?php
require_once('../../config.php');

if(isset($_FILES['img_file']) && isset($_POST['event_content'])  && isset($_POST['event_title'])){
    $response=array('error'=>1, 'status'=>'', 'message'=>'');
    //$eventCode=$_POST['event_code'];
    $action=$_POST['action'];
    $title=$_POST['event_title'];
    $details=$_POST['event_content'];
    $eventType=$_POST['event_type'];
    $eventDate=$_POST['event_date'];
    $eventTime=$_POST['event_time'];
    $location=$_POST['location'];
    $date=date("Y-m-d");
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
        $image_new_location = APPROOT.'/assets/admin/media/uploads/events/'. $imgname;
        $img_upload= move_uploaded_file($image_old_location, $image_new_location);
}
    if($action=='Add'){
       // $sql=DB::getInstance()->gen_query("call pro_insertEvents('$code', '$details', '$imgname', '$eventType', '$title', '$webinarUrl', '$eventDate', '$eventTime', 1)");// todo:use session
       $sql=DB::getInstance()->insert('tbl_events', array('event_type'=>$eventType, 'event_code'=>$code, 'event_title'=>$title, 'event_details'=>$details, 'event_img'=>$imgname, 'webinar_url'=>$webinarUrl, 'location'=>$location, 'event_date'=>$eventDate, 'event_time'=>$eventTime, 'created_by'=>$_SESSION['userID'], 'created_date'=>$date, 'modified_date'=>$date, 'modified_by'=>$_SESSION['userID']));
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
        $ID=$_POST['ID'];
        $sql=DB::getInstance()->update('tbl_events', $ID, 'event_id', array('event_type'=>$eventType, 'event_code'=>$code, 'event_title'=>$title, 'event_details'=>$details, 'event_img'=>$imgname, 'webinar_url'=>$webinarUrl, 'location'=>$location, 'event_date'=>$eventDate, 'event_time'=>$eventTime, 'modified_date'=>$date, 'modified_by'=>$_SESSION['userID']));
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
    }

