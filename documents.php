<?php require_once('config.php') ?>
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
            <th>Document Title</th>
            <th>View/Download</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach($docResults as $doc): ?>
          <tr>
            <td>
              <h6><?= $doc->media_title; ?></h6>
            </td>
            <td><a href="<?php echo URLROOT ?>/assets/admin/media/uploads/document/<?=$doc->file_name?>" class="btn btn-info" role="button" aria-pressed="true">View/Download</a></td>
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
       "info": false,
       responsive: true
    });
  });
</script>