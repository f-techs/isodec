<?php
require_once('../../config.php');
$response=array('status'=>'', 'message'=>'');
if(isset($_POST['action'])){
        $action=$_POST['action'];
        $location_type=$_POST['location_type'];
        $address=$_POST['address'];
        $latitude=$_POST['latitude'];
        $longitude=$_POST['longitude'];
        if($location_type==1){
            $icon= URLROOT.'/assets/admin/media/map-icons/office.png';
        }elseif($location_type==2){
            $icon= URLROOT.'/assets/admin/media/map-icons/project.png';  
        }
        if($action=='Add'){
            $sql=DB::getInstance()->insert('tbl_office_projects', array('location_type_id'=>$location_type, 'latitude'=>$latitude, 'icon'=>$icon, 'longitude'=>$longitude, 'address'=>$address, 'created_by'=>$_SESSION['userID'], 'modified_by'=>$_SESSION['userID']));
        }
        if(isset($sql)){
            $response['status']='success';
            $response['message']='Location details saved successfully';
        }else{
            $response['status']='error';
            $response['message']='Sorry something went wrong';
        }
        echo json_encode($response);
    
}