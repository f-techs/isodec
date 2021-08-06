<?php 
require_once('../../config.php');
if(isset($_POST['action'])){
    $response=array('error'=>1, 'status'=>'', 'message'=>'');
    $action=$_POST['action'];
    $mission=$_POST['mission_content'];
    $vision=$_POST['vision_content'];
    $ID=$_POST['id'];
    $isodecValues=$_POST['values_content'];
    $date=date("Y-m-d");
    if($action=='Add'){
        $sql=DB::getInstance()->insert('tbl_welcome_message', array('mission'=>$mission, 'vision'=>$vision, 'isodec_values'=>$isodecValues, 'created_by'=>1, 'created_date'=>$date, 'modified_by'=>1, 'modified_date'=>$date));// todo:use session  
        if(isset($sql)){
        $response['status']='success';
       $response['message']='Detaisl saved successfully';
        }else{
            $response['status']='error';
            $response['message']='Something went wrong';   
        }
        echo json_encode($response);
    }elseif($action=='Update'){
        $sql=DB::getInstance()->update('tbl_welcome_message', $ID, 'message_id',  array('mission'=>$mission, 'vision'=>$vision, 'isodec_values'=>$isodecValues, 'modified_by'=>1, 'modified_date'=>$date));// todo:use session  
        if(isset($sql)){
            $response['status']='success';
            $response['message']='Detaisl saved successfully';
        }else{
            $response['status']='success';
            $response['message']='Detaisl saved successfully';
        }
        echo json_encode($response);
    }
}