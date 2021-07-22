<?php
require_once('../../config.php');
if(isset($_POST['blogID'])){
    $delId=$_POST['blogID'];
    $sql=DB::getInstance()->gen_query("DELETE FROM tbl_blogs WHERE blog_id='$delId'");
    if(isset($sql)){
        echo 'success';
    }else{
        echo 'fail';
    }
}