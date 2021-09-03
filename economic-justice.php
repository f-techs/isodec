<?php require_once('config.php')?>
<?php require_once(APPROOT.'/helpers/pageCount.php'); ?>

<?php include(APPROOT.'/includes/public/header.php'); ?>
<main role="main">
  <!-- Showcase -->
  <section id="page-title-section" class="bg-info text-light p-5 p-lg-0 pt-lg-5  text-center text-sm-start">
    <div class="container page-heading">
      <div class="row">
        <div class="col-md-12 text-left">
              <h2 style="font-weight:bold;">ECONOMIC JUSTICE</h2>
        </div>
      </div>
    </div>
  </section>

  <!--mission vision-->
  <section id="about-content">
  <?php foreach($econsJusticeResults as $data): ?>
    <div class="container mx-auto my-3">
      <div class="row">
      <div class="col-lg-12 col-md-6 col-xs-4">
        <h4 style="font-weight:bold; color: #17A2B8;"><?php echo (!empty($data->title)) ? $data->title:''; ?></h4>
      </div>
      <div class="col-lg-12 col-md-6 col-xs-4">
        <?php if(!empty($data->img)):?>
        <img class="img-fluid" src="<?php echo (!empty($data->img)) ?  URLROOT.'/assets/admin/media/uploads/economic_justice/'.$data->img : ' ' ?> " style="border: 1px solid #ddd; border-radius: 4px; padding: 5px;" height="100%" width="100%"/>
        <?php endif; ?>
        <p style="color:#39A8E8;font-weight: bold;"><?php echo (!empty($data->img_description)) ? $data->img_description : ''; ?></p>
      </div>
      <div class="col-lg-12 col-md-6 col-xs-4">
      <p> <?php echo (!empty($data->details)) ? $data->details : ' ';?></p>
      </div>
    </div><hr>
      </div>
    <?php endforeach; ?>
  </section>
 
  <section class="footer">

  </section>
    <!-- FOOTER -->
</main>
<?php include(APPROOT.'/includes/public/footer.php'); ?>