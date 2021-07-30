<?php
require_once('../../config.php');

if($_FILES['img_file'] && isset($_POST['mission_content']) && isset($_POST['img_caption'])){
    $response=array('error'=>1, 'status'=>'', 'message'=>'');
    $details=$_POST['mission_content'];
    $imgcaption=$_POST['img_caption'];
    $date=date("Y-m-d");

    //set img name if already exist
    if($_FILES['img_file']['error']==4){
        $imgname=$missionImg;
    }else{
        $Img = $_FILES['img_file']['name'];
        $image_ext =strtolower(pathinfo($Img, PATHINFO_EXTENSION));
        $imgname = uniqid(). '.' . $image_ext;
        $image_old_location = $_FILES['img_file']['tmp_name'];
        $image_new_location = APPROOT.'/assets/admin/media/uploadImages/'. $imgname;
        $img_upload= move_uploaded_file($image_old_location, $image_new_location);
}
    if(!empty($missionEntry)){
       // $sql=DB::getInstance()->insert("call pro_insertAbout(1, '$imgname', '$imgcaption', '$details', 1)");// todo:use session
       $sql=DB::getInstance()->update('tbl_about', 1 ,'about_type', array('img'=>$imgname, 'img_description'=>$imgcaption, 'details'=>$details, 'modified_by'=>1, 'modified_date'=>$date));
    }else{
        $sql=DB::getInstance()->insert('tbl_about', array('about_type'=>1, 'img'=>$imgname, 'img_description'=>$imgcaption, 'details'=>$details,  'created_by'=>1, 'created_date'=>$date, 'modified_by'=>1, 'modified_date'=>$date));// todo:use session  
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

