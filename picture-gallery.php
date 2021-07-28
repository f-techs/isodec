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
    <div class="photo-gallery">
      <div class="container">
        <div class="intro">
          <h4 class="text-center">PHOTO GALLERY</h4>
        </div><hr>
       
        <div class="row photos">
        <?php foreach($galleryResults as $pic): ?>
          <div class="col-sm-6 col-md-4 col-lg-3 item"><a data-fancybox="images" data-caption="<?php echo $pic->media_title; ?>" href="<?php echo URLROOT ?>/assets/admin/media/uploadImages/picture/<?php echo (!empty($pic->file_name)) ? $pic->file_name : ''; ?>" data-lightbox="photos"><img class="img-fluid" src="<?php echo URLROOT ?>/assets/admin/media/uploadImages/picture/<?php echo (!empty($pic->file_name)) ? $pic->file_name : ''; ?>"></a>
          <p><?php echo $pic->media_title; ?></p>
        </div>  
        <?php endforeach; ?>
        </div>
      
      </div>
    </div>
  </section>

  <section class="footer">

  </section>
  <!-- FOOTER -->
</main>
<?php include(APPROOT . '/includes/public/footer.php'); ?>