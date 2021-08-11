<?php
require_once('../../config.php');
if(isset($_POST['action'])){
    $response=array('error'=>1, 'status'=>'', 'message'=>'');
    $title=$_POST['blog_title'];
    $details=$_POST['blog_content'];
    $imgcaption=$_POST['img_caption'];
    $date=date("Y-m-d");

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
        $image_new_location = APPROOT.'/assets/admin/media/uploads/blogs/'. $imgname;
        $img_upload= move_uploaded_file($image_old_location, $image_new_location);
}
     if($_POST['action']=='add'){
        //$sql=DB::getInstance()->gen_query("call pro_insertBlog('$code', '$details', '$imgname', '$imgcaption', '$title', 1)");// todo:use session
        $sql=DB::getInstance()->insert('tbl_blogs', array('blog_code'=>$code, 'blog_details'=>$details, 'blog_title'=>$title, 'blog_img'=>$imgname, 'img_description'=>$imgcaption, 'created_by'=>1, 'created_date'=>$date, 'modified_by'=>1, 'modified_date'=>$date));
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
    }elseif($_POST['action']=='update'){
        //$sql=DB::getInstance()->gen_query("call pro_insertBlog('$code', '$details', '$imgname', '$imgcaption', '$title', 1)");// todo:use session
        $ID=$_POST['blog_id'];
        $sql=DB::getInstance()->update('tbl_blogs', $ID, 'blog_id',  array('blog_details'=>$details, 'blog_title'=>$title, 'blog_img'=>$imgname, 'img_description'=>$imgcaption, 'modified_by'=>1, 'modified_date'=>$date));
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

