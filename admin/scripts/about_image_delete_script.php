<?php
require_once('../../config.php');
if(isset($_POST['imgname_mission'])){
   $imgname=$_POST['imgname_mission'];
   $imgpath= APPROOT.'/assets/admin/media/uploadImages/'. $imgname;
   if(isset($imgname)){
       $sql=DB::getInstance()->gen_query("UPDATE tbl_about set img='' WHERE about_type=1");
   }
   if(isset($sql)){
       unlink($imgpath);
       echo 'success';
   }else{
       echo 'fail';
   }
}elseif(isset($_POST['imgname_vision'])){
    $imgname=$_POST['imgname_vision'];
    $imgpath= APPROOT.'/assets/admin/media/uploadImages/'. $imgname;
    if(isset($imgname)){
        $sql=DB::getInstance()->gen_query("UPDATE tbl_about set img='' WHERE about_type=2");
    }
    if(isset($sql)){
        unlink($imgpath);
        echo 'success';
    }else{
        echo 'fail';
    } 
}elseif(isset($_POST['imgname_collabo'])){
    $imgname=$_POST['imgname_collabo'];
    $imgpath= APPROOT.'/assets/admin/media/uploadImages/'. $imgname;
    if(isset($imgname)){
        $sql=DB::getInstance()->gen_query("UPDATE tbl_about set img='' WHERE about_type=3");
    }
    if(isset($sql)){
        unlink($imgpath);
        echo 'success';
    }else{
        echo 'fail';
    } 
}