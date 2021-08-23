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
}elseif(isset($_POST['newsID'])){
    $delId=$_POST['newsID'];
    $sql=DB::getInstance()->gen_query("DELETE FROM tbl_news WHERE news_id='$delId'");
    if(isset($sql)){
        echo 'success';
    }else{
        echo 'fail';
    }  
}elseif(isset($_POST['postID'])){
    $delId=$_POST['postID'];
    $sql=DB::getInstance()->gen_query("DELETE FROM tbl_essentials WHERE post_id='$delId'");
    if(isset($sql)){
        echo 'success';
    }else{
        echo 'fail';
    }  
}elseif(isset($_POST['docID'])){
    $delId=$_POST['docID'];
    $sql=DB::getInstance()->gen_query("DELETE FROM tbl_media WHERE media_id='$delId'");
    if(isset($sql)){
        echo 'success';
    }else{
        echo 'fail';
    }   
}elseif(isset($_POST['eventID'])){
    $delId=$_POST['eventID'];
    $sql=DB::getInstance()->gen_query("DELETE FROM tbl_events WHERE event_id='$delId'");
    if(isset($sql)){
        echo 'success';
    }else{
        echo 'fail';
    }   
}elseif(isset($_POST['ourWorkID'])){
    $delId=$_POST['ourWorkID'];
    $sql=DB::getInstance()->gen_query("DELETE FROM tbl_our_work WHERE our_work_id='$delId'");
    if(isset($sql)){
        echo 'success';
    }else{
        echo 'fail';
    }   
}elseif(isset($_POST['userID'])){
    $delId=$_POST['userID'];
    $sql=DB::getInstance()->gen_query("DELETE FROM tbl_users WHERE user_id='$delId'");
    if(isset($sql)){
        echo 'success';
    }else{
        echo 'fail';
    }   
}elseif(isset($_POST['locationID'])){
    $delId=$_POST['locationID'];
    $sql=DB::getInstance()->gen_query("DELETE FROM tbl_office_projects WHERE off_proj_id='$delId'");
    if(isset($sql)){
        echo 'success';
    }else{
        echo 'fail';
    }   
}