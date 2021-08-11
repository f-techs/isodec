<?php
require_once('../../config.php');
if(isset($_POST['imgname_service'])){
    $imgname=$_POST['imgname_service'];
    $postID=$_POST['postID'];
    $imgpath= APPROOT.'/assets/admin/media/uploads/services/'. $imgname;
    if(isset($imgname)){
        $sql=DB::getInstance()->gen_query("UPDATE tbl_essentials set post_img='' WHERE post_id='$postID'");
    }
    if(isset($sql)){
        unlink($imgpath);
        echo 'success';
    }else{
        echo 'fail';
    }
 }