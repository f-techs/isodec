
//menu toggle
function toggleDropdown (e) {
    const _d = $(e.target).closest('.dropdown'),
      _m = $('.dropdown-menu', _d);
    setTimeout(function(){
      const shouldOpen = e.type !== 'click' && _d.is(':hover');
      _m.toggleClass('show', shouldOpen);
      _d.toggleClass('show', shouldOpen);
      $('[data-toggle="dropdown"]', _d).attr('aria-expanded', shouldOpen);
    }, e.type === 'mouseleave' ? 80 : 0);
  }
  $('body')
    .on('mouseenter mouseleave','.dropdown',toggleDropdown)
    .on('click', '.dropdown-menu a', toggleDropdown);

    //animate on scroll
  const observer = new IntersectionObserver(entries => {
    entries.forEach(entry => {
      const heading = entry.target.querySelectorAll('.h2');
      for (var i = 0; i < heading.length; i++) {
        
    
      if (entry.isIntersecting) {
        heading[i].classList.add('animate__animated', 'animate__bounceInLeft');
      return; // if we added the class, exit the function
      }
  
      // We're not intersecting, so remove the class!
      heading[i].classList.remove('animate__animated', 'animate__bounceInLeft');
    }
    });
  });
  
  observer.observe(document.querySelector('.message'));