<?php require_once('config.php') ?>

<?php include(APPROOT . '/includes/public/header.php'); ?>
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
    <section id="page-content" style="margin-top:20px;">
        <div class="container">
            <table id="tbl_documents" class="display" style="width:100%">
                <thead>
                    <tr>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($sqlAeResults as $e): ?>
                    <tr>
                        <td>
                            <div class="card" style="width:100%;">
                                <div class="row ">
                                    <div class="col-md-4">
                                        <img class="img-fluid" src="<?php echo URLROOT ?>/assets/admin/media/uploads/events/<?php echo (!empty($e->event_img)) ? $e->event_img:'news.png';?>" style="width:100%; height:100%;"/>
                                    </div>
                                    <div class="col-md-8 px-3">
                                        <div class="card-block px-3">
                                            <h4 class="card-title"><?=$e->event_title;?></h4>
                                            <p><?= txtTruncate($e->event_details, 300); ?></p>
                                            <a href="<?php echo URLROOT ?>/events/events?eventid=<?=$e->event_id?>&eventtitle=<?=$e->event_title;?>" class="btn btn_news mb-3">READ MORE<i class="mdi mdi-chevron-double-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach; ?> 
                </tbody>
            </table>
        </div>
    </section>

    <section class="footer">

    </section>
    <!-- FOOTER -->
</main>
<?php include(APPROOT . '/includes/public/footer.php'); ?>
<script type="text/javascript">
    $(document).ready(function() {
        $('#tbl_documents').DataTable({
            // "paging": false,
            "searching": false,
            "pageLenght": 10,
            "bLengthChange": false,
            "ordering": false,
            "info": false
        });
    });
</script>