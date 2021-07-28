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
$sqlhistory=DB::getInstance()->select_query("call pro_selectAbout(2)");
$historyResults=$sqlhistory->results();
foreach($historyResults as $history){
    $historyID=$history->about_type;
    $historyImg=$history->img;
    $historyImgCaption=$history->img_description;
    $historyDetails=$history->details;
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

//fetch economic justice
$sqlEconsJustice=DB::getInstance()->select_query("call pro_selectProgramme(1)");
$econsJusticeResults=$sqlEconsJustice->results();
foreach($econsJusticeResults as $econJustice){
    $econJusticeID=$econJustice->programme_type;
    $econJusticeImg=$econJustice->img;
    $econJusticeImgCaption=$econJustice->img_description;
    $econJusticeDetails=$econJustice->details;
}
//fetch essentials
$sqlEssential=DB::getInstance()->select_query("call pro_selectProgramme(2)");
$essentialResults=$sqlEssential->results();
foreach($essentialResults as $essentials){
    $essentialsID=$essentials->programme_type;
    $essentialsImg=$essentials->img;
    $essentialsImgCaption=$essentials->img_description;
    $essentialsDetails=$essentials->details;
}

//fetch economic justice
$sqlpocily=DB::getInstance()->select_query("call pro_selectProgramme(3)");
$policyResults=$sqlpocily->results();
foreach($policyResults as $policy){
    $policyID=$policy->programme_type;
    $policyImg=$policy->img;
    $policyImgCaption=$policy->img_description;
    $policyDetails=$policy->details;
}

//fetch blog list table
$sqlbloglist=DB::getInstance()->select_query("SELECT * FROM tbl_blogs ORDER BY blog_id DESC");
$blogListResults=$sqlbloglist->results();

//fetch event list table
$sqleventlist=DB::getInstance()->select_query("SELECT * FROM view_events ORDER BY event_id DESC");
$eventListResults=$sqleventlist->results();

//fetch news list table
$sqlNewslist=DB::getInstance()->select_query("SELECT * FROM tbl_news ORDER BY news_id DESC");
$newsListResults=$sqlNewslist->results();


//fetch services list table
$sqlEssential=DB::getInstance()->select_query("SELECT * FROM view_essentialservices ORDER BY post_id DESC");
$sqlEssentialResults=$sqlEssential->results();

//fetch media list table
$sqlMedia=DB::getInstance()->select_query("SELECT * FROM view_media ORDER BY media_id DESC");
$sqlMediaResults=$sqlMedia->results();



//fetch blog details
if(isset($_SESSION['blogID'])){
    $blogID=$_SESSION['blogID'];
    $sqlBlog=DB::getInstance()->select_query("SELECT * FROM tbl_blogs WHERE blog_id='$blogID'");
    $sqlBlogResults=$sqlBlog->results();
    foreach($sqlBlogResults as $blogData){
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
        $newsCode=$newsData->news_code;
        $newsImg=$newsData->news_img;
        $newsImgCaption=$newsData->img_description;
        $newsTitle=$newsData->news_title;
        $newsDetails=$newsData->news_details;
    }
}
//fetch pictures
$sqlGallery=DB::getInstance()->select_query("SELECT * FROM view_media WHERE media_type=1 ORDER BY media_id");
$galleryResults=$sqlGallery->results();

//fetch vidoeos
$sqlVideo=DB::getInstance()->select_query("SELECT * FROM view_media WHERE media_type=2 ORDER BY media_id");
$videoResults=$sqlVideo->results();



//fetch events details
if(isset($_SESSION['eventID'])){
    $eventID=$_SESSION['eventID'];
    $sqlEvent=DB::getInstance()->select_query("SELECT * FROM view_events WHERE event_id='$eventID'");
    $sqlEventResults=$sqlEvent->results();
    foreach($sqlEventResults as $eventData){
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
    $facebook=$data->facebook_url;
    $twitter=$data->twitter_url;
    $instagram=$data->instagram_url;
    $skype=$data->skype_url;
    $linkedIn=$data->linkedIn_url;
    $entryCode=$data->entry_code;
}
/**end for website contents */

/**select box fetch */
//essential service
$sqlSelect=DB::getInstance()->select_query("SELECT * FROM tbl_essential_types");
$sqlSelectResults=$sqlSelect->results();

//media
$sqlSelMedia=DB::getInstance()->select_query("SELECT * FROM media_types");
$mediaResults=$sqlSelMedia->results();

//events
$sqlEvents=DB::getInstance()->select_query("SELECT * FROM event_types");
$eventResults=$sqlEvents->results();



/** for admin contents */

/**end for admin contents */

