<?php
require_once('../../config.php');
if(isset($_POST['blog_image'])){
    $imgname = $_POST['blog_image'];
    $blogCode = $_POST['blogCode'];
    $imgpath = APPROOT . '/assets/admin/media/uploadImages/blogs/' . $imgname;
    if (isset($imgname)) {
        $sql = DB::getInstance()->gen_query("UPDATE tbl_blogs set blog_img='' WHERE blog_code='$blogCode'");
    }
    if (isset($sql)) {
        unlink($imgpath);
        echo 'success';
    } else {
        echo 'fail';
    }
}elseif(isset($_POST['news_image'])){
    $imgname = $_POST['news_image'];
    $newsCode = $_POST['newsCode'];
    $imgpath = APPROOT . '/assets/admin/media/uploadImages/news/' . $imgname;
    if (isset($imgname)) {
        $sql = DB::getInstance()->gen_query("UPDATE tbl_news set news_img='' WHERE news_code='$newsCode'");
    }
    if (isset($sql)) {
        unlink($imgpath);
        echo 'success';
    } else {
        echo 'fail';
    }  
}
