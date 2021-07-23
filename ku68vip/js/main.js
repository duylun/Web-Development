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

$(document).ready(function(){
    "use strict";
    // Fix Header
    $(window).on('scroll', function () {

        /**Fixed header**/
        if ($(window).scrollTop() > 250) {
           $('.ts-menu-sticky').addClass('sticky fade_down_effect');
        } else {
           $('.ts-menu-sticky').removeClass('sticky fade_down_effect');
        }
    });

    // Navigation
    if ($('.ts-main-menu').length > 0) {
        $(".ts-main-menu").navigation({
            effect: "fade",
            mobileBreakpoint: 992,
        });
    }

    // Breaking slider
    if ($('#breaking_slider').length > 0) {
        $('#breaking_slider').owlCarousel({
            items: 1,
            loop: true,
            dots: false,
            nav: true,
            animateOut: 'slideOutDown',
            animateIn: 'flipInX',
            autoplayTimeout: 5000,
            autoplay: true,
        })
    }

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
