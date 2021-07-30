<?php
require_once('../../config.php');
if(isset($_POST['action'])){
  $action=$_POST['action'];
  $mediaType=$_POST['media_type'];
  $date=date('Y-m-d');
if($action=='Add'){
    if($mediaType==2){
    $response=array('error'=>1, 'status'=>'', 'message'=>'');
    $media_title=$_POST['media_title'];
   // $media_type=$_POST['media_type'];
    $videoUrl=$_POST['video_url'];
    $thumbnail=$_FILES['vid_file']['name'];
    if($_FILES['vid_file']['size']!==0){
      $Img = $_FILES['vid_file']['name'];
        $image_ext =strtolower(pathinfo($Img, PATHINFO_EXTENSION));
        $thumbname = random_code(10). '.' . $image_ext;
        $image_old_location = $_FILES['vid_file']['tmp_name'];
        $image_new_location = APPROOT.'/assets/admin/media/uploadImages/video/'. $thumbname;
        $img_upload= move_uploaded_file($image_old_location, $image_new_location); 
    }
   // $sql=DB::getInstance()->gen_query("call pro_insertMedia('$media_type', '$media_title', '$videoUrl', 1)"); //todo:add user id
   $sql=DB::getInstance()->insert('tbl_media', array('media_type'=>$mediaType, 'media_title'=>$media_title, 'file_name'=>$videoUrl, 'video_thumbnail'=>$thumbname, 'created_by'=>1, 'created_date'=>$date, 'modified_by'=>1, 'modified_date'=>$date));
    if(isset($sql)){
        $response['status']='success';
        $response['message']='Video url saved successfully';
    }else{
        $response['status']='fail';
        $response['message']='Failed to saved url';
    }
   echo json_encode($response);
}elseif($mediaType==1){
    $media_title=$_POST['media_title'];
   // $media_type=$_POST['media_type'];
    $imgfile=$_FILES['img_file'];
    $medialFolder=$_POST['media_folder'];
    if(!empty($imgfile)){
        $Img = $_FILES['img_file']['name'];
        $image_ext =strtolower(pathinfo($Img, PATHINFO_EXTENSION));
        $imgname = random_code(10). '.' . $image_ext;
        $image_old_location = $_FILES['img_file']['tmp_name'];
        $image_new_location = APPROOT.'/assets/admin/media/uploadImages/picture/'. $imgname;
        $img_upload= move_uploaded_file($image_old_location, $image_new_location);
    }
    if(isset($img_upload)){
      $sql=DB::getInstance()->insert('tbl_media', array('media_type'=>$mediaType, 'media_title'=>$media_title, 'file_name'=>$imgname, 'video_thumbnail'=>'', 'created_by'=>1, 'created_date'=>$date, 'modified_by'=>1, 'modified_date'=>$date));
    }
      if(isset($sql)){
        $response['status']='success';
        $response['message']='Picture saved successfully'; 
      }else{
        $response['status']='fail';
        $response['message']='Failed to saved url';
      }
      echo json_encode($response);
}elseif($mediaType==3){
    $media_title=$_POST['media_title'];
    $getDocName=str_replace(' ', '-', $media_title);
  //  $media_type=$_POST['media_type'];
    $docfile=$_FILES['document_file'];
    $medialFolder=$_POST['media_folder'];
    if(!empty($docfile)){
        $Doc = $_FILES['document_file']['name'];
        $doc_ext =strtolower(pathinfo($Doc, PATHINFO_EXTENSION));
        $docname = $getDocName. '.' . $doc_ext;
        $doc_old_location = $_FILES['document_file']['tmp_name'];
        $doc_new_location = APPROOT.'/assets/admin/media/uploadImages/document/'. $docname;
        $doc_upload= move_uploaded_file($doc_old_location, $doc_new_location);
    }
    if($doc_upload){
      $sql=DB::getInstance()->insert('tbl_media', array('media_type'=>$mediaType, 'media_title'=>$media_title, 'file_name'=>$docname, 'video_thumbnail'=>'', 'created_by'=>1, 'created_date'=>$date, 'modified_by'=>1, 'modified_date'=>$date));
    }
      if(isset($sql)){
        $response['status']='success';
        $response['message']='Document saved successfully'; 
      }else{
        $response['status']='fail';
        $response['message']='Failed to saved url';
      }
      echo json_encode($response);

}
}elseif($action=="Update"){
  if($mediaType==2){
    $response=array('error'=>1, 'status'=>'', 'message'=>'');
    $media_title=$_POST['media_title'];
    //$media_type=$_POST['media_type'];
    $videoUrl=$_POST['video_url'];
    $media_id=$_POST['media_id'];
    if($_FILES['vid_file']['size']==0){
      $thumbnail=$_POST['video_thumbnail'];
    }else{
      $Img = $_FILES['vid_file']['name'];
      $image_ext =strtolower(pathinfo($Img, PATHINFO_EXTENSION));
      $thumbname = random_code(10). '.' . $image_ext;
      $image_old_location = $_FILES['vid_file']['tmp_name'];
      $image_new_location = APPROOT.'/assets/admin/media/uploadImages/video/'. $thumbname;
      $img_upload= move_uploaded_file($image_old_location, $image_new_location); 
    }
    //$sql=DB::getInstance()->gen_query("call pro_updateMedia( '$media_title', '$videoUrl', 1, '$media_id')"); //todo:add user id
    $sql=DB::getInstance()->update('tbl_media', $media_id , 'media_id', array('media_title'=>$media_title, 'file_name'=>$videoUrl, 'video_thumbnail'=>$thumbname, 'modified_by'=>1, 'modified_date'=>$date));
    if(isset($sql)){
        $response['status']='success';
        $response['message']='Video url Updated successfully';
    }else{
        $response['status']='fail';
        $response['message']='Failed to Update url';
    }
   echo json_encode($response);
}elseif($mediaType==1){
    $media_title=$_POST['media_title'];
    //$media_type=$_POST['media_type'];
    $imgfile=$_FILES['img_file'];
    $file_name=$_POST['file_name'];
    $media_id=$_POST['media_id'];
    if($_FILES['img_file']['size']==0){
        $imgname=$file_name;
    }else{
        $Img = $_FILES['img_file']['name'];
        $image_ext =strtolower(pathinfo($Img, PATHINFO_EXTENSION));
        $imgname = random_code(10). '.' . $image_ext;
        $image_old_location = $_FILES['img_file']['tmp_name'];
        $image_new_location = APPROOT.'/assets/admin/media/uploadImages/picture/'. $imgname;
        $img_upload= move_uploaded_file($image_old_location, $image_new_location);
    }
   
    $sql=DB::getInstance()->update('tbl_media', $media_id , 'media_id', array('media_title'=>$media_title, 'file_name'=>$imgname, 'video_thumbnail'=>'', 'modified_by'=>1, 'modified_date'=>$date));
    
      if(isset($sql)){
        $response['status']='success';
        $response['message']='Picture saved successfully'; 
      }else{
        $response['status']='fail';
        $response['message']='Failed to saved url';
      }
      echo json_encode($response);
}elseif($mediaType==3){
    $media_title=$_POST['media_title'];
   // $media_type=$_POST['media_type'];
    $docfile=$_FILES['document_file'];
    $medialFolder=$_POST['media_folder'];
    $media_id=$_POST['media_id'];
    if(($_FILES['document_file']['size']==0)){
      $docname=$_POST['file_name'];
    }else{
        $Doc = $_FILES['document_file']['name'];
        $doc_ext =strtolower(pathinfo($Doc, PATHINFO_EXTENSION));
        $docname = random_code(10). '.' . $doc_ext;
        $doc_old_location = $_FILES['document_file']['tmp_name'];
        $doc_new_location = APPROOT.'/assets/admin/media/uploadImages/document/'. $docname;
        $doc_upload= move_uploaded_file($doc_old_location, $doc_new_location);
    }
  
    $sql=DB::getInstance()->update('tbl_media', $media_id , 'media_id', array('media_type'=>$media_type, 'media_title'=>$media_title, 'file_name'=>$docname, 'video_thumbnail'=>'', 'modified_by'=>1, 'modified_date'=>$date));
    
      if(isset($sql)){
        $response['status']='success';
        $response['message']='Document saved successfully'; 
      }else{
        $response['status']='fail';
        $response['message']='Failed to saved url';
      }
      echo json_encode($response);

}

}
}