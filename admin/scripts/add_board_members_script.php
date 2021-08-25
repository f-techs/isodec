<?php
require_once('../../config.php');
if(isset($_POST['action'])){
    $response=array('error'=>1, 'status'=>'', 'message'=>'');
    $action=$_POST['action'];
    $firstname=$_POST['first_name'];
    $othernames=$_POST['other_names'];
    $email=$_POST['email'];
    $profile=$_POST['profile'];
    $title=$_POST['title'];
    $position=$_POST['position'];
    $ID=$_POST['id'];
    if($action=='Add'){
    $sql=DB::getInstance()->insert('tbl_board_members', array('firstname'=>$firstname, 'othernames'=>$othernames, 'title'=>$title, 'position'=>$position, 'email'=>$email, 'profile'=>$profile,  'created_by'=>$_SESSION['userID'], 'modified_by'=>$_SESSION['userID']));// todo:use session  
    if(isset($sql)){
        $response['status']='success';
        $response['message']='Details saved successfully';
    }else{
        $response['status']='error';
        $response['message']='Something went wrong';
    }
    echo json_encode($response);
    }elseif($action=='Update'){
        $sql=DB::getInstance()->update('tbl_board_members', $ID, 'board_member_ID',  array('firstname'=>$firstname, 'othernames'=>$othernames, 'title'=>$title, 'position'=>$position, 'email'=>$email,  'profile'=>$profile, 'modified_by'=>$_SESSION['userID']));
        if(isset($sql)){
            $response['status']='success';
            $response['message']='Details saved successfully';
        }else{
            $response['status']='error';
            $response['message']='Something went wrong';
        }
        echo json_encode($response);
    }
    
}