<?php
require_once('../../config.php');
if(isset($_POST['action'])){
    $response=array('error'=>1, 'status'=>'', 'message'=>'');
    $action=$_POST['action'];
    $title=$_POST['work_title'];
    $content=$_POST['work_content'];
    $editID=$_POST['editID'];
    $date=date("Y-m-d");
    if($action=='Add'){
        $sql=DB::getInstance()->insert('tbl_our_work', array('our_work_title'=>$title, 'our_work_description'=>$content, 'created_by'=>1, 'created_date'=>$date, 'modified_by'=>1, 'modified_date'=>$date));// todo:use session  
        if(isset($sql)){
            $response['status']='success';
            $response['message']='Details saved successfully';
         }else{
            $response['status']='error';
            $response['message']='Oops something went wrong';
         }
    echo json_encode($response);
    }elseif($action=='Update'){
        $sql=DB::getInstance()->update('tbl_our_work', $editID, 'our_work_id',  array('our_work_title'=>$title, 'our_work_description'=>$content, 'modified_by'=>1, 'modified_date'=>$date));// todo:use session  
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