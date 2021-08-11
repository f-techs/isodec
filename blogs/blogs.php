<?php require_once('../config.php') ?>
<?php include(APPROOT . '/includes/public/header.php'); ?>
<?php

?>
<main role="main">
  <!-- Showcase -->
  <section id="page-title-section" class="bg-info text-light p-5 p-lg-0 pt-lg-5  text-center text-sm-start">
    <div class="container page-heading">
      <div class="row">
        <div class="col-md-12 text-left">
          <h2 style="font-weight:bold;">BLOG</h2>
        </div>
      </div>
    </div>
  </section>

  <!--mission vision-->
  <section id="page-content">
  <?php if (!empty($blogPageTitle)) : ?>
    <div class="container">
        <h5 class="text-center mt-5"><?= $blogPageTitle; ?></h5>
      <hr>
      <div class="row mx-auto my-3">
          <div class="col-lg-12 col-md-6 col-xs-4">
            <img class="img-fluid" src="<?php echo URLROOT ?>/assets/admin/media/uploads/blogs/<?php echo $blogPageImg; ?>"/>
            <p style="color:#39A8E8; font-weight: bold;"><?php echo $blogPageImgCaption; ?></p>
          </div>
          <div class="col-lg-12 col-md-6 col-xs-4">
            <p> <?php echo $blogPageDetails; ?></p>
          </div>
        <?php else: ?>
       <div><h5 class="text-center"><?php die('Sorry No Blog Details to display.'); ?> </h5> </div>
          <?php endif; ?>
      </div>
    </div>
  </section>

  <section class="footer">

  </section>
  <!-- FOOTER -->
</main>
<?php include(APPROOT . '/includes/public/footer.php'); ?>