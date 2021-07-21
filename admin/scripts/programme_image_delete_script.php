<?php
require_once('../../config.php');
if(isset($_POST['imgname_econs'])){
   $imgname=$_POST['imgname_econs'];
   $imgpath= APPROOT.'/assets/admin/media/uploadImages/'. $imgname;
   if(isset($imgname)){
       $sql=DB::getInstance()->gen_query("UPDATE tbl_programmes set img='' WHERE programme_type=1");
   }
   if(isset($sql)){
       unlink($imgpath);
       echo 'success';
   }else{
       echo 'fail';
   }
}elseif(isset($_POST['imgname_essential'])){
    $imgname=$_POST['imgname_essential'];
    $imgpath= APPROOT.'/assets/admin/media/uploadImages/'. $imgname;
    if(isset($imgname)){
        $sql=DB::getInstance()->gen_query("UPDATE tbl_programmes set img='' WHERE programme_type=2");
    }
    if(isset($sql)){
        unlink($imgpath);
        echo 'success';
    }else{
        echo 'fail';
    } 
}elseif(isset($_POST['imgname_policy'])){
    $imgname=$_POST['imgname_policy'];
    $imgpath= APPROOT.'/assets/admin/media/uploadImages/'. $imgname;
    if(isset($imgname)){
        $sql=DB::getInstance()->gen_query("UPDATE tbl_programmes set img='' WHERE programme_type=3");
    }
    if(isset($sql)){
        unlink($imgpath);
        echo 'success';
    }else{
        echo 'fail';
    } 
}