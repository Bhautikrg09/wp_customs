(function($) {  
    "use strict";  

    //STICKY NAVIGATION
    $(window).scroll(function() {
        if ($(this).scrollTop() > 0) {
            $('header').addClass("sticky");
        } else {
            $('header').removeClass("sticky");
        }
    });
    
    //Go up
    jQuery(window).scroll(function() {
        if (jQuery(this).scrollTop() > 800) {
            jQuery(".go-up").css("bottom", "0px");
        } else {
            jQuery(".go-up").css("bottom", "-50px");
        }
    });
    jQuery(".go-up").click(function() {
        jQuery("html,body").animate({
            scrollTop: 0
        }, 500);
        return false;
    }); 
    
    
    // select arrow color change
    $('select').on('change', function() {
      if ($(this).val()) {
        return $(this).css('color', '#555555');
      } else {
        return $(this).css('color', '#000000');
      }
    });

  //   $(".gallery .gallery-item .gallery-icon a").magnificPopup({
  //       type: "image",
  //       removalDelay: 160,
  //       preloader: false,
  //       fixedContentPos: true,
  //       gallery: {
  //         enabled: true
  //       }
  // });

document.addEventListener("DOMContentLoaded", function () {
    const scrollLinks = document.querySelectorAll('a[href^="#"]:not([href="#"])');
    const header = document.querySelector('.header'); // <-- Adjust to your actual header selector
  
    scrollLinks.forEach(link => {
      link.addEventListener("click", function (e) {
        e.preventDefault();
  
        const targetId = this.getAttribute("href").substring(1);
        const target = document.getElementById(targetId);
  
        if (target) {
          const headerHeight = header ? header.offsetHeight : 0;
          const targetPosition = target.getBoundingClientRect().top + window.pageYOffset;
          const offsetPosition = targetPosition - headerHeight;
  
          window.scrollTo({
            top: offsetPosition,
            behavior: "smooth"
          });
        }
      });
    });
  });
    
})(jQuery);
