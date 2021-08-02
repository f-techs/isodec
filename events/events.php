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
          <h2 style="font-weight:bold;">EVENT</h2>
        </div>
      </div>
    </div>
  </section>

  <!--mission vision-->
  <section id="page-content">
  <?php if (!empty($eventPageTitle)) : ?>
    <div class="container">
        <h5 class="text-center mt-5"><?= $eventPageTitle; ?></h5>
      <hr>
      <div class="row mx-auto my-3">
          <div class="col-lg-12 col-md-6 col-xs-4">
          <?php echo (!empty($eventPageImg)) ?  '<img class="img-fluid" src="'.URLROOT.'/assets/admin/media/uploadImages/events/'.$eventPageImg.'"/>' : ''; ?>
          </div>
          <div class="col-lg-12 col-md-6 col-xs-4">
            <p> <?php echo $eventPageDetails; ?></p>
          </div>
      </div>
      <div class="row">
        <div class="col-md-12">
        <a href="" class="btn btn_news mb-3">CLICK HERE TO REGISTER<i class="mdi mdi-chevron-double-right"></i></a>
        </div>
      </div>
    </div>
    <?php else: ?>
    <div><h5 class="text-center"><?php die('Sorry No Details to display.'); ?> </h5> </div>
    <?php endif; ?>
  </section>

  <section class="footer">

  </section>
  <!-- FOOTER -->
</main>
<?php include(APPROOT . '/includes/public/footer.php'); ?>