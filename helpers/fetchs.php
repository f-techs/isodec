<?php
/** for website contents */

//fetch mission
$sqlMission=DB::getInstance()->select_query("call pro_selectAbout(1)");
$missionResults=$sqlMission->results();
foreach($missionResults as $mission){
    $missionID=$mission->about_type;
    $missionImg=$mission->img;
    $missionImgCaption=$mission->img_description;
    $missionDetails=$mission->details;
}

//fetch mission
$sqlVision=DB::getInstance()->select_query("call pro_selectAbout(2)");
$visionResults=$sqlVision->results();
foreach($visionResults as $vision){
    $visionID=$vision->about_type;
    $visionImg=$vision->img;
    $visionImgCaption=$vision->img_description;
    $visionDetails=$vision->details;
}

//fetch collaboration
$sqlCollabo=DB::getInstance()->select_query("call pro_selectAbout(3)");
$collaboResults=$sqlCollabo->results();
foreach($collaboResults as $collabo){
    $collaboID=$collabo->about_type;
    $collaboImg=$collabo->img;
    $collaboImgCaption=$collabo->img_description;
    $collaboDetails=$collabo->details;
}

/**end for website contents */




/** for admin contents */

/**end for admin contents */

