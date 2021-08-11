<?php
require_once('../../config.php');
if(isset($_POST['action'])){
    $action=$_POST['action'];
    if($action=='Add'){
    if($_FILES['img_file'] && isset($_POST['post_content']) && isset($_POST['img_caption']) && isset($_POST['post_title'])){
        $response=array('error'=>1, 'status'=>'', 'message'=>'');
        $serviceType=$_POST['service_type'];
        $postTitle=$_POST['post_title'];
        $details=$_POST['post_content'];
        $imgcaption=$_POST['img_caption'];
        $code=random_code(10);
        //set img name if already exist
            $Img = $_FILES['img_file']['name'];
            $image_ext =strtolower(pathinfo($Img, PATHINFO_EXTENSION));
            $imgname = uniqid(). '.' . $image_ext;
            $image_old_location = $_FILES['img_file']['tmp_name'];
            $image_new_location = APPROOT.'/assets/admin/media/uploads/services/'. $imgname;
            $img_upload= move_uploaded_file($image_old_location, $image_new_location);
    
        if(isset($img_upload) || isset($imgname)){
            $sql=DB::getInstance()->gen_query("call pro_insertEssentials('$serviceType', '$postTitle', '$code', '$details', '$imgname', '$imgcaption', 1)");// todo:use session
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
}elseif($action=='Update'){
    if(isset($_POST['post_content']) && isset($_POST['img_caption']) && isset($_POST['post_title'])){
        $response=array('error'=>1, 'status'=>'', 'message'=>'');
       // $serviceType=$_POST['service_type'];
        $postTitle=$_POST['post_title'];
        $details=$_POST['post_content'];
        $imgcaption=$_POST['img_caption'];
        $postID=(int) $_POST['postID'];

        if($_FILES['img_file']['error']==4){
            $imgname=$_POST['imgName'];
        }else{
            $Img = $_FILES['img_file']['name'];
            $image_ext =strtolower(pathinfo($Img, PATHINFO_EXTENSION));
            $imgname = uniqid(). '.' . $image_ext;
            $image_old_location = $_FILES['img_file']['tmp_name'];
            $image_new_location = APPROOT.'/assets/admin/media/uploads/services/'. $imgname;
            $img_upload= move_uploaded_file($image_old_location, $image_new_location);
        }
           $sql=DB::getInstance()->gen_query("call pro_updateEssentials('$postTitle', '$postID', '$details', '$imgname', '$imgcaption', 1)"); 
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
       //echo $postID;
    }
   
}
}