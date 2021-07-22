<?php
require_once('../../config.php');
if(isset($_POST['imgname_db'])) {
    $imgname = $_POST['imgname_db'];
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
}