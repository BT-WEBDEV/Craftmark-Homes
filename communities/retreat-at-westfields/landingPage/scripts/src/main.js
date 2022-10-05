$(document).ready(function () {

    new WOW().init();

    // ===== Main menu Active color. ==== 
    $(function () {
        var page = window.location.pathname.split('/');
        $("header .navbar li a").parent().removeClass("active");
        $("header .navbar li a").filter('[href="/' + page[1] + '"]').parent().addClass('active');
    });

    $('.third-button').on('click dblclick', function () {
        $('.animated-icon3').toggleClass('open');
        $('.animated-icon3 span').toggleClass('bg-black');
    });

    // Add Class When Scrolls
    $(window).scroll(function () {
        var nav = $('.custom-navbar');
        var logo_word = $('#logo_word');
        var top = 50;
        if ($(window).scrollTop() >= top) {
            nav.addClass('shrink');
        } else {
            nav.removeClass('shrink');
        }
    });

}); /* Document Ready End */








