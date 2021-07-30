<?php require_once('config.php') ?>

<?php include(APPROOT . '/includes/public/header.php'); ?>
<main role="main">
  <!-- Showcase -->
  <section id="page-title-section" class="bg-info text-light p-5 p-lg-0 pt-lg-5  text-center text-sm-start">
    <div class="container page-heading">
      <div class="row">
        <div class="col-md-12 text-left">
          <h2 style="font-weight:bold;">OUR GALLERY</h2>
        </div>
      </div>
    </div>
  </section>

  <!--mission vision-->
  <section id="page-content" style="margin-top:20px;">
   
      <div class="container">
        <div class="intro">
          <h4 class="text-center">VIDEO GALLERY</h4>
        </div><hr>
       
        <div class="row photos">
        <?php foreach($videoResults as $vid): ?>
          <div class="col-sm-6 col-md-4 col-lg-3 item"><a href="<?php echo $vid->file_name; ?>" data-fancybox="videos" data-caption="<?php echo  $vid->media_title; ?>"><img class="img-fluid" src="<?php echo URLROOT ?>/assets/admin/media/avatars/video_play.png"></a>
          <p><?php echo $vid->media_title; ?></p>
        </div>  
        <?php endforeach; ?>
        </div>
      
      </div>
    
  </section>

  <section class="footer">

  </section>
  <!-- FOOTER -->
</main>
<?php include(APPROOT . '/includes/public/footer.php'); ?>