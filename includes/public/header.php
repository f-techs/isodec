<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="<?php echo URLROOT; ?>/favicon.ico">

  <title><?php echo SITENAME ?></title>

  <!-- Bootstrap core CSS -->
  <link href="<?php echo URLROOT ?>/assets/public/css/bootstrap/bootstrap.min.css" rel="stylesheet">


  <!-- Custom styles for this template -->
  <link href="<?php echo URLROOT ?>/assets/public/css/style2.css" rel="stylesheet">

  <!-- icons-->
  <link href="<?php echo URLROOT ?>/assets/public/css/css-icons/icons.css" rel="stylesheet">

  <!-- animate styles for this template -->
  <link href="<?php echo URLROOT ?>/assets/public/css/plugins/animate.css" rel="stylesheet">

  <!-- animate styles for this template -->
  <link href="<?php echo URLROOT ?>/assets/public/css/media_queries.css" rel="stylesheet">

  <!-- lightbox-->
  <link href="<?php echo URLROOT ?>/assets/public/css/plugins/lightbox_style.css" rel="stylesheet">

  <!-- lightbox-->
  <link href="<?php echo URLROOT ?>/assets/public/css/plugins/lightbox.css" rel="stylesheet">

  <!--fancyBox-->
  <link href="<?php echo URLROOT ?>/assets/public/css/plugins/jquery.fancybox.min.css" rel="stylesheet">

  <!--dataTables-->
  <link href="<?php echo URLROOT ?>/assets/public/css/plugins/dataTables.min.css" rel="stylesheet">

</head>

<body>

  <header>
    <div class="container container-fluid" style="width:100%">
      <nav class="navbar navbar-expand-lg navbar-light fixed-top" style="box-shadow: 10px;">
        <a class="navbar-brand" href="<?php echo URLROOT ?>/index"><img class="img-fluid" src="<?php echo URLROOT ?>/assets/public/images/brand_logo.png" /></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
          <!--mt-5-->
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="<?php echo URLROOT ?>/index">Home </a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                About Us
              </a>
              <div class="dropdown-menu main-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="<?php echo URLROOT ?>/mission">Our Mission</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="<?php echo URLROOT ?>/history">History</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="<?php echo URLROOT ?>/collaboration">Collaboration</a>
              </div>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Programmes
              </a>
              <div class="dropdown-menu main-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="<?php echo URLROOT ?>/economic-justice">Economic Justice</a>
                <div class="dropdown-divider"></div>
                <div class="dropright">
                  <a class="dropdown-toggle dropdown-item" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Essential Services
                  </a>
                  <div class="dropdown-menu">
                    <a class="dropdown-item" href="<?php echo URLROOT ?>/service-education">Education</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?php echo URLROOT ?>/service-water">Water</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?php echo URLROOT ?>/service-health">Health</a>
                  </div>
                </div>
                <!-- <a class="dropdown-item" href="#">Essential Services</a>-->
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="<?php echo URLROOT ?>/policy-support">Policy Support</a>
              </div>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Blog & News
              </a>
              <div class="dropdown-menu main-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="<?php echo URLROOT ?>/blogs-list">Blog</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="<?php echo URLROOT ?>/news-list">News</a>
              </div>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Media
              </a>
              <div class="dropdown-menu main-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="<?php echo URLROOT ?>/documents">Documents</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="<?php echo URLROOT ?>/video-gallery">Videos</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="<?php echo URLROOT ?>/picture-gallery">Pictures</a>
                <a class="dropdown-item" href="<?php echo URLROOT ?>/audios">Audios</a>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo URLROOT ?>/event-list">Events</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo URLROOT ?>/board-members.php">Board</a>
            </li>
          </ul>
          <!--<ul class="nav navbar-nav navbar-right mr-auto">
            <li class="nav-item"><a href="#"> <i class="mdi mdi-facebook-box"></i></a></li>
            <li class="nav-item"><a href="#"><i class="mdi mdi-twitter-box"></i></a></li>
          </ul>-->
          <!--<form action="ssep/index.php" method="post">
            <div class="row">
              <input type="text" name="sr" class="form-control col-md-8 mr-2" id="ssep_inp" pattern="[A-z0-9\u00C0-\u00FF_ \-]{3,45}" required="required" title="Between 3 and 45 characters: Letters, Numbers, and Space." placeholder="Search" maxlength="45" />
              <span class="icon-input-btn">
                <input type="submit" class="btn btn_news btn-sm  col-md-4" value="Search">
              </span>
            </div>
          </form>-->
        </div>
      </nav>
    </div>

    <script>
      // SSEP - Search Suggestions - from: https://coursesweb.net/ 
      // Ajax - Seceives data to send, and a callback function (called when the response is received)
      function ajaxSend(datasend, callback) {
        var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject("Microsoft.XMLHTTP");
        datasend += '&isajax=1'; // to know in php it is ajax request

        request.open('POST', '/ssep/index.php'); // define the request

        // adds  a header to tell the PHP script to recognize the data as is sent via POST, and send data
        request.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        request.send(datasend);

        // Check request status,  when the response is completely received, pass it to callback function
        request.onreadystatechange = function() {
          if (request.readyState == 4) {
            callback(request.responseText);
          }
        }
      }

      // keyup event on #search
      if (document.getElementById('search')) {
        var src_frm = document.getElementById('search'); // form for search
        if (!document.getElementById('src_sugest')) {
          src_frm.insertAdjacentHTML('beforeend', '<div id="src_sugest"></div>');
          var src_sugest = document.getElementById('src_sugest'); // element for search-suggest
        }
        var cache_sugest = {}; // keep 1st 11 returned sugested
        var sugest_src = []; // store the 'src' keys of sugested in $cache_sugest

        // get string value, if 3+ characters, removes non alpha-numeric-line-space characters
        // call ajax with the string. Add response in Div #src_sugest
        function srcSugest(src) {
          src = src.replace(/([^A-z0-9\u00C0-\u00FF ])/ig, ' ').replace(/( [A-z0-9\u00C0-\u00FF]{1,2} )|(^[A-z0-9\u00C0-\u00FF]{1,2} )|( [A-z0-9\u00C0-\u00FF]{1,2}$)/ig, ' ').replace(/\s\s+/ig, ' ').replace(/^\s+|\s+$/g, '').toLowerCase();

          if (src.length > 2) {
            // if sugested in cache, add it, else, get via ajax
            if (cache_sugest[src]) src_sugest.innerHTML = cache_sugest[src] + '<div onclick="this.parentNode.innerHTML = \'\';">X</div>';
            else {
              ajaxSend('sugest=' + src, function(resp) {
                if (resp.length > 8) {
                  if (src_sugest) src_sugest.innerHTML = resp + '<div onclick="this.parentNode.innerHTML = \'\';">X</div>';

                  // store sugested in $cache_sugest, keeping 15 caches (delete $src from $sugest_src, and $cache_sugest)
                  if (sugest_src.length > 15) delete cache_sugest[sugest_src.shift()];
                  cache_sugest[src] = resp;
                  sugest_src.push(src);
                }
              });
            }
          } else if (src_sugest) src_sugest.innerHTML = '';
        }

        src_frm['sr'].removeEventListener('keyup', function(e) {
          srcSugest(e.target.value);
        }, false);
        src_frm['sr'].addEventListener('keyup', function(e) {
          srcSugest(e.target.value);
        }, false);

        // called onclick a sugested title. Get and set search phrase
        function getSugest(src_t) {
          src_sugest.innerHTML = '';
          src_frm['sr'].value = src_t.innerHTML.replace(/\<[^\>]*\>/ig, ''); // delete tags
          src_frm.submit();
        }
      }
    </script>

  </header>