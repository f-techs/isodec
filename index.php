<?php require_once('config.php') ?>

<?php include(APPROOT . '/includes/public/header.php'); ?>
<main role="main">
  <!-- Showcase -->
  <section id="showcase" class="bg-info text-light p-5 p-lg-0 pt-lg-5  text-center text-sm-start">
    <div class="container showcase-items">
      <div class="d-sm-flex align-items-center justify-content-between">
        <div class="col-md-6 text-left">
          <div class="lead mb-5">
            <p>
            <h1 class="font-weight-bold">Promoting of Human Rights and Social Justice for all.</h1>
            </p>
          </div>
          <div>
            <button class="lead_btn  btn-lg btn-flat">
              Read More <i class="mdi mdi-chevron-double-right"></i>
            </button>
          </div>
        </div>
        <div class="col-md-6">
          <img class="img-fluid w-100 d-none d-sm-block" src="<?php echo URLROOT ?>/assets/public/images/freedom.png" alt="" />
        </div>
      </div>
    </div>
  </section>

  <!--mission vision-->
  <section id="mision_vision">
    <div class="container mision_vision_details ">
      <div class="row details">
        <div class="col-lg-4 border-right animate-header p-5">
          <h2 class="h2">Our Mission</h2>
          <p class="animate__animated animate__fadeInLeft">Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Praesent commodo cursus magna.</p>
        </div>
        <div class="col-lg-4 border-right animate-header p-5">
          <h2 class="h2">Our Vision</h2>
          <p class="animate__animated animate__fadeInUp">Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh.</p>
        </div>
        <div class="col-lg-4 animate-header p-5">
          <h2 class="h2">Our Values</h2>
          <p class="animate__animated animate__fadeInRight">Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
        </div>
      </div>
    </div>
  </section>
  <div class="m-3 text-center">
    <h4>Our Work</h4>
  </div>
  <!-- our work-->
  <section id="our-work">
    <div class="row m-5">
      <div class="col-lg-4">
        <div class="box-part text-center">
          <div class="title">
            <h4>Main Component Title</h4>
          </div>
          <div class="text">
            <span>Lorem ipsum dolor sit amet, id quo eruditi eloquentiam. Assum decore te sed. Elitr scripta ocurreret qui ad.</span>
          </div>
          <a href="#" class="card-link btn">Read More</a>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="box-part text-center">
          <div class="title">
            <h4>Main Component Title</h4>
          </div>
          <div class="text">
            <span>Lorem ipsum dolor sit amet, id quo eruditi eloquentiam. Assum decore te sed. Elitr scripta ocurreret qui ad.</span>
          </div>
          <a href="#" class="card-link btn">Read More</a>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="box-part text-center">
          <div class="title">
            <h4>Main Component Title</h4>
          </div>
          <div class="text">
            <span>Lorem ipsum dolor sit amet, id quo eruditi eloquentiam. AssumLorem ipsum dolor sit amet, id quo eruditi eloquentiam. Assum deco decore te sed. Elitr scripta ocurreret qui ad.</span>
          </div>
          <a href="#" class="card-link btn">Read More</a>
        </div>
      </div>
    </div>
  </section>
  <div class="m-3 text-center">
    <h4>Latest Events</h4>
  </div>
  <!-- Events-->
  <section id="events-cards">
    <div class="row m-5">
    <?php foreach ($sqlLeResults as $e) : ?>
      <div class="col-lg-4 mb-5">
        <div class="card">
          <div class="card-header">
            <img src="<?php echo URLROOT ?>/assets/admin/media/uploadImages/events/<?php echo $e->event_img; ?>" alt="" />
          </div>
          <div class="card-body">
            <span class="tag tag-teal"><?=$e->event_type_name; ?></span>
            <h4><a class="tag-link" href="<?php echo URLROOT ?>/events/events?eventid=<?=$e->event_id?>&eventtitle=<?=$e->event_title;?>"><?= $e->event_title; ?></a></h4>
            <p>
            <?= txtTruncate($e->event_details, 50); ?>
            </p>
            <div class="mt-2 my-2"><a class="btn_news" href="<?php echo URLROOT ?>/events/events?eventid=<?=$e->event_id?>&eventtitle=<?=$e->event_title;?>">READ MORE<i class="mdi mdi-chevron-double-right"></i></a></div>
            <div class="user">
              <!-- <img src="https://upload.wikimedia.org/wikipedia/commons/4/48/Outdoors-man-portrait_%28cropped%29.jpg" alt="" />-->
              <div class="user-info">
                <small><i class="mdi mdi-calendar-check"></i> <?php echo date('d-M-Y', strtotime($e->event_date));  ?> </small>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </section>
  <section id="blogs_events">
    <div class="row">
      <div class="col-lg-6">
        <div class="container">
          <div class="row" id="tab-menus">
            <div class="col-12">
              <h2 class="text-center mt-4 mb-5">BLOGS</h2>
              <!-- Tabs navs -->
              <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active" data-toggle="tab" href="#lastestBlogs"> LATEST BLOGS</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" data-toggle="tab" href="#allBlogs"> ALL BLOGS</a>
                </li>
              </ul>
              <!-- Tabs Content -->
              <div class="tab-content">
                <div id="lastestBlogs" class="tab-pane active">
                  <?php foreach ($sqlblogLResults as $b) : ?>
                    <div class="card my-3" style="width:100%;">
                      <div class="row ">
                        <div class="col-md-12 m-3 ">
                          <div class="card-block px-3 my-3">
                            <h5 class="card-title"><?= $b->blog_title; ?></h5>
                            <a class="btn_news" href="<?php echo URLROOT ?>/blogs/blogs?blogid=<?=$b->blog_id?>&blogtitle=<?=$b->blog_title;?>"><i class="mdi mdi-calendar-check"></i> <?php echo date('d-M-Y', strtotime($b->created_date));  ?> | READ<i class="mdi mdi-chevron-double-right"></i></a>
                          </div>
                        </div>
                      </div>
                    </div>
                  <?php endforeach; ?>
                </div>
                <div id="allBlogs" class="tab-pane">
                  <?php foreach ($blogListResults as $b) : ?>
                    <div class="card my-3" style="width:100%;">
                      <div class="row ">
                        <div class="col-md-12 m-3 ">
                          <div class="card-block px-3 my-3">
                            <h5 class="card-title"><?= $b->blog_title; ?></h5>
                            <a class="btn_news" href="<?php echo URLROOT ?>/blogs/blogs?blogid=<?=$b->blog_id?>&blogtitle=<?=$b->blog_title;?>"><i class="mdi mdi-calendar-check"></i> <?php echo date('d-M-Y', strtotime($b->created_date));  ?> | READ<i class="mdi mdi-chevron-double-right"></i></a>
                          </div>
                        </div>
                      </div>
                    </div>
                  <?php endforeach; ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-6">
        <div class="container">
          <div class="row" id="tab-menus">
            <div class="col-12">
              <h2 class="text-center mt-4 mb-5">EVENTS</h2>
              <!-- Tabs navs -->
              <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active" data-toggle="tab" href="#upcomingEvents"> UPCOMING EVENTS</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" data-toggle="tab" href="#recentEvents"> RECENT EVENTS</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" data-toggle="tab" href="#allEvents"> ALL EVENTS</a>
                </li>

              </ul>
              <!-- Tabs Content -->
              <div class="tab-content">
                <div id="upcomingEvents" class="tab-pane active">
                <?php foreach ($sqlUeResults as $e) : ?>
                    <div class="card my-3" style="width:100%;">
                      <div class="row ">
                        <div class="col-md-12 m-3 ">
                          <div class="card-block px-3 my-3">
                            <h5 class="card-title"><?= $e->event_title; ?></h5>
                            <a class="btn_news" href="<?php echo URLROOT ?>/events/events?eventid=<?=$e->event_id?>&eventtitle=<?=$e->event_title;?>"><i class="mdi mdi-calendar-check"></i> <?php echo date('d-M-Y', strtotime($e->event_date));  ?> | READ<i class="mdi mdi-chevron-double-right"></i></a>
                          </div>
                        </div>
                      </div>
                    </div>
                  <?php endforeach; ?>
                </div>
                <div id="recentEvents" class="tab-pane">
                <?php foreach ($sqlLeResults as $e) : ?>
                    <div class="card my-3" style="width:100%;">
                      <div class="row ">
                        <div class="col-md-12 m-3 ">
                          <div class="card-block px-3 my-3">
                            <h5 class="card-title"><?= $e->event_title; ?></h5>
                            <a class="btn_news" href="<?php echo URLROOT ?>/events/events?eventid=<?=$e->event_id?>&eventtitle=<?=$e->event_title;?>"><i class="mdi mdi-calendar-check"></i> <?php echo date('d-M-Y', strtotime($e->event_date));  ?> | READ<i class="mdi mdi-chevron-double-right"></i></a>
                          </div>
                        </div>
                      </div>
                    </div>
                  <?php endforeach; ?>
                </div>
                <div id="allEvents" class="tab-pane">
                <?php foreach ($sqlAeResults as $e) : ?>
                    <div class="card my-3" style="width:100%;">
                      <div class="row ">
                        <div class="col-md-12 m-3 ">
                          <div class="card-block px-3 my-3">
                            <h5 class="card-title"><?= $e->event_title; ?></h5>
                            <a class="btn_news" href="<?php echo URLROOT ?>/events/events?eventid=<?=$e->event_id?>&eventtitle=<?=$e->event_title;?>"><i class="mdi mdi-calendar-check"></i> <?php echo date('d-M-Y', strtotime($e->event_date));  ?> | READ<i class="mdi mdi-chevron-double-right"></i></a>
                          </div>
                        </div>
                      </div>
                    </div>
                  <?php endforeach; ?>
                  <!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-TTVBW8Z"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- FOOTER -->
</main>
<?php include(APPROOT . '/includes/public/footer.php'); ?>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-JBWKQM0CNN"></script>
