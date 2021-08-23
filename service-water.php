<?php require_once('config.php') ?>
<?php require_once(APPROOT.'/helpers/pageCount.php'); ?>
<?php include(APPROOT . '/includes/public/header.php'); ?>
<main role="main">
    <!-- Showcase -->
    <section id="page-title-section" class="bg-info text-light p-5 p-lg-0 pt-lg-5  text-center text-sm-start">
        <div class="container page-heading">
            <div class="row">
                <div class="col-md-12 text-left">
                    <h2 style="font-weight:bold;">WATER</h2>
                </div>
            </div>
        </div>
    </section>

    <!--vision-->
    <section id="page-content">
        <div class="row container mx-auto my-3">
            <?php foreach($sqlWaterResults as $data): ?>
            <div class="col-lg-12 col-sm-12">
                <div class="card bg-white m-b-30" style="width:100%">
                    <div class="card-body">
                        <div class="card-title border-b mb-4">
                            <h5><?php echo $data->post_title; ?></h5><hr>
                        </div>
                        <div class="parapraph">
                            <div>
                            <img class="img-fluid" src="<?php echo URLROOT ?>/assets/admin/media/uploads/services/<?php echo $data->post_img; ?>" style="border: 1px solid #ddd; border-radius: 4px; padding: 5px;"/>
                            <p class="lead"><?php echo $data->img_description; ?></p>
                            </div>
                            <p><?php echo $data->post_details; ?></p>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </section>
    <!-- FOOTER -->
</main>
<?php include(APPROOT . '/includes/public/footer.php'); ?>