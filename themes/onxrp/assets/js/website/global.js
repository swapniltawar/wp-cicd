require("../../scss/website/global.scss");

// import Swiper JS
import Swiper, { Navigation, Pagination } from 'swiper';
// import Swiper styles
// import 'swiper/css';
// import 'swiper/css/navigation';
// import 'swiper/css/pagination';

import "lazysizes";
window.lazySizesConfig = window.lazySizesConfig || {};
window.lazySizesConfig.loadMode = 1;

(function($) {
    console.log('inside global.js');

    /**
     * chech if it is block details page or not
     */
    let accordion = $(".js-accordion");
    if (!accordion) return;
    if (accordion.length > 0) {
        let btn = $(".accordion .accordion__header button");
        let collapse = $(".accordion .collapse");
        let btnPlay = $(".video-wrapper .btn-play");

        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                document.querySelector(this.getAttribute('href')).scrollIntoView({
                    behavior: 'smooth'
                });
            });
        });

        // video
        btnPlay.on("click", function() {
            let vdo = $(this).parents('.video-wrapper').find('video');
            vdo.get(0).play();
        });

        // accordion
        $(".accordion .accordion__header button").on("click", function() {
            let sibling = $(this).parents(".accordion__items").find(".collapse");

            // reset expand icon
            btn.attr('aria-expanded', false);

            if ($(sibling).hasClass("show")) {
                collapse.removeClass("show");
                $(this).attr('aria-expanded', false);
            } else {
                collapse.removeClass("show");
                sibling.addClass('show');
                $(this).attr('aria-expanded', true);
            }
        });
        $(".collapse:first").addClass("show");

        $(".accordion__header:first button").attr('aria-expanded', true);
    }

     // nft glossary select
     $(".sorting .sorting__options li ").on("click", function(){
        $('.sorting .sorting__options li.active').removeClass('active');
        $(this).addClass('active');
    });

    // Sticky Header
    $(window).on('scroll', function(){
        if ($(this).scrollTop() > 50) {
            $('.nav-bar-wrapper').addClass('fixed');
        } else {
            $('.nav-bar-wrapper').removeClass('fixed');
        }
  });

  // JS for smooth scroll and add top 90px gap to display proper section on  blog details page
  jQuery( ".page-anchors li a" ).on( "click", function( event ) {
        var letter = jQuery(this).attr('href')
        jQuery('html, body').animate({
            scrollTop: jQuery(letter).offset().top - 90
        }, 700);
    });
    if (jQuery(window).width() <= 576) {
        jQuery( ".page-anchors li a" ).on( "click", function( event ) {
            var letter = jQuery(this).attr('href')
            jQuery('html, body').animate({
                scrollTop: jQuery(letter).offset().top - 50
            }, 500);
        });
    }

    //sticky sidebar
    if (jQuery(window).width() <= 576) {
        var stickySidebar = $('.sticky');

        if (stickySidebar.length > 0) {
          var stickyHeight = stickySidebar.height(),
              sidebarTop = stickySidebar.offset().top - 63 ;
        }

        // on scroll move the sidebar
        jQuery(window).on('scroll', function(){
          if (stickySidebar.length > 0) {
            var scrollTop = jQuery(window).scrollTop();

            if (sidebarTop < scrollTop) {
              stickySidebar.css('top', scrollTop - sidebarTop);

              // stop the sticky sidebar at the footer to avoid overlapping
              var sidebarBottom = stickySidebar.offset().top + stickyHeight,
                  stickyStop = jQuery('.result').offset().top + jQuery('.result').height();
              if (stickyStop < sidebarBottom) {
                var stopPosition = jQuery('.result').height() - stickyHeight;
                stickySidebar.css('top', stopPosition);
              }
            }
            else {
              stickySidebar.css('top', '0');
            }
          }
        });

        // jQuery(window).resize(function () {
        //   if (stickySidebar.length > 0) {
        //     stickyHeight = stickySidebar.height();
        //   }
        // });
    }

})(jQuery);

// JS for smooth scroll and add top 120px gap to display proper section on NFT glossary page
jQuery( ".sorting__options a" ).on( "click", function( event ) {
    var letter = jQuery(this).attr('href')
    jQuery('html, body').animate({
        scrollTop: jQuery(letter).offset().top - 120
    }, 700);
});
if (jQuery(window).width() <= 576) {
    jQuery( ".sorting__options a" ).on( "click", function( event ) {
        var letter = jQuery(this).attr('href')
        jQuery('html, body').animate({
            scrollTop: jQuery(letter).offset().top - 70
        }, 700);
    });
}

jQuery('.partner-slider-swiper').each(function(index, element){
    var swiperClass = 'onxrp-swiper-'+index;
    var $this = jQuery(this);
    $this.find(".js-partnerSwiper").addClass(swiperClass);
    $this.find(".swiper-button-prev").addClass("swiper-button-prev-" + index);
    $this.find(".swiper-button-next").addClass("swiper-button-next-" + index);
    $this.find(".swiper-pagination").addClass("swiper-pagination-" + index);

    // init Swiper:
    const swiper = new Swiper(`.${swiperClass}`, {
    modules: [Navigation, Pagination],
    slidesPerView: 3,
    spaceBetween: 40,
    slidesPerGroup: 3,
    // slidesPerView: 2,
    // spaceBetween: 20,
    breakpoints: {
        // when window width is >= 320px
        320: {
            slidesPerView: 2,
            spaceBetween: 20,
            slidesPerGroup: 2
        },

        // when window width is >= 640px
        768: {
            slidesPerView: 2,
            spaceBetween: 40,
            slidesPerGroup: 2
        },
        991: {
            slidesPerView: 3,
            spaceBetween: 40,
            slidesPerGroup: 3
        }
    },
    navigation: {
        nextEl: ".swiper-button-next-" + index,
        prevEl: ".swiper-button-prev-" + index,
    },
    pagination: {
        el: ".swiper-pagination-" + index,
        clickable: true
    },

    // slidesPerGroup: 3,
    loop: true,
    loopFillGroupWithBlank: true,
});


});

// Mobile Menu
let modalElm = document.getElementById('slide-top-modal');
let bodyElm = document.querySelector('body');
let shadowElm = document.querySelector('.mobile-nav-overlay');
let hamburger = document.querySelector('#js-mobile-nav');
let modalCloseElm = document.querySelector('.mobile-nav-devider');

hamburger.onclick = function() {
    modalElm.classList.add('active');
    bodyElm.classList.add('overflow');
    shadowElm.classList.add('active');
    hamburger.style.display = "none";
}
function modalClose() {
    modalElm.classList.remove('active');
    bodyElm.classList.remove('overflow');
    shadowElm.classList.remove('active');
    hamburger.style.display = "block";
}
shadowElm.onclick = function() {
    modalClose();
}
modalCloseElm.onclick = function() {
    modalClose();
}

// Mobile Swipe
let touchstartY = 0
let touchendY = 0

const menuSwipeClose = document.querySelector('body')

function handleGesture() {
  if (touchendY < touchstartY) {
    modalClose();
  }
}

menuSwipeClose.addEventListener('touchstart', e => {
  touchstartY = e.changedTouches[0].screenY
})

menuSwipeClose.addEventListener('touchend', e => {
  touchendY = e.changedTouches[0].screenY
  handleGesture()
})

// FAQ
var button = document.querySelector('.js-faq-btn');
var faqSection = document.querySelector('.js-faq-section');

button.addEventListener('click', function() {
    faqSection.classList.toggle('active');
    this.classList.toggle('active');
});







