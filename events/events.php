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
          <h2 style="font-weight:bold;">EVENTS</h2>
        </div>
      </div>
    </div>
  </section>

  <!--mission vision-->
  <section id="page-content">
    <?php if (!empty($eventPageTitle)) : ?>
      <div class="container">
        <div>
          <h5 class="text-center mt-5"><?= $eventPageTitle; ?> </h5>
        </div>
        <hr>
        <div class="row mx-2 text-center">
          <div class="col-md-4 mt-3">
            <span id="badge-label" class="badge badge-pill badge-primary badge-label"><b>EVENT DATE:</b></span> <?= $eventDate; ?></p>
          </div>
          <div class="col-md-3 mt-3">
            <span id="badge-label" class="badge badge-pill badge-primary badge-label"><b>TIME:</b></span> <?= $eventTime; ?></p>
          </div>
          <div class="col-md-5">
            <?php if ($eventType == 1) : ?>
              <a href="<?php echo URLROOT ?>/events/event-registration?regid=<?= $eventID; ?>" class="btn btn_reg mb-3">CLICK HERE TO REGISTER <i class="mdi mdi-chevron-double-right"></i></a>
            <?php elseif ($eventType == 2) : ?>
              <a href="<?php echo $webinarUrl; ?>" target="_blank" class="btn btn_reg mb-3">CLICK HERE TO REGISTER <i class="mdi mdi-chevron-double-right"></i></a>
            <?php endif; ?>
          </div>
        </div>
        <hr>
        <div class="row mx-auto my-3">
          <div class="col-lg-12 col-md-6 col-xs-4">
            <?php echo (!empty($eventPageImg)) ?  '<img class="img-fluid" src="' . URLROOT . '/assets/admin/media/uploadImages/events/' . $eventPageImg . '"/>' : ''; ?>
          </div>
          <div class="col-lg-12 col-md-6 col-xs-4">
            <p> <?php echo $eventPageDetails; ?></p>
          </div>
        </div>
      </div>
    <?php else : ?>
      <div>
        <h5 class="text-center"><?php die('Sorry No Details to display.'); ?> </h5>
      </div>
    <?php endif; ?>
  </section>

  <section class="footer">

  </section>
  <!-- FOOTER -->
</main>
<?php include(APPROOT . '/includes/public/footer.php'); ?>