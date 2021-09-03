<?php require_once('config.php') ?>
<?php require_once(APPROOT.'/helpers/pageCount.php'); ?>
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
           <a href="<?php echo URLROOT ?>/mission"> <button class="lead_btn  btn-lg btn-flat">
              Read More <i class="mdi mdi-chevron-double-right"></i>
            </button></a>
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
        <?php if (!empty($messageID)) : ?>
          <div class="col-lg-4 border-right animate-header p-5">
            <h2 class="h2">Our Mission</h2>
            <div class="animate__animated animate__fadeInLeft"><p><?php echo $missionMessage; ?></p></div>
          </div>
          <div class="col-lg-4 border-right animate-header p-5">
            <h2 class="h2">Our Vision</h2>
            <div class="animate__animated animate__fadeInUp"><p><?php echo $visionMessage; ?></p></div>
          </div>
          <div class="col-lg-4 animate-header p-5">
            <h2 class="h2">Our Values</h2>
            <div class="animate__animated animate__fadeInRight"><p><?php echo $isodecValues; ?></p></div>
          </div>
        <?php endif; ?>
      </div>
    </div>
  </section>
  <div class="m-3 text-center">
    <h4 style="font-weight:bold; color: #17A2B8;">Our Work</h4>
  </div>
  <!-- our work-->
  <section id="our-work">
    <div class="row m-5">
      <?php foreach ($sqlOwResults as $data) : ?>
        <div class="col-lg-4">
          <div class="box-part">
            <div class="title mx-3" >
              <h4 style="font-weight:bold; color: #17A2B8;"><?php echo ucwords($data->our_work_title); ?></h4>
            </div>
            <div class="text mx-3">
              <span><?php echo txtTruncate($data->our_work_description, 200); ?> <a href="<?php echo URLROOT ?>/our-work?q=<?php echo $data->our_work_id; ?>" style="color:#E19822;">Read More</a></span>
            </div>
            <!--<a href="#" class="card-link btn">Read More</a>-->
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </section>
  <div class="m-3 text-center">
    <h4 style="font-weight:bold; color: #17A2B8;">Latest Events</h4>
  </div>
  <!-- Events-->
  <section id="events-cards">
    <div class="row m-5">
      <?php foreach ($sqlLeResults as $e) : ?>
        <div class="col-lg-4 mb-5">
          <div class="card">
            <div class="card-header">
              <img src="<?php echo URLROOT ?>/assets/admin/media/uploads/events/<?php echo $e->event_img; ?>" alt="" />
            </div>
            <div class="card-body">
              <span class="tag tag-teal"><?= $e->event_type_name; ?></span>
              <h4><a class="tag-link" href="<?php echo URLROOT ?>/events/events?eventid=<?= $e->event_id ?>&eventtitle=<?= $e->event_title; ?>"><?= $e->event_title; ?></a></h4>
              <p>
                <?= txtTruncate($e->event_details, 50); ?>
              </p>
              <div class="mt-2 my-2"><a class="btn_news" href="<?php echo URLROOT ?>/events/events?eventid=<?= $e->event_id ?>&eventtitle=<?= $e->event_title; ?>">READ MORE<i class="mdi mdi-chevron-double-right"></i></a></div>
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
              <h2 class="text-center mt-4 mb-5" style="font-weight:bold; color: #17A2B8;">BLOGS</h2>
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
                            <a class="btn_news" href="<?php echo URLROOT ?>/blogs/blogs?blogid=<?= $b->blog_id ?>&blogtitle=<?= $b->blog_title; ?>"><i class="mdi mdi-calendar-check"></i> <?php echo date('d-M-Y', strtotime($b->created_date));  ?> | READ<i class="mdi mdi-chevron-double-right"></i></a>
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
                            <a class="btn_news" href="<?php echo URLROOT ?>/blogs/blogs?blogid=<?= $b->blog_id ?>&blogtitle=<?= $b->blog_title; ?>"><i class="mdi mdi-calendar-check"></i> <?php echo date('d-M-Y', strtotime($b->created_date));  ?> | READ<i class="mdi mdi-chevron-double-right"></i></a>
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
              <h2 class="text-center mt-4 mb-5" style="font-weight:bold; color: #17A2B8;">EVENTS</h2>
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
                            <a class="btn_news" href="<?php echo URLROOT ?>/events/events?eventid=<?= $e->event_id ?>&eventtitle=<?= $e->event_title; ?>"><i class="mdi mdi-calendar-check"></i> <?php echo date('d-M-Y', strtotime($e->event_date));  ?> | READ<i class="mdi mdi-chevron-double-right"></i></a>
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
                            <a class="btn_news" href="<?php echo URLROOT ?>/events/events?eventid=<?= $e->event_id ?>&eventtitle=<?= $e->event_title; ?>"><i class="mdi mdi-calendar-check"></i> <?php echo date('d-M-Y', strtotime($e->event_date));  ?> | READ<i class="mdi mdi-chevron-double-right"></i></a>
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
                            <a class="btn_news" href="<?php echo URLROOT ?>/events/events?eventid=<?= $e->event_id ?>&eventtitle=<?= $e->event_title; ?>"><i class="mdi mdi-calendar-check"></i> <?php echo date('d-M-Y', strtotime($e->event_date));  ?> | READ<i class="mdi mdi-chevron-double-right"></i></a>
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
    </div>
  </section>
  <div class="m-3 text-center">
    <h4 style="font-weight:bold; color: #17A2B8;">OFFICES AND PROJECTS LOCATIONS</h4>
  </div>
  <hr>
  <section>
    <div class="container">
      <div id="mapCanvas" class="mb-5">
      </div>
      <div class="row text-center">
        <div class="col-md-2">
          
        </div>
        <div class="col-md-10">

        </div>
      </div>
    </div>
  </section>
  <!-- FOOTER -->
</main>
<?php include(APPROOT . '/includes/public/footer.php'); ?>
<script>
</script>
<script>
  function initMap() {
    var map;
    var bounds = new google.maps.LatLngBounds();
    var mapOptions = {
      mapTypeId: 'roadmap'
    };

    // Display a map on the web page
    map = new google.maps.Map(document.getElementById("mapCanvas"), mapOptions);
    map.setTilt(100);

    // Multiple markers location, latitude, and longitude
    var markers = [
      <?php if ($checkRow > 0) {
        foreach ($locationsResults as $data) {
          echo '["' . $data->location_type_name . '", ' . $data->latitude . ', ' . $data->longitude . ', "' . $data->icon . '"],';
        }
      }
      ?>
    ];

    // Info window content
    var infoWindowContent = [
      <?php if ($checkRow > 0) {
        foreach ($locationsResults as $data) { ?>['<div class="info_content">' +
            '<h6><?php echo $data->location_type_name; ?></h6>' +
            '<p><?php echo  json_encode($data->address); ?></p>' + '</div>'],
      <?php }
      }
      ?>
    ];;

    // Add multiple markers to map
    var infoWindow = new google.maps.InfoWindow(),
      marker, i;

    // Place each marker on the map  
    for (i = 0; i < markers.length; i++) {
      var position = new google.maps.LatLng(markers[i][1], markers[i][2]);
      bounds.extend(position);
      marker = new google.maps.Marker({
        position: position,
        map: map,
        icon: markers[i][3],
        title: markers[i][0]
      });

      // Add info window to marker    
      google.maps.event.addListener(marker, 'click', (function(marker, i) {
        return function() {
          infoWindow.setContent(infoWindowContent[i][0]);
          infoWindow.open(map, marker);
        }
      })(marker, i));

      // Center the map to fit all markers on the screen
      map.fitBounds(bounds);
    }

    // Set zoom level
    var boundsListener = google.maps.event.addListener((map), 'bounds_changed', function(event) {
      this.setZoom(6.5);
      google.maps.event.removeListener(boundsListener);
    });
  }

  // Load initialize function
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDK7RbtNChw3hQZb3o5bpl5oB08DpNGubE&callback=initMap" async defer></script>