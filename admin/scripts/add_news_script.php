<?php
require_once('../../config.php');
if(isset($_POST['action'])){
    $response=array('error'=>1, 'status'=>'', 'message'=>'');
    $title=$_POST['news_title'];
    $details=$_POST['news_content'];
    $source=$_POST['source'];
    $imgcaption=$_POST['img_caption'];
    $date=date("Y-m-d");
    if(isset($_POST['news_code']) && !empty($_POST['news_code'])){
      $code=$newsCode;
    }else{
        $code=random_code(10);
    }
    if($_FILES['img_file']['error']==4){
        if(!empty($newsImg)){
            $imgname=$newsImg;
        }else{
            $imgname='';
        }
    }else{
        $Img = $_FILES['img_file']['name'];
        $image_ext =strtolower(pathinfo($Img, PATHINFO_EXTENSION));
        $imgname = uniqid(). '.' . $image_ext;
        $image_old_location = $_FILES['img_file']['tmp_name'];
        $image_new_location = APPROOT.'/assets/admin/media/uploads/news/'. $imgname;
        $img_upload= move_uploaded_file($image_old_location, $image_new_location);
}
    if($_POST['action']=='add'){
        $sql=DB::getInstance()->insert('tbl_news', array('news_code'=>$code, 'news_details'=>$details, 'news_title'=>$title, 'news_img'=>$imgname, 'news_source'=>$source, 'img_description'=>$imgcaption, 'created_by'=>$_SESSION['userID'], 'created_date'=>$date, 'modified_by'=>1, 'modified_date'=>$date));
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
        $ID=$_POST['news_id'];
        $sql=DB::getInstance()->update('tbl_news', $ID, 'news_id',  array('news_details'=>$details, 'news_title'=>$title, 'news_img'=>$imgname, 'news_source'=>$source, 'img_description'=>$imgcaption, 'modified_by'=>$_SESSION['userID'], 'modified_date'=>$date));
        if(isset($sql)){
        //$response['error']=0;
        $response['status']='success';
        $response['message']='Details updated successfully';
    }else{
       // $response['error']=1;
        $response['status']='error';
        $response['message']='Something went wrong. Failed to save details';
    }
    echo json_encode($response);
    }
}
