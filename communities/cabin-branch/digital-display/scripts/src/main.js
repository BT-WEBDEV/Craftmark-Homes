$(document).ready(function() {

new WOW().init();

$('.menu-button').on('click', function () {
  $('.animated-icon1').toggleClass('open');
});


// initializing all sliders
$('.gallery-top').each(function(index) {
  
  var $i = index + 1; 

  var galleryThumbs = new Swiper('.thumb'+$i, {
    spaceBetween: 10,
    slidesPerView: 4,
    watchSlidesVisibility: true,
    watchSlidesProgress: true,
  });

  var galleryTop = new Swiper('.slider'+$i, {
    spaceBetween: 10,
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
    thumbs: {
      swiper: galleryThumbs
    }
  });

});



// removing active state of swiper tabs 
$('#ft').removeClass('show active');
$('#sp').removeClass('show active');
$('#ab').removeClass('show active');
$('#floorplanSlider1').removeClass('show active');
$('#floorplanSlider2').removeClass('show active');
$('#floorplanSlider3').removeClass('show active');
$('#feature2').removeClass('show active');
$('#feature3').removeClass('show active');
$('#feature4').removeClass('show active');
$('#siteplanSlider').removeClass('show active');
$('#siteplan2Slider').removeClass('show active');

// Main navigation controlls
$("#features-tab").on('click', function() {
  $('#imageTab a[href="#ft"]').tab('show');
  // $('.left-side').css('background-image', 'url(/communities/crown/digital-display/images/bg-2.png)');
  // $('.float-text').children("p").css('color', '#FFFFFF');
  // $('.float-text').children("img").attr("src", "/communities/crown/digital-display/images/leaf4.png");
});

$("#floorplan-tab").on('click', function() {
  $('#imageTab a[href="#fp"]').tab('show');
  // $('.left-side').css('background-image', 'url(/communities/crown/digital-display//images/bg-1.png)');
  // $('.float-text').children("p").css('color', '#000000');
  // $('.float-text').children("img").attr("src", "/communities/crown/digital-display/images/leaf3.png"); 
});

$("#siteplan-tab").on('click', function() {
  $('#imageTab a[href="#sp"]').tab('show');
  // $('.left-side').css('background-image', 'url(/communities/crown/digital-display//images/bg-1.png)');
  // $('.float-text').children("p").css('color', '#FFFFFF');
  // $('.float-text').children("img").attr("src", "/communities/crown/digital-display/images/leaf4.png");
});

$("#about-tab").on('click', function() {
  $('#imageTab a[href="#ab"]').tab('show');
  // $('.left-side').css('background-image', 'url(/communities/crown/digital-display//images/bg-1.png)');
  // $('.float-text').children("p").css('color', '#FFFFFF');
  // $('.float-text').children("img").attr("src", "/communities/crown/digital-display/images/leaf4.png");
});

// Floorplan section controls

$("#gallery-btn").on('click', function() {
  $('#floorplanTabMenu a[href="#gallery"]').tab('show');
});

$("#floorplan-btn1").on('click', function() {
  $('#floorplanTabMenu a[href="#floorplanSlider1"]').tab('show');
});

$("#floorplan-btn2").on('click', function() {
  $('#floorplanTabMenu a[href="#floorplanSlider2"]').tab('show');
});

$("#floorplan-btn3").on('click', function() {
  $('#floorplanTabMenu a[href="#floorplanSlider3"]').tab('show');
});

$('.info1-btn').on('click', function(){
  $('#fp-infoTab a[href="#fp-info1"]').tab('show');
});

$('.info2-btn').on('click', function(){
  $('#fp-infoTab a[href="#fp-info2"]').tab('show');
});

// $('.info1-btn').on('click', function(){
//   $('#fp-infoTab a[href="#fp-info1"]').tab('show');
//   $("#floorplanSlider").removeClass("show active");
//   $("#gallery").addClass("show active");
// });

// $('.info2-btn').on('click', function(){
//   $('#fp-infoTab a[href="#fp-info2"]').tab('show');
//   $("#gallery").removeClass("show active");
//   $("#floorplanSlider").addClass("show active");

//   var mySwiper = document.querySelector('.slider2').swiper;
//   var slide = this.id.substring(13,14) - 1;
//   mySwiper.slideTo(slide)
// });


$('.info1-btn, .info2-btn').on('click', function(){
  $('.info').removeClass('selected');  
  $(this).children('h2').addClass('selected');
  // $('.float-text').children("p").css('color', '#000000');
  // $('.float-text').children("img").attr("src", "/communities/crown/digital-display/images/leaf3.png");
});

$('.info2-btn').on('click', function(){
  // $('.left-side').css('background-image', 'url(/communities/crown/digital-display/images/bg-2.png)');
});

$('.info1-btn').on('click', function(){
  // $('.left-side').css('background-image', 'url(/communities/crown/digital-display/images/bg-1.png)');
});

// Features section navigation controls

$("#luxury-tab").on('click', function() {
  $('#featuresTabMenu a[href="#feature1"]').tab('show');
});

$("#energy-tab").on('click', function() {
  $('#featuresTabMenu a[href="#feature2"]').tab('show');
});

$("#kitchen-tab").on('click', function() {
  $('#featuresTabMenu a[href="#feature3"]').tab('show');
});

$("#bath-tab").on('click', function() {
  $('#featuresTabMenu a[href="#feature4"]').tab('show');
});

// Area map refresh

function reloadMap() {
    document.getElementById('googlemap').src += '';
}

$("#map-tab").on('click', function() {
  reloadMap();
});


// Screen Saver
$(".screen_saver").vegas({
        delay: 10000,
        animation: "random",
        transition: [ 'slideLeft', 'swirlRight2', 'swirlLeft2', 'zoomOut2', 'slideDown2', 'slideLeft2', 'slideRight2', 'slideUp', 'slideRight', 'slideUp2', 'slideDown', 'zoomIn', 'swirlLeft' ],
        loop: "loop",
        autoplay: "true",
        slides: [
            { src: "/images/screen-saver/slider1.jpg" },
            { src: "/images/screen-saver/slider2.jpg" },
            { src: "/images/screen-saver/slider3.jpg" },
            { src: "/images/screen-saver/slider4.jpg" },
            { src: "/images/screen-saver/slider5.jpg" },
            { src: "/images/screen-saver/slider6.jpg" },
            { src: "/images/screen-saver/slider7.jpg" },
            { src: "/images/screen-saver/slider8.jpg" },
            { src: "/images/screen-saver/slider9.jpg" },
            { src: "/images/screen-saver/slider10.jpg" },
            { src: "/images/screen-saver/slider11.jpg" },
            { src: "/images/screen-saver/slider12.jpg" },
            { src: "/images/screen-saver/slider13.jpg" },
            { src: "/images/screen-saver/slider14.jpg" },
            { src: "/images/screen-saver/slider15.jpg" },
            { src: "/images/screen-saver/slider16.jpg" },
            { src: "/images/screen-saver/slider17.jpg" },
            { src: "/images/screen-saver/slider18.jpg" },
            { src: "/images/screen-saver/slider19.jpg" },
            { src: "/images/screen-saver/slider20.jpg" },
            { src: "/images/screen-saver/slider21.jpg" },
            { src: "/images/screen-saver/slider22.jpg" },
            { src: "/images/screen-saver/slider23.jpg" },
            { src: "/images/screen-saver/slider24.jpg" },
            { src: "/images/screen-saver/slider25.jpg" },
            { src: "/images/screen-saver/slider26.jpg" },
            { src: "/images/screen-saver/slider27.jpg" },
            { src: "/images/screen-saver/slider28.jpg" },
            { src: "/images/screen-saver/slider29.jpg" },
            { src: "/images/screen-saver/slider30.jpg" },
            { src: "/images/screen-saver/slider31.jpg" },
            { src: "/images/screen-saver/slider32.jpg" },
            { src: "/images/screen-saver/slider33.jpg" },
            { src: "/images/screen-saver/slider34.jpg" },
            { src: "/images/screen-saver/slider35.jpg" },
            { src: "/images/screen-saver/slider36.jpg" },
            { src: "/images/screen-saver/slider37.jpg" },
            { src: "/images/screen-saver/slider38.jpg" },
            { src: "/images/screen-saver/slider39.jpg" },
            { src: "/images/screen-saver/slider40.jpg" },
            { src: "/images/screen-saver/slider41.jpg" },
            { src: "/images/screen-saver/slider42.jpg" },
            { src: "/images/screen-saver/slider43.jpg" },
            { src: "/images/screen-saver/slider44.jpg" },
            { src: "/images/screen-saver/slider45.jpg" },
            // { src: "/communities/crown/digital-display/images/screen-saver/slider46.jpg" },
            // { src: "/communities/crown/digital-display/images/screen-saver/slider47.jpg" },
            // { src: "/communities/crown/digital-display/images/screen-saver/slider48.jpg" },
            // { src: "/communities/crown/digital-display/images/screen-saver/slider49.jpg" },
            // { src: "/communities/crown/digital-display/images/screen-saver/slider50.jpg" },
            // { src: "/communities/crown/digital-display/images/screen-saver/slider51.jpg" },
            // { src: "/communities/crown/digital-display/images/screen-saver/slider52.jpg" },
            // { src: "/communities/crown/digital-display/images/screen-saver/slider53.jpg" },
            // { src: "/communities/crown/digital-display/images/screen-saver/slider54.jpg" },
            // { src: "/communities/crown/digital-display/images/screen-saver/slider55.jpg" },
            // { src: "/communities/crown/digital-display/images/screen-saver/slider56.jpg" },
            // { src: "/communities/crown/digital-display/images/screen-saver/slider57.jpg" },
            // { src: "/communities/crown/digital-display/images/screen-saver/slider58.jpg" },
            // { src: "/communities/crown/digital-display/images/screen-saver/slider59.jpg" },
            // { src: "/communities/crown/digital-display/images/screen-saver/slider60.jpg" },
            // { src: "/communities/crown/digital-display/images/screen-saver/slider61.jpg" },
        ]
    });

// Screen Saver Close
$('#screen_saver_wrap').click(function() {
    $(this).toggleClass('d-none d-block');
});

// Reload page if there is no movement
(function(seconds) {
var refresh,       
    intvrefresh = function() {
        clearInterval(refresh);
        refresh = setTimeout(function() {
            $('#screen_saver_wrap').toggleClass('d-none d-block').delay(1);
        }, seconds * 1000);
    };

$(document).on('keypress click', function() { intvrefresh() });
intvrefresh();

}(300)); //300 define here seconds


}); /* Document Ready End */










