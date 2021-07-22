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

//fetch news list table
$sqlNewslist=DB::getInstance()->select_query("SELECT * FROM tbl_news ORDER BY news_id DESC");
$newsListResults=$sqlNewslist->results();

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
//unset($_SESSION['blogID']);
/**end for website contents */




/** for admin contents */

/**end for admin contents */

