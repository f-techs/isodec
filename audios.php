<?php require_once('config.php') ?>
<?php require_once(APPROOT.'/helpers/pageCount.php'); ?>

<?php include(APPROOT . '/includes/public/header.php'); ?>
<main role="main">
  <!-- Showcase -->
  <section id="page-title-section" class="bg-info text-light p-5 p-lg-0 pt-lg-5  text-center text-sm-start">
    <div class="container page-heading">
      <div class="row">
        <div class="col-md-12 text-left">
          <h2 style="font-weight:bold;">DOCUMENTS</h2>
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
            <th>Title</th>
            <th>Play</th>
            <th>Download</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($audioResults as $audio) : ?>
            <tr>
              <td>
                <h6><?= $audio->media_title; ?></h6>
              </td>
              <td>
                <audio controls>
                  <source src="<?php echo URLROOT ?>/assets/admin/media/uploads/audio/<?=$audio->file_name?>" type="audio/mpeg" >
                </audio>
              </td>
              <td><a href="<?php echo URLROOT ?>/assets/admin/media/uploads/audio/<?=$audio->file_name?>" target="_blank" class="btn btn-warning btn_download" role="button" aria-pressed="true" download>Download</a></td>
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
      "paging": false,
      "ordering": false,
      "info": false
    });
  });
</script>