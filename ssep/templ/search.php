<?php require_once('../../config.php') ?>
<?php include(APPROOT . '/includes/public/header.php'); ?>
<!doctype html>
<html lang="{$lang}">
<head>
<meta charset="utf-8" />
<title>{$title}</title>
<base href="//{$base}" />
<meta name="description" content="{$description}" />
<meta name="keywords" content="{$keywords}" />
<meta name="author" content="MarPlo" />
<link rel="stylesheet" media="only screen and (max-width: 400px)" href="templ/search_style_mobile.css" />
<link rel="stylesheet" media="only screen and (min-width: 401px)" href="templ/search_style.css" />
</head>
<body>
<h1>{$title}</h1>
<section id="p_content">
 <article id="ssep_results">{$search_results}</article>
 <strong id="keyw">{$ssep_results_for}: {$keywords}</strong>
</section>
<footer id="footer">
  
</footer>
<script>
// SSEP - Site Search Engine PHP-Ajax - http://coursesweb.net/
var ssep_pg = '{$ssep_pg}';   // address of the php page for ajax
var nr_suggest = '{$nr_suggest}' * 1;   // number of rows with suggestions; if 0, not register keyup for suggestions
var get_sr = document.querySelector('title').innerHTML;
var pgi_type = '{$pgi_type}';    // type of pagination

    /* AJAX FUNCTION */

// receives data to send, and a callback function (called when the response is received)
var can_ajax = 1;
function ajaxSend(datasend, go_top, callback) {
  can_ajax = 0;
  var request =  (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject("Microsoft.XMLHTTP");      // sets the XMLHttpRequest instance
  datasend += '&isajax=1';    // to know in php it is ajax request

  // if 'go_top' 1, scroll to top, add item loading
  if(go_top == 1) {
    scrollTo(0,0);
    if(!document.getElementById('show_loading')) document.getElementById('p_content').insertAdjacentHTML('beforeend', '<div id="show_loading"><span onclick="this.parentNode.style.display = \'none\';">[X]</span></div>');
    else document.getElementById('show_loading').style.display = 'block';
  }

  request.open("POST", ssep_pg);			// define the request

  // adds  a header to tell the PHP script to recognize the data as is sent via POST, and send data
  request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  request.send(datasend);

  // Check request status,  when the response is completely received pass it to callback function
  request.onreadystatechange = function() {
    if (request.readyState == 4) {
/// alert(request.responseText);  // debug
      callback(request.responseText);
      if(document.getElementById('show_loading')) document.getElementById('show_loading').style.display = 'none';   // hides loading
      can_ajax = 1;
    }
  }
}

// get search results for "get_sr", via ajax, add in html elements
function getSetAjaxRe() {
  ajaxSend('sr='+ encodeURIComponent(get_sr), 1, function(resp){
    document.getElementById('ssep_results').innerHTML = resp;
    document.querySelector('title').innerHTML = get_sr;
    document.querySelector('h1').innerHTML = get_sr;
    if(document.getElementById('keyw')) document.getElementById('keyw').innerHTML = '{$ssep_results_for}: '+ get_sr.replace(/^[^ ]{1,2} | [^ ]{1,2} | [^ ]{1,2}$/i, ' ').replace(/ /g, ', ');
    if(src_sugest) src_sugest.innerHTML = '';    // html with sugested search title
    (pgi_type == 'infinite') ? pgiInfinite() : pgiStandard();    // to register pagination function
  });
}
/* END */

    /* CODE FOR MENU SEARCH LINKS */

// if not <a> in #ssep_menu, add Ajax to menu, and search form
if(document.getElementById('ssep_results') && document.querySelectorAll('#ssep_menu ol li a').length == 0) {
  var ssep_list = document.querySelectorAll('#ssep_menu ol li');     // gets ".srclnk" items
  var nr_src = ssep_list.length;         // number of elements in ssep_list

  // traverse the ssep_list object, and register "onclick" to submit search form
  if(nr_src > 0) {
    for(var i=0; i<nr_src; i++) {
      ssep_list[i].addEventListener('click', function(){
        get_sr = this.title;
        if(can_ajax == 1) getSetAjaxRe();
      }, false);
    }
  }

  // submit event for search form
  document.getElementById('search').addEventListener('submit', function(e){
    e.preventDefault();
    get_sr = document.getElementById('ssep_inp').value;
    getSetAjaxRe();
    return false;
  }, false);
}
/* END */

    /* CODE FOR PAGINATION */

var pgi_pages = {};    // will store items: '.pgi_pages span'

  /* Standard Pagination */
if(pgi_type == 'standard') {
  function pgiStandard() {
    pgi_pages = document.querySelectorAll('.pgi_pages span');
    nr_pgs = pgi_pages.length;
    if(nr_pgs > 0) {
      for(var i=0; i<nr_pgs; i++) {
        pgi_pages[i].addEventListener('click', function(){
          if(can_ajax == 1) {
            var pgi = this.title;
            ajaxSend('sr='+ encodeURIComponent(get_sr) +'&pgi='+ this.title, 1, function(resp){
              document.getElementById('ssep_results').innerHTML = resp;
              document.querySelector('h1').innerHTML = get_sr + ((pgi > 1 ) ? ' - '+ pgi : '');
              pgiStandard();
            });
          }
        }, false);
      }
    }
  }
  pgiStandard();
}
  /* End Standard Pagination */

  /* Infinite Pagination */
if(pgi_type == 'infinite') {
  var pgi_ix = [];    // store all indexes from pagination buttons
  var pgi = [];    // store indexes of next page
  var call_ajax = 1;      // if 0, not call Ajax

  // sets indexes with number of paginations, to pass to "pgi"
  function pgiInfinite() {
    pgi_ix = [];
    pgi = [];
    pgi_pages = document.querySelectorAll('.pgi_pages span');
    nr_pgs = pgi_pages.length;
    if(nr_pgs > 0) {
      // gets and add each index to $pgi_ix
      var last_pg = pgi_pages[nr_pgs - 1].title;    // index of last page
      for(var i=0; i<=last_pg; i++) {
        if(i == 1 || pgi == i) continue;     // pass over index-pagination of current page
        else pgi_ix.push(i);
      }
      var all_pgi = document.querySelectorAll('.pgi_pages');
      for(var i=0; i<all_pgi.length; i++) all_pgi[i].style.display = 'none';     // hides links-pagination
    }
  }


  // function to add next paginated games, when scroollbar reaches the bottom of page
  function getPgiPage() {
    // get index-order of pgi in $pgi_ix
    if(call_ajax == 1 && pgi_ix.length > 0) {
      pgi = pgi_ix.shift();    // gets and removes 1st index from $pgi_ix

      // calls ajax function, add response page, deleting pagination items from response
      call_ajax = 0;
      ajaxSend('sr='+ encodeURIComponent(get_sr) +'&pgi='+ pgi, 0, function(resp){
        resp = '<hr class="hr_pg">'+ resp.replace(/\<div class="pgi_pages"\>(.*?)\<\/div\>/ig, '');
        document.getElementById('ssep_results').insertAdjacentHTML('beforeend', resp);
        setTimeout(function(){call_ajax = 1;}, 1500);
      });
    }
  }
  pgiInfinite();
}
  /* End Infinite Pagination */
/* END */

    /* CODE TO REGISTER SCROLLING */

// returns an array with height and width of the window
function getBrowsSize() {
	var brows_size = new Array;
	if (self.innerHeight) {
		brows_size['heigh'] = self.innerHeight;
		brows_size['width'] = self.innerWidth;
	} else if (document.documentElement && document.documentElement.clientHeight) {
		brows_size['heigh'] = document.documentElement.clientHeight;
		brows_size['width'] = document.documentElement.Width;
	} else if (document.body) {
		brows_size['heigh'] = document.body.clientHeight;
		brows_size['width'] = document.body.clientWidth;
	}
	return brows_size;
}
var brows_size = getBrowsSize();

// function to get scrollbar vertical position
function scrollY() {
  return window.pageYOffset ? window.pageYOffset : document.documentElement.scrollTop ? document.documentElement.scrollTop : document.body.scrollTop;
}

// function for register event on scroll window
function onScrollWin() {
  // if exists in page the #mp element (in footer)
  if(document.getElementById('mp')) {
    window.onscroll = function() {
    var scrl_pos = scrollY();                // get vertical scrollbar position

     // Calls function for vertical pagination
     if(pgi_type == 'infinite' && call_ajax == 1 && document.body.scrollHeight < (scrl_pos + (brows_size['heigh'] * 2.18))) getPgiPage();

     // if vertical scroll position is more then brows_size['heigh'], and no element '#scrtop'
     // add button to scroll to Top of the page as child element in #mp (menu in footer)
     // else, if vertical scroll position is less then brows_size['heigh'], and element '#scrtop'
     // remove button to scroll to Top of the page
     if(scrl_pos > (brows_size['heigh'] - brows_size['heigh']/2) && !document.getElementById('scrtop')) {
       document.getElementById('mp').innerHTML += '<div id="scrtop" onclick="window.scrollTo(0,0)"></div>';
     }
     else if(scrl_pos < (brows_size['heigh'] - brows_size['heigh']/2) && document.getElementById('scrtop')) {
       document.getElementById('mp').removeChild(document.getElementById('scrtop'));
     }
   }
 }
}
onScrollWin();
/* END */

    /* START SEARCH SUGEST */

// keyup event on #search
if(document.getElementById('search') && nr_suggest > 0) {
  var src_frm = document.getElementById('search');    // form for search
  if(!document.getElementById('src_sugest')) {
    src_frm.insertAdjacentHTML('beforeend', '<div id="src_sugest"></div>');
    var src_sugest = document.getElementById('src_sugest');    // element for search-suggest
  }
  var cache_sugest = {};    // keep 1st 11 returned sugested
  var sugest_src = [];    // store the 'src' keys of sugested in $cache_sugest

  // get string value, if 3+ characters, removes non alpha-numeric-line-space characters
  // call ajax with the string. Add response in Div #src_sugest
  function srcSugest(src) {
    src = src.replace(/([^A-z0-9\u00C0-\u00FF ])/ig, ' ').replace(/( [A-z0-9\u00C0-\u00FF]{1,2} )|(^[A-z0-9\u00C0-\u00FF]{1,2} )|( [A-z0-9\u00C0-\u00FF]{1,2}$)/ig, ' ').replace(/\s\s+/ig, ' ').replace(/^\s+|\s+$/g, '').toLowerCase();

    if(src.length > 2) {
      // if sugested in cache, add it, else, get via ajax
      if(cache_sugest[src]) document.getElementById('src_sugest').innerHTML = cache_sugest[src] +'<div onclick="this.parentNode.innerHTML = \'\';">X</div>';
      else {
        ajaxSend('sugest='+ src, 0, function(resp){
          if(resp.length > 8) {
            if(src_sugest) src_sugest.innerHTML = resp +'<div onclick="this.parentNode.innerHTML = \'\';">X</div>';

            // store sugested in $cache_sugest, keeping 20 caches (delete $src from $sugest_src, and $cache_sugest)
            if(sugest_src.length > 20) delete cache_sugest[sugest_src.shift()];
            cache_sugest[src] = resp;
            sugest_src.push(src);
          }
        });
      }
    }
    else if(src_sugest) src_sugest.innerHTML = '';
  }

  src_frm['sr'].removeEventListener('keyup', function(e){srcSugest(e.target.value);}, false);
  src_frm['sr'].addEventListener('keyup', function(e){srcSugest(e.target.value);}, false);

  // called onclick a sugested title. Get and set search phrase, get search-results with getSetAjaxRe(), clear src_sugest and 'sr' input
  function getSugest(src_t) {
    src_sugest.innerHTML = '';
    get_sr = src_t.innerHTML.replace(/\<[^\>]*\>/ig, '');    // delete tags
    getSetAjaxRe();
    src_frm['sr'].value = '';
  }
}
</script>
</body>
</html>