<?php
require_once('../../config.php');
if(isset($_GET['ID'])){
    $ID=$_GET['ID'];
 $sql=DB::getInstance()->select_query("SELECT * FROM view_board WHERE board_member_ID='$ID'");
 $data=$sql->results();
 echo json_encode($data[0]);
}