<?php
require_once('../../config.php');

if($_FILES['img_file'] && isset($_POST['details']) && isset($_POST['img_caption'])){
    $response=array('error'=>1, 'status'=>'', 'message'=>'');
    $details=$_POST['details'];
    $imgcaption=$_POST['img_caption'];
    //set img name if already exist
    
    if($_FILES['img_file']['error']==4){
        $imgname=$econJusticeImg;
    }else{
        $Img = $_FILES['img_file']['name'];
        $image_ext =strtolower(pathinfo($Img, PATHINFO_EXTENSION));
        $imgname = uniqid(). '.' . $image_ext;
        $image_old_location = $_FILES['img_file']['tmp_name'];
        $image_new_location = APPROOT.'/assets/admin/media/uploads/'. $imgname;
        $img_upload= move_uploaded_file($image_old_location, $image_new_location);
}
    if(isset($img_upload) || isset($imgname)){
        $sql=DB::getInstance()->gen_query("call pro_insertProgramme(3, '$imgname', '$imgcaption', '$details', 1)");// todo:use session
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

