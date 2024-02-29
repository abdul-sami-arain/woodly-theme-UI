Splitting();
ScrollOut({
    targets: '[data-splitting]'
});

 const globalobserver = new IntersectionObserver((entries) => {
                entries.forEach((entry) => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('global-animated-show');
                    } else {
                        entry.target.classList.remove('global-animated-show');
                    }

                });


            });

            const globalhiddenElements = document.querySelectorAll('.global-animated-hidden');
            globalhiddenElements.forEach((el) => globalobserver.observe(el))



var swiperasasas = new Swiper(".woodly_related_post", {
    slidesPerView: 3,
    loop: true,
    spaceBetween: 20,
    navigation: {
        nextEl: ".swiper-related-button-nexts",
        prevEl: ".swiper-related-button-prevs",
    },
    autoplay:true,
    centeredSlides: true,
    breakpoints: {
        // when window width is >= 320px
        320: {
            slidesPerView: 1,
            spaceBetween: 0
        },
        // when window width is >= 480px
        480: {
            slidesPerView: 1,
            spaceBetween: 0
        },
        // when window width is >= 640px
        640: {
            slidesPerView: 2,
            spaceBetween: 20
        },
        800: {
            slidesPerView: 3,
            spaceBetween: 30
        },
        991: {
            slidesPerView: 3,
            spaceBetween: 30
        }
    }
});
jQuery(document).ready(function ($) {
    $(window).scroll(function () {
        50 < $(this).scrollTop() ? $("#back-to-top").fadeIn() : $("#back-to-top").fadeOut();
    }),
        $("#back-to-top").click(function () {
            return $("body,html").animate({scrollTop: 0}, 800), !1;
        })

});

jQuery(document).ready(function($) {
var topbtn = $('#back-to-top-button');


topbtn.on('click', function(e) {
  e.preventDefault();
  $('html, body').animate({scrollTop:0}, '300');
});


}); 
//Scroll back to top

(function($) { "use strict";

	$(document).ready(function(){"use strict";
		 
     
		var progressPath = document.querySelector('.progress-wrap path');
		if(progressPath) {
		var pathLength = progressPath.getTotalLength();
		progressPath.style.transition = progressPath.style.WebkitTransition = 'none';
		progressPath.style.strokeDasharray = pathLength + ' ' + pathLength;
		progressPath.style.strokeDashoffset = pathLength;
		progressPath.getBoundingClientRect();
		progressPath.style.transition = progressPath.style.WebkitTransition = 'stroke-dashoffset 10ms linear';		
		var updateProgress = function () {
			var scroll = $(window).scrollTop();
			var height = $(document).height() - $(window).height();
			var progress = pathLength - (scroll * pathLength / height);
			progressPath.style.strokeDashoffset = progress;
		}
		updateProgress();
		$(window).scroll(updateProgress);	
		var offset = 50;
		var duration = 550;
		jQuery(window).on('scroll', function() {
			if (jQuery(this).scrollTop() > offset) {
				jQuery('.progress-wrap').addClass('active-progress');
			} else {
				jQuery('.progress-wrap').removeClass('active-progress');
			}
		});				
		jQuery('.progress-wrap').on('click', function(event) {
			event.preventDefault();
			jQuery('html, body').animate({scrollTop: 0}, duration);
			return false;
		})
    }
		
	});
	
})(jQuery); 

jQuery(document).ready(function ($) {
    $('body').on('click', '.woodly-product-toogle-btn', function () {
        if ($(".woodly-filter-toogle-box").is(":hidden")) {
            $(".woodly-filter-toogle-box").slideDown("slow");
        } else {
            $(".woodly-filter-toogle-box").slideUp();
        }
    });
});

jQuery(document).ready(function ($) {
      $("#mayosis-sidemenu li.has-sub>a").on("click", function () {
   $(this).removeAttr("href");
     var z = $(this).parent("li");
             z.hasClass("open")
                   ? (z.removeClass("open"), z.find("li").removeClass("open"), z.find("ul").slideUp())
                : (z.addClass("open"),
              z.children("ul").slideDown(),
              z.siblings("li").children("ul").slideUp(),
                z.siblings("li").removeClass("open"),
                 z.siblings("li").find("ul").slideUp());
            }),
                $("#mayosis-sidemenu>ul>li.has-sub>a").append('<span class="holder"></span>');
       })
        

    
    !(function (t) {
    "use strict";

    t(".burger, .overlaymobile").click(function () {
        t(".burger").toggleClass("clicked"), t(".overlaymobile").toggleClass("show"), t(".mobile--nav-menu").toggleClass("show"), t("body").toggleClass("overflow");
    });


    t(".offcanvasburger, .overlayoffcanvas").click(function () {
        t(".offcanvasburger").toggleClass("clicked"), t(".overlayoffcanvas").toggleClass("show"), t(".offcanvas--nav-menu").toggleClass("show"), t("body").toggleClass("overflow");
    });

})(jQuery)