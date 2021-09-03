<footer class="myfooter mt-5">
  <div class="container py-5">
    <div class="row py-4">
      <div class="col-lg-6 col-md-6 mb-4 mb-lg-0">
        <p style="color:white;"><span class="font-italic">INTEGRATED SOCIAL DEVELOPMENT CENTRE:</span><br>
          Wawa Street, C842/4, Kokomlemle, Accra<br>
          Tel: 233-21-254918/21
        </p>
        <p style="color:white;"><span class="font-italic">Postal Address:</span><br>
          P.O. Box: MP 2989,<br>
          Mamprobi,<br>
          Accra.
        </p>
        <p style="color:white;"><span class="font-italic">Contact Person:</span><br>
          Ernest Tay Awoosah<br>
          Tel: 233-20-8110447
        </p><hr>
        <ul class="list-inline mt-4">
          <?php if(!empty($facebook)): ?>
          <li class="list-inline-item li-social-media" ><a href="<?php echo $facebook; ?>" target="_blank" title="facebook"><i class="footer-social fa fa-facebook"></i></a></li>
          <?php endif; ?>
          <?php if(!empty($youtube)): ?>
          <li class="list-inline-item li-social-media"><a href="<?php echo $youtube; ?>" target="_blank" title="youtube"><i class="footer-social fa fa-youtube"></i></a></li>
          <?php endif; ?>
          <?php if(!empty($instagram)): ?>
          <li class="list-inline-item li-social-media"><a href="<?php echo $instagram; ?>" target="_blank" title="instagram"><i class="footer-social fa fa-instagram"></i></a></li>
          <?php endif; ?>
          <?php if(!empty($twitter)): ?>
          <li class="list-inline-item li-social-media"><a href="<?php echo $twitter; ?>" target="_blank" title="twitter"><i class="footer-social fa fa-twitter"></i></a></li>
          <?php endif; ?>
          <?php if(!empty($skype)): ?>
          <li class="list-inline-item li-social-media"><a href="<?php echo $skype; ?>" target="_blank" title="twitter"><i class="footer-social fa fa-skype"></i></a></li>
          <?php endif; ?>
          <?php if(!empty($linkedIn)): ?>
          <li class="list-inline-item li-social-media"><a href="<?php echo $linkedIn; ?>" target="_blank" title="twitter"><i class="footer-social fa fa-linkedin"></i></a></li>
          <?php endif; ?>
        </ul>
      </div>
      <div class="col-lg-2 col-md-6 mb-4 mb-lg-0">
        <h6 class="text-uppercase font-weight-bold mb-4 footer-main-heading">ABOUT</h6>
        <ul class="list-unstyled mb-0">
          <li class="mb-2"><a href="<?php echo URLROOT ?>/index">Home</a></li>
          <li class="mb-2"><a href="<?php echo URLROOT ?>/mission">Our Mission</a></li>
          <li class="mb-2"><a href="<?php echo URLROOT ?>/history">History</a></li>
          <li class="mb-2"><a href="<?php echo URLROOT ?>/collaboration">Collaboration</a></li>
        </ul>
      </div>
      <div class="col-lg-2 col-md-6 mb-4 mb-lg-0">
        <h6 class="text-uppercase font-weight-bold mb-4 footer-main-heading">PROGRAMMES</h6>
        <ul class="list-unstyled mb-0">
          <li class="mb-2"><a href="<?php echo URLROOT ?>/economic-justice">Economic Justice</a></li>
          <li class="mb-2"><a href="<?php echo URLROOT ?>/policy-support">Policy Support</a></li>
          <li class="mb-2" style="color:white;">Essential Services
         <ul class="list-styled mb-0" style="color:white;">
         <li class="mb-2"><a href="<?php echo URLROOT ?>/service-education">Education</a></li>
         <li class="mb-2"><a href="<?php echo URLROOT ?>/service-water">Health</a></li>
         <li class="mb-2"><a href="<?php echo URLROOT ?>/service-health">Water</a></li>
         </ul>
        </li>
        </ul>
      </div>
      <div class="col-lg-2 col-md-6 mb-4 mb-lg-0">
        <h6 class="text-uppercase font-weight-bold mb-4 footer-main-heading">OTHERS</h6>
        <ul class="list-unstyled mb-0">
          <li class="mb-2"><a href="<?php echo URLROOT ?>/news-list">News</a></li>
          <li class="mb-2"><a href="<?php echo URLROOT ?>/blogs-list">Blogs</a></li>
          <li class="mb-2"><a href="<?php echo URLROOT ?>/documents">Documents</a></li>
          <li class="mb-2"><a href="<?php echo URLROOT ?>/picture-gallery">Pictures</a></li>
          <li class="mb-2"><a href="<?php echo URLROOT ?>/video-gallery">Videos</a></li>
          <li class="mb-2"><a href="<?php echo URLROOT ?>/audios">Audios</a></li>
        <!--  <li class="mb-2"><a href="#">Board</a></li>-->
       <!--   <li class="mb-2"><a href="#">Donate</a></li>-->
        </ul>
      </div>
    </div>
    <div class="row py-4">
        <div class="col-lg-12 text-right">
        <p style="font-size:26px;" class="list-inline-item"><a href="<?php echo URLROOT?>/admin/pages/index.php" target="_blank" title="login"><i class="footer-social fa fa-sign-in"></i></p></li>
        </div>
    </div>
  </div><hr>
  <!-- Copyrights -->
  <div class="py-4">
    <div class="container text-center">
      <p   class="mb-0 py-2" style="color:white;"> © <?php echo date('Y'); ?> INTEGRATED SOCIAL DEVELOPMENT CENTRE. All rights reserved.</p>
    </div>
  </div>
</footer>
<!-- Scripts -->
<script src="<?php echo URLROOT?>/assets/public/js/jquery.js"></script>
<script src="<?php echo URLROOT?>/assets/public/js/plugin/jquery.fancybox.min.js"></script>
<script src="<?php echo URLROOT?>/assets/public/js/popper.min.js"></script>
<script src="<?php echo URLROOT?>/assets/public/js/bootstrap.min.js"></script>
<script src="<?php echo URLROOT?>/assets/public/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo URLROOT?>/assets/public/js/counter.js"></script>
<!-- Just to make our placeholder images work. Don't actually copy the next line!
bootstrap.bundle.min.js
-->
<script src="<?php echo URLROOT?>/assets/public/js/holder.min.js"></script>
<script src="<?php echo URLROOT?>/assets/public/js/plugin/dataTables.min.js"></script>
</body>
</html>