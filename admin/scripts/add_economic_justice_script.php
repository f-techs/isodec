<?php
require_once('../../config.php');

if(isset($_POST['action'])){
    $response=array('error'=>1, 'status'=>'', 'message'=>'');
    $action=$_POST['action'];
    $details=$_POST['details'];
    $imgcaption=$_POST['img_caption'];
    $title=$_POST['title'];
    $ID=(int) $_POST['ID'];
    //set img name if already exist
    
    if($_FILES['img_file']['error']==4){
        $imgname=$_POST['imgName'];
    }else{
        $Img = $_FILES['img_file']['name'];
        $image_ext =strtolower(pathinfo($Img, PATHINFO_EXTENSION));
        $imgname = uniqid(). '.' . $image_ext;
        $image_old_location = $_FILES['img_file']['tmp_name'];
        $image_new_location = APPROOT.'/assets/admin/media/uploads/economic_justice/'. $imgname;
        $img_upload= move_uploaded_file($image_old_location, $image_new_location);
}
    //if(isset($img_upload) || isset($imgname)){
     //   $sql=DB::getInstance()->gen_query("call pro_insertProgramme(1, '$imgname', '$imgcaption', '$details', 1)");// todo:use session
  //  }
  if($action=='Add'){
    $sql=DB::getInstance()->insert('tbl_economic_justice', array('title'=>$title, 'img'=>$imgname, 'img_description'=>$imgcaption, 'details'=>$details,  'created_by'=>$_SESSION['userID'], 'modified_by'=>$_SESSION['userID']));// todo:use session    
  }elseif($action=='Update'){
    $sql=DB::getInstance()->update('tbl_economic_justice', $ID, 'economic_justice_id', array('title'=>$title, 'img'=>$imgname, 'img_description'=>$imgcaption, 'details'=>$details, 'modified_by'=>$_SESSION['userID'])); 
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

