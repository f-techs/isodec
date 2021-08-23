<?php
require_once('../../config.php');
if(isset($_POST['messageType'])){
$messageType=$_POST['messageType'];
$message=$_POST['messageContent'];
$eventID=$_SESSION['eventRegID'];
$subject=$_POST['subject'];
if($_FILES['attach-file']['size']!==0){
    $File = $_FILES['attach-file']['name'];
    $ext=strtolower(pathinfo($File, PATHINFO_EXTENSION));
    $file_name='ISODEC_'.rand().'.'.$ext;
    $file_location = $_FILES['attach-file']['tmp_name'];
    $file_new_location = APPROOT.'/assets/admin/media/email-uploads/'. $file_name;
    $moveFile= move_uploaded_file($file_location, $file_new_location);
 }
$msgContent=[];
$contacts=[];
$email=[];
if($messageType==1){
    $sql=DB::getInstance()->get('view_event_registration', array('event_id', '=', $eventID));
    $cr=$sql->results();
  if($sql) {
   foreach($cr as $c){
        array_push($contacts, $c->phone);
    }
    $msgContent['contacts']=$contacts;
    $msgContent['msg']=$message;
    $msgContent['type']=$messageType;
    $msgContent['status']='success';
}else{
    $msgeContent['status']='fail';
}
}elseif($messageType==2){
    $sql=DB::getInstance()->get('view_event_registration', array('event_id', '=', $eventID));
    $er=$sql->results();
  if($sql) {
   foreach($er as $e){
        array_push($email, $e->email);
    }
    $msgContent['email']=$email;
    $msgContent['subject']=$subject;
    $msgContent['msg']=$message;
    $msgContent['type']=$messageType;
    if(isset($moveFile)){
        $msgContent['file']=$file_name;
    }
    $msgContent['status']='success';
}else{
    $msgeContent['status']='fail';
}
}
echo json_encode($msgContent);
}
