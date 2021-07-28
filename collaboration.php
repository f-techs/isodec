<?php require_once('config.php')?>

<?php include(APPROOT.'/includes/public/header.php'); ?>
<main role="main">
  <!-- Showcase -->
  <section id="page-title-section" class="bg-info text-light p-5 p-lg-0 pt-lg-5  text-center text-sm-start">
    <div class="container page-heading">
      <div class="row">
        <div class="col-md-12 text-left">
              <h2 style="font-weight:bold;">COLLABORATION</h2>
        </div>
      </div>
    </div>
  </section>

  <!--mission vision-->
  <section id="page-content">
    <div class="row container mx-auto my-3">
    <?php if(!empty($collaboID)): ?>
      <div class="col-lg-12 col-md-6 col-xs-4">
        <img class="img-fluid" src="<?php echo URLROOT ?>/assets/admin/media/uploadImages/<?php echo $collaboImg ?>" style="border: 1px solid #ddd; border-radius: 4px; padding: 5px;" height="100%" width="100%"/>
        <p style="color:#39A8E8;font-weight: bold;"><?php echo $collaboImgCaption;?></p>
      </div>
      <div class="col-lg-12 col-md-6 col-xs-4">
      <p> <?php echo $collaboDetails;?></p>
      </div>
      <?php endif; ?>
    </div>
  </section>
 
  <section class="footer">

  </section>
    <!-- FOOTER -->
</main>
<?php include(APPROOT.'/includes/public/footer.php'); ?>