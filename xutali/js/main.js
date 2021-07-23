// navigation
// (c) 2020 Written by Simon Köhler in Panama
// github.com/koehlersimon
// simon-koehler.com

var dropdownElementList = [].slice.call(document.querySelectorAll('.dropdown-toggle'));
var dropdownSubmenuElementList = [].slice.call(document.querySelectorAll('.dropdown-submenu-toggle'));
var dropdownMenus = [].slice.call(document.querySelectorAll('.dropdown-menu'));

var dropdownList = dropdownElementList.map(function (dropdownToggleEl) {
    return new bootstrap.Dropdown(dropdownToggleEl);
});

var submenuList = dropdownSubmenuElementList.map(function(e) {
    e.onclick = function(e){
        e.target.parentNode.querySelector('ul').classList.toggle('show');
        e.stopPropagation();
        e.preventDefault();
    }
});

var masterClickEvent = document.addEventListener('click',function(e){

    // Function to remove show class from dropdowns that are open
    closeAllSubmenus();

    // Hamburger menu
    if(e.target.classList.contains('hamburger-toggle')){
        e.target.children[0].classList.toggle('active');
    }

});

function closeAllSubmenus(){
    // Function to remove show class from dropdowns that are open
    dropdownMenus.map(function (menu) {
        menu.classList.remove('show');
    });
}

function onePageNavigation() {
    // Click To Go Top
    $('.nav-link').on('click', function () {
      var thisAttr = $(this).attr('href');
      if ($(thisAttr).length) {
        var scrollPoint = $(thisAttr).offset().top;
        $('body,html').animate({
          scrollTop: scrollPoint
        }, 800);
      }
      return false;
    });

    // One Page Active Class
    var topLimit = 300,
      ultimateOffset = 200;

    $('.st-onepage-nav').each(function () {
      var $this = $(this),
        $parent = $this.parent(),
        current = null,
        $findLinks = $this.find("a");

      function getHeader(top) {
        var last = $findLinks.first();
        if (top < topLimit) {
          return last;
        }
        for (var i = 0; i < $findLinks.length; i++) {
          var $link = $findLinks.eq(i),
            href = $link.attr("href");

          if (href.charAt(0) === "#" && href.length > 1) {
            var $anchor = $(href).first();
            if ($anchor.length > 0) {
              var offset = $anchor.offset();
              if (top < offset.top - ultimateOffset) {
                return last;
              }
              last = $link;
            }
          }
        }
        return last;
      }

      $(window).on("scroll", function () {
        var top = window.scrollY,
          height = $this.outerHeight(),
          max_bottom = $parent.offset().top + $parent.outerHeight(),
          bottom = top + height + ultimateOffset;

        var $current = getHeader(top);

        if (current !== $current) {
          $this.find(".active").removeClass("active");
          $current.addClass("active");
          current = $current;
        }
      });
    });
}


$(document).ready(function(){
    "use strict";
    // Fix Header
    // $(window).on('scroll', function () {
    //     if ($(window).scrollTop() > 250) {
    //        $('.ts-menu-sticky').addClass('sticky fade_down_effect');
    //     } else {
    //        $('.ts-menu-sticky').removeClass('sticky fade_down_effect');
    //     }
    // });

    // Navigation
    // if ($('.ts-main-menu').length > 0) {
    //     $(".ts-main-menu").navigation({
    //         effect: "fade",
    //         mobileBreakpoint: 992,
    //     });
    // }



    //WOW slider
    new WOW().init();

    onePageNavigation();

    $('.btn-hotline').click(function() {
        $('html, body').animate({
            scrollTop: $("#hotline").offset().top
        }, 800);
        return false;
    });

    if ($('#slider-wrap').length > 0) {
        $('#slider-wrap').owlCarousel({
            loop: true,
            items: 1,
            dots: false,
            nav: true,
            animateOut: 'fadeOut',
            autoplay: true,
            autoplayTimeout: 4000
        });
    }
});
