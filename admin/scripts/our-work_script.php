<?php
require_once('../../config.php');
if(isset($_POST['action'])){
    $response=array('error'=>1, 'status'=>'', 'message'=>'');
    $action=$_POST['action'];
    $title=$_POST['work_title'];
    $content=$_POST['work_content'];
    $editID=$_POST['editID'];
    if($action=='Add'){
        $sql=DB::getInstance()->insert('tbl_our_work', array('our_work_title'=>$title, 'our_work_description'=>$content, 'created_by'=>$_SESSION['userID'],  'modified_by'=>$_SESSION['userID']));// todo:use session  
        if(isset($sql)){
            $response['status']='success';
            $response['message']='Details saved successfully';
         }else{
            $response['status']='error';
            $response['message']='Oops something went wrong';
         }
    echo json_encode($response);
    }elseif($action=='Update'){
        $sql=DB::getInstance()->update('tbl_our_work', $editID, 'our_work_id',  array('our_work_title'=>$title, 'our_work_description'=>$content, 'modified_by'=>$_SESSION['userID']));// todo:use session  
        if(isset($sql)){
            $response['status']='success';
            $response['message']='Details saved successfully';
         }else{
            $response['status']='error';
            $response['message']='Oops something went wrong';
         }
    echo json_encode($response);
    }
}