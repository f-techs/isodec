<?php
require_once('../../config.php');

if(isset($_FILES['img_file']) && isset($_POST['blog_content']) && isset($_POST['img_caption']) && isset($_POST['blog_title'])){
    $response=array('error'=>1, 'status'=>'', 'message'=>'');
    //$blogCode=$_POST['blog_code'];
    $title=$_POST['blog_title'];
    $details=$_POST['blog_content'];
    $imgcaption=$_POST['img_caption'];
    //set img name if already exist
    if(isset($_POST['blog_code']) && !empty($_POST['blog_code'])){
      $code=$blogCode;
    }else{
        $code=random_code(10);
    }
    if($_FILES['img_file']['error']==4){
        $imgname=$blogImg;
    }else{
        $Img = $_FILES['img_file']['name'];
        $image_ext =strtolower(pathinfo($Img, PATHINFO_EXTENSION));
        $imgname = uniqid(). '.' . $image_ext;
        $image_old_location = $_FILES['img_file']['tmp_name'];
        $image_new_location = APPROOT.'/assets/admin/media/uploadImages/blogs/'. $imgname;
        $img_upload= move_uploaded_file($image_old_location, $image_new_location);
}
    if(isset($img_upload) || isset($imgname)){
        $sql=DB::getInstance()->gen_query("call pro_insertBlog('$code', '$details', '$imgname', '$imgcaption', '$title', 1)");// todo:use session
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

