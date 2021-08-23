
<script>
// SSEP - Search Suggestions - from: https://coursesweb.net/ 
// Ajax - Seceives data to send, and a callback function (called when the response is received)
function ajaxSend(datasend, callback) {
  var request =  (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject("Microsoft.XMLHTTP");
  datasend += '&isajax=1';    // to know in php it is ajax request

  request.open('POST', '/ssep/index.php');			// define the request

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
if(document.getElementById('search')) {
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
      if(cache_sugest[src]) src_sugest.innerHTML = cache_sugest[src] +'<div onclick="this.parentNode.innerHTML = \'\';">X</div>';
      else {
        ajaxSend('sugest='+ src, function(resp){
          if(resp.length > 8) {
            if(src_sugest) src_sugest.innerHTML = resp +'<div onclick="this.parentNode.innerHTML = \'\';">X</div>';

            // store sugested in $cache_sugest, keeping 15 caches (delete $src from $sugest_src, and $cache_sugest)
            if(sugest_src.length > 15) delete cache_sugest[sugest_src.shift()];
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

  // called onclick a sugested title. Get and set search phrase
  function getSugest(src_t) {
    src_sugest.innerHTML = '';
    src_frm['sr'].value = src_t.innerHTML.replace(/\<[^\>]*\>/ig, '');    // delete tags
    src_frm.submit();
  }
}
</script>