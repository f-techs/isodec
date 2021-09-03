<?php
/** for website contents */

//fetch mission
$sqlMission=DB::getInstance()->select_query("call pro_selectAbout(1)");
$missionResults=$sqlMission->results();
foreach($missionResults as $mission){
    $missionEntry=$mission->about_id;
    $missionID=$mission->about_type;
    $missionImg=$mission->img;
    $missionImgCaption=$mission->img_description;
    $missionDetails=$mission->details;
}

//fetch mission
$sqlhistory=DB::getInstance()->select_query("call pro_selectAbout(2)");
$historyResults=$sqlhistory->results();
foreach($historyResults as $history){
    $historyEntry=$history->about_id;
    $historyID=$history->about_type;
    $historyImg=$history->img;
    $historyImgCaption=$history->img_description;
    $historyDetails=$history->details;
}

//fetch collaboration
$sqlCollabo=DB::getInstance()->select_query("call pro_selectAbout(3)");
$collaboResults=$sqlCollabo->results();
foreach($collaboResults as $collabo){
    $collaboEntry=$collabo->about_id;
    $collaboID=$collabo->about_type;
    $collaboImg=$collabo->img;
    $collaboImgCaption=$collabo->img_description;
    $collaboDetails=$collabo->details;
}

//fetch economic justice 
$sqlEconsJustice=DB::getInstance()->select_query("SELECT * FROM tbl_economic_justice");
$econsJusticeResults=$sqlEconsJustice->results();

//fetch policy support 
$sqlpocily=DB::getInstance()->select_query("SELECT * FROM tbl_policy_support");
$policyResults=$sqlpocily->results();
/*
foreach($econsJusticeResults as $econJustice){
    $econJusticeID=$econJustice->programme_type;
    $econJusticeImg=$econJustice->img;
    $econJusticeImgCaption=$econJustice->img_description;
    $econJusticeDetails=$econJustice->details;
}
*/
//fetch essentials
$sqlEssential=DB::getInstance()->select_query("call pro_selectProgramme(2)");
$essentialResults=$sqlEssential->results();
foreach($essentialResults as $essentials){
    $essentialsID=$essentials->programme_type;
    $essentialsImg=$essentials->img;
    $essentialsImgCaption=$essentials->img_description;
    $essentialsDetails=$essentials->details;
}

/*fetch economic justice 
$sqlpocily=DB::getInstance()->select_query("call pro_selectProgramme(3)");
$policyResults=$sqlpocily->results();
foreach($policyResults as $policy){
    $policyID=$policy->programme_type;
    $policyImg=$policy->img;
    $policyImgCaption=$policy->img_description;
    $policyDetails=$policy->details;
}
*/
//fetch mission-vision
$sqlMissionVission=DB::getInstance()->select_query("SELECT * FROM tbl_welcome_message");
$missionVisionResults=$sqlMissionVission->results();
foreach($missionVisionResults as $mv){
   $messageID=$mv->message_id;
   $missionMessage=$mv->mission;
   $visionMessage=$mv->vision;
   $isodecValues=$mv->isodec_values;
}

//fetch blog list table
$sqlbloglist=DB::getInstance()->select_query("SELECT * FROM tbl_blogs ORDER BY blog_id DESC");
$blogListResults=$sqlbloglist->results();

//fetch blog list table --limit
$sqlblogL=DB::getInstance()->select_query("SELECT * FROM tbl_blogs ORDER BY blog_id DESC LIMIT 3");
$sqlblogLResults=$sqlblogL->results();

//fetch event list table
$sqleventlist=DB::getInstance()->select_query("SELECT * FROM view_events ORDER BY event_id DESC");
$eventListResults=$sqleventlist->results();

//fetch news list table
$sqlNewslist=DB::getInstance()->select_query("SELECT * FROM tbl_news ORDER BY news_id DESC");
$newsListResults=$sqlNewslist->results();


//fetch services list table
$sqlEssential=DB::getInstance()->select_query("SELECT * FROM view_essentialservices ORDER BY post_id DESC");
$sqlEssentialResults=$sqlEssential->results();

//fetch services education
$sqlEducation=DB::getInstance()->select_query("SELECT * FROM view_essentialservices WHERE post_type=1 ORDER BY post_id DESC");
$sqlEducationResults=$sqlEducation->results();

//fetch services health
$sqlHealth=DB::getInstance()->select_query("SELECT * FROM view_essentialservices WHERE post_type=2 ORDER BY post_id DESC");
$sqlHealthResults=$sqlHealth->results();

//fetch services water
$sqlWater=DB::getInstance()->select_query("SELECT * FROM view_essentialservices WHERE post_type=3 ORDER BY post_id DESC");
$sqlWaterResults=$sqlWater->results();

//fetch media list table
$sqlMedia=DB::getInstance()->select_query("SELECT * FROM view_media ORDER BY media_id DESC");
$sqlMediaResults=$sqlMedia->results();

//fetch users list
$sqlUsers=DB::getInstance()->select_query("SELECT * FROM tbl_users WHERE user_email <> 'isodec@super' ORDER BY user_id DESC");
$sqlUsersResults=$sqlUsers->results();
$countUsers=$sqlUsers->count();



//fetch title
$sqlTitle=DB::getInstance()->select_query("SELECT * FROM titles");
$sqlTitleResults=$sqlTitle->results();

//fetch position
$sqlPosition=DB::getInstance()->select_query("SELECT * FROM position");
$sqlPositionResults=$sqlPosition->results();


//fetch board members
$sqlBoard=DB::getInstance()->select_query("SELECT * FROM view_board ORDER BY board_member_id DESC");
$boardResults=$sqlBoard->results();






//fetch upcoming events
$sqlUe=DB::getInstance()->select_query("SELECT * FROM view_events WHERE event_date >= CURDATE() ");
$sqlUeResults=$sqlUe->results();
$countUpcoming=$sqlUe->count();

//fetch upcoming events register
$sqlUpReg=DB::getInstance()->select_query("SELECT * FROM view_event_summary WHERE event_date >= CURDATE() ");
$sqlUpRegResults=$sqlUpReg->results();


//fetch recent events
$sqlLe=DB::getInstance()->select_query("SELECT * FROM view_events ORDER BY event_id DESC LIMIT 3");
$sqlLeResults=$sqlLe->results();

//fetch all events
$sqlAe=DB::getInstance()->select_query("SELECT * FROM view_events ORDER BY event_id DESC");
$sqlAeResults=$sqlAe->results();

//fetch all ourwork
$sqlOw=DB::getInstance()->select_query("SELECT * FROM tbl_our_work");
$sqlOwResults=$sqlOw->results();

//fetch events registered list
if(isset($_SESSION['eventRegID'])){
    $eventID=$_SESSION['eventRegID'];
$sqlRegList=DB::getInstance()->select_query("SELECT * FROM view_event_registration where event_id='$eventID'");
$sqlRegListResults=$sqlRegList->results();
foreach($sqlRegListResults as $r){
    $eventRegListTitle=$r->event_title;
}
}



//fetch blog details
if(isset($_SESSION['blogID'])){
    $blogID=$_SESSION['blogID'];
    $sqlBlog=DB::getInstance()->select_query("SELECT * FROM view_blogs WHERE blog_id='$blogID'");
    $sqlBlogResults=$sqlBlog->results();
    foreach($sqlBlogResults as $blogData){
        $blogID=$blogData->blog_id;
        $blogCode=$blogData->blog_code;
        $blogImg=$blogData->blog_img;
        $blogImgCaption=$blogData->img_description;
        $blogTitle=$blogData->blog_title;
        $blogDetails=$blogData->blog_details;
    }

}
//fetch new details
if(isset($_SESSION['newsID'])){
    $newsID=$_SESSION['newsID'];
    $sqlNews=DB::getInstance()->select_query("SELECT * FROM tbl_news WHERE news_id='$newsID'");
    $sqlNewsResults=$sqlNews->results();
    foreach($sqlNewsResults as $newsData){
        $newsID=$newsData->news_id;
        $newsCode=$newsData->news_code;
        $newsImg=$newsData->news_img;
        $newsImgCaption=$newsData->img_description;
        $newsTitle=$newsData->news_title;
        $newsDetails=$newsData->news_details;
        $newsSource=$newsData->news_source;
    }
}
//fetch pictures
$sqlGallery=DB::getInstance()->select_query("SELECT * FROM view_media WHERE media_type=1 ORDER BY media_id");
$galleryResults=$sqlGallery->results();

//fetch vidoeos
$sqlVideo=DB::getInstance()->select_query("SELECT * FROM view_media WHERE media_type=2 ORDER BY media_id");
$videoResults=$sqlVideo->results();

//fetch documents
$sqlDoc=DB::getInstance()->select_query("SELECT * FROM view_media WHERE media_type=3 ORDER BY media_id");
$docResults=$sqlDoc->results();

//fetch documents
$sqlAudio=DB::getInstance()->select_query("SELECT * FROM view_media WHERE media_type=4 ORDER BY media_id");
$audioResults=$sqlAudio->results();

//fetch registration
$sqlRegSumm=DB::getInstance()->select_query("SELECT * FROM view_event_summary");
$sqlRegSummResults=$sqlRegSumm->results();


//fetch events details
if(isset($_SESSION['eventID'])){
    $eventID=$_SESSION['eventID'];
    $sqlEvent=DB::getInstance()->select_query("SELECT * FROM view_events WHERE event_id='$eventID'");
    $sqlEventResults=$sqlEvent->results();
    foreach($sqlEventResults as $eventData){
        $eventID=$eventData->event_id;
        $eventlocation=$eventData->location;
        $eventCode=$eventData->event_code;
        $eventImg=$eventData->event_img;
        $eventTitle=$eventData->event_title;
        $eventType=$eventData->event_type;
        $eventTypeName=$eventData->event_type_name;
        $eventDetails=$eventData->event_details;
        $eventDate=$eventData->event_date;
        $eventTime=$eventData->event_time;
        $eventWebinar=$eventData->webinar_url;
    }

}

//fetch social media
$sqlSocial=DB::getInstance()->select_query("SELECT * FROM tbl_social_media");
$socialResults=$sqlSocial->results();
foreach($socialResults as $data){
    $socialID=$data->social_media_id;
    $facebook=$data->facebook_url;
    $twitter=$data->twitter_url;
    $instagram=$data->instagram_url;
    $skype=$data->skype_url;
    $linkedIn=$data->linkedIn_url;
    $youtube=$data->youtube_url;
    $entryCode=$data->entry_code;
}

//office locations
$sqlOff=DB::getInstance()->select_query("SELECT * FROM view_office_project_maps");
$sqlOffResults=$sqlOff->results();



/**end for website contents */

/**select box fetch */
//essential service
$sqlSelect=DB::getInstance()->select_query("SELECT * FROM tbl_essential_types");
$sqlSelectResults=$sqlSelect->results();

//media
$sqlSelMedia=DB::getInstance()->select_query("SELECT * FROM media_types");
$mediaResults=$sqlSelMedia->results();

//location
$sqlLocationtType=DB::getInstance()->select_query("SELECT * FROM location_type");
$locationTypeResults=$sqlLocationtType->results();


//events
$sqlEvents=DB::getInstance()->select_query("SELECT * FROM event_types");
$eventResults=$sqlEvents->results();

//blogs website
if (isset($_GET['blogid'])) {
    $blogPageID = $_GET['blogid'];
    $sqlBlogPage=DB::getInstance()->get('view_blogs', array('blog_id', '=', $blogPageID));
    $r=$sqlBlogPage->results();
  //var_dump($sqlR);
  foreach($r as $data){
    $blogPageTitle=$data->blog_title;
    $blogPageDetails=$data->blog_details;
    $blogPageImg=$data->blog_img;
    $blogPageImgCaption=$data->img_description;
    $postedBy=$data->firstname. ' '. $data->othernames;
    $postedDate=$data->created_date;
  }
  }

  //news website
  if (isset($_GET['newsid'])) {
    $newsPageID = $_GET['newsid'];
    $sqlNewsPage=DB::getInstance()->get('view_news', array('news_id', '=', $newsPageID));
    $n=$sqlNewsPage->results();
  //var_dump($sqlR);
  foreach($n as $data){
    $newsPageTitle=$data->news_title;
    $newsPageDetails=$data->news_details;
    $newsPageImg=$data->news_img;
    $newsPageImgCaption=$data->img_description;
    $postedBy=$data->firstname.' '. $data->othernames;
    $postedDate=$data->created_date;
    $source=$data->news_source;
  }
  }
  //events website
  if (isset($_GET['eventid'])) {
    $eventPageID = $_GET['eventid'];
    $sqlEventPage=DB::getInstance()->get('tbl_events', array('event_id', '=', $eventPageID));
    $e=$sqlEventPage->results();
  //var_dump($sqlR);
  foreach($e as $data){
    $eventType=$data->event_type;
    $webinarUrl=$data->webinar_url;
    $eventID=$data->event_id;
    $eventPageTitle=$data->event_title;
    $eventPageDetails=$data->event_details;
    $eventPageImg=$data->event_img;
    $eventlocation=$data->location;
    $eventDate=date('d-M-Y', strtotime($data->event_date));
    $eventTime=date("g:i A", strtotime($data->event_time));
  }
  }
  //registration website
  if(isset($_GET['regid'])){
      $regId=$_GET['regid'];
      $sqlreg=DB::getInstance()->get('tbl_events', array('event_id', '=', $regId));
      $rg=$sqlreg->results();
      foreach($rg as $data){
        $eventRegTitle=$data->event_title;
        $eventRegID=$data->event_id;
      }
      
  }

  //our-work
  if(isset($_GET['q'])){
    $wrkId=$_GET['q'];
    $sqlwrk=DB::getInstance()->get("SELECT * from tbl_our_work WHERE our_word_id='$wrkId'");
    $ourwrk=$sqlwrk->results();
    foreach($ourwrk as $data){
      $wrkTitle=$data->our_work_title;
      $wrkDescription=$data->our_work_description;
    }
    
}
  
  //locations & maps
  $sqlLocations=DB::getInstance()->select_query("SELECT * FROM  view_office_project_maps");
  $locationsResults=$sqlLocations->results();
  $checkRow=$sqlLocations->count();
/** for admin contents */

/**end for admin contents */

