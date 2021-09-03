<?php
require_once('../../config.php');
if(isset($_POST['imgname_econs'])){
   $imgname=$_POST['imgname_econs'];
   $imgpath= APPROOT.'/assets/admin/media/uploads/economic_justice/'. $imgname;
   if(isset($imgname)){
       $sql=DB::getInstance()->gen_query("UPDATE tbl_economic_justice set img='' WHERE img='$imgname'");
   }
   if(isset($sql)){
       unlink($imgpath);
       echo 'success';
   }else{
       echo 'fail';
   }
}elseif(isset($_POST['imgname_essential'])){
    $imgname=$_POST['imgname_essential'];
    $imgpath= APPROOT.'/assets/admin/media/uploads/'. $imgname;
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
    $imgpath= APPROOT.'/assets/admin/media/uploads/policy_support/'. $imgname;
    if(isset($imgname)){
        $sql=DB::getInstance()->gen_query("UPDATE tbl_policy_support set img='' WHERE img='$imgname'");
    }
    if(isset($sql)){
        unlink($imgpath);
        echo 'success';
    }else{
        echo 'fail';
    } 
}