<?php require_once('config.php') ?>
<?php require_once(APPROOT . '/helpers/pageCount.php'); ?>

<?php include(APPROOT . '/includes/public/header.php'); ?>
<main role="main">
    <!-- Showcase -->
    <section id="page-title-section" class="bg-info text-light p-5 p-lg-0 pt-lg-5  text-center text-sm-start">
        <div class="container page-heading">
            <div class="row">
                <div class="col-md-12 text-left">
                    <h2 style="font-weight:bold;">BOARD MEMBERS</h2>
                </div>
            </div>
        </div>
    </section>

    <!--mission vision-->
    <section id="page-content">
        <?php if (!empty($boardResults)) : ?>
            <?php foreach ($boardResults as $m) : ?>
                <div class="container">
                    <div class="row mt-5">
                        <div class="col-md-2"></div>
                        <div class="col-md-8">
                            <h5 style="color:#39A8E8; font-weight: bold;"><?php echo $m->title_name . ' ' . $m->firstname . ' ' . $m->othernames; ?></h5>
                            <h6 style="font-weight: bold;"><?php echo $m->profile; ?></h6>
                            <p><?php echo $m->email; ?></p>
                            <p><span class="badge" style="background-color:#FBBB07;"><?php echo $m->position_name; ?></span></p>
                        </div>
                        <div class="col-md-2"></div>
                    </div><hr>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </section>
    <!-- FOOTER -->
</main>
<?php include(APPROOT . '/includes/public/footer.php'); ?>
<?php echo $m->title_name . ' ' . $m->firstname . ' ' . $m->othernames; ?>