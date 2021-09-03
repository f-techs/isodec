<?php require_once('config.php')?>
<?php require_once(APPROOT.'/helpers/pageCount.php'); ?>

<?php include(APPROOT.'/includes/public/header.php'); ?>
<main role="main">
  <!-- Showcase -->
  <section id="page-title-section" class="bg-info text-light p-5 p-lg-0 pt-lg-5  text-center text-sm-start">
    <div class="container page-heading">
      <div class="row">
        <div class="col-md-12 text-left">
              <h2 style="font-weight:bold;">OUR WORK - <?php echo ucwords($wrkTitle); ?> </h2>
        </div>
      </div>
    </div>
  </section>

  <!--mission vision-->
  <section id="page-content">
    <div class="row container mx-auto my-3">
    <?php if(!empty($wrkId)): ?>
      <div class="col-lg-12 col-md-6 col-xs-4">
      <p> <?php echo $wrkDescription;?></p>
      </div>
      <?php endif; ?>
    </div>
  </section>
    <!-- FOOTER -->
</main>
<?php include(APPROOT.'/includes/public/footer.php'); ?>