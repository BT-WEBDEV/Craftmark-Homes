/************************************************
*************************************************
1. Action Query
*************************************************
************************************************/

/*----------------------------------------------
------------------------------------------------
1. Action Query
------------------------------------------------
----------------------------------------------*/
// Scroll Down Fade in Action
window.GlobcommunityName;
jQuery(function($) {'use strict',
	//Initiat WOW JS
	new WOW().init();
});
// ===== Main menu Active color. ==== 

$(function() {
	var page = window.location.pathname;
	$("#bottom-nav .navbar-nav li a").parent().removeClass("active");
	$("#bottom-nav .navbar-nav li a").filter('[href="'+page+'"]').parent().addClass('active');
});


// Accordion Active color
(function() {
  $(".collapse").on("show.bs.collapse hide.bs.collapse", function(e) {
    if (e.type=='show'){
      $(this).siblings('.card-header').addClass('active');
      $(this).siblings('.card-header').next().find('.card-body li').removeClass('active-link');
      $(this).siblings('.card-header').next().find('.card-body li:first').addClass('active-link');
    }else {
      $(this).siblings('.card-header').removeClass('active');
    }
  });  
}).call(this);


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

}(600)); // define here seconds

$( document ).ready(function() {
    // ===== Main Slider ==== 
    $('#main-slider').carousel({
        interval: 5000
    });
    
  // Accordion Active
	$(".fp-button").click(function() {
        $('.d-display-card').addClass('flipped');
    });
  $(".el-button").click(function() {
        $('.d-display-card').removeClass('flipped');
    });

  // Floor plan option active
  $('.active_wrap li').click(function() {
    $('li').removeClass('active-link');
    $(this).addClass('active-link');
  });

  // Floorplan Detail Switch

  // $('.fp-select').click(function() {
  //     $('#glendale').removeClass('slideInUp');
  //     $('#glendale').addClass('slideOutUp');
  //     setTimeout(function(){
  //       $('#glendale').hide();
  //       $('#westfield').addClass('slideInUp fp-active');
  //     }, 500);
  // });

  function animateLeft($src, $tgt){

    var $parent = $src.parent();
    var width = $parent.height();
    var srcWidth = $src.height();
    
    $src.css({position: 'absolute'});
    $tgt.hide().appendTo($parent).css({position: 'absolute'});
    $src.toggleClass('slideInUp slideOutUp');
    $tgt.show().toggleClass('slideOutUp slideInUp');

    // $src.animate({top : -width}, 500, function(){
    //     $src.hide();
    //     $src.css({top: null, position: null});
    // });
    // $tgt.show().animate({top: 0}, 500, function(){
    //     $tgt.css({top: null, position: null});
    // });
  }

  $(function() {
    var $first_id = "#"+$(".fp-active").attr('id');
    var $first = $($first_id);

    $(".fp-select").click(function(){
        $(".fp-select").removeClass('fp-select-active');
        $(this).addClass('fp-select-active');

        var $second_id = "#"+$(this).data('selector');
        var $second = $($second_id);
        if($first.attr('id') != $second.attr('id')) {
          animateLeft($first, $second);
          $first = $second;
        }
    });
})


  // Ilightbox
  $('.i_fillmore').iLightBox({
      path: 'horizontal',
      controls: {
      fullscreen: false,
      thumbnail: false
    },
    styles: {
      nextOffsetX: 100,
      prevOffsetX: 100,
      nextScale: 0.6,
      prevScale: 0.6,
      nextOpacity: 0.4,
      prevOpacity: 0.4
    }
  });

  // Ilightbox
  $('.i_westfield').iLightBox({
      path: 'horizontal',
      controls: {
      fullscreen: false,
      thumbnail: false
    },
    styles: {
      nextOffsetX: 100,
      prevOffsetX: 100,
      nextScale: 0.6,
      prevScale: 0.6,
      nextOpacity: 0.4,
      prevOpacity: 0.4
    }
  });

  // Ilightbox
  $('.i_glendale').iLightBox({
      path: 'horizontal',
      controls: {
      fullscreen: false,
      thumbnail: false
    },
    styles: {
      nextOffsetX: 100,
      prevOffsetX: 100,
      nextScale: 0.6,
      prevScale: 0.6,
      nextOpacity: 0.4,
      prevOpacity: 0.4
    }
  });

  // Ilightbox
  $('.i_annapolis-clarksburgtowncenter').iLightBox({
      path: 'horizontal',
      controls: {
      fullscreen: false,
      thumbnail: false
    },
    styles: {
      nextOffsetX: 100,
      prevOffsetX: 100,
      nextScale: 0.6,
      prevScale: 0.6,
      nextOpacity: 0.4,
      prevOpacity: 0.4
    }
  });

  // Ilightbox
  $('.i_middletown-primrose').iLightBox({
      path: 'horizontal',
      controls: {
      fullscreen: false,
      thumbnail: false
    },
    styles: {
      nextOffsetX: 100,
      prevOffsetX: 100,
      nextScale: 0.6,
      prevScale: 0.6,
      nextOpacity: 0.4,
      prevOpacity: 0.4
    }
  });

  // Ilightbox
  $('.i_annapolis-primrose').iLightBox({
      path: 'horizontal',
      controls: {
      fullscreen: false,
      thumbnail: false
    },
    styles: {
      nextOffsetX: 100,
      prevOffsetX: 100,
      nextScale: 0.6,
      prevScale: 0.6,
      nextOpacity: 0.4,
      prevOpacity: 0.4
    }
  });

  // Ilightbox
  $('.i_arlington-mateny').iLightBox({
      path: 'horizontal',
      controls: {
      fullscreen: false,
      thumbnail: false
    },
    styles: {
      nextOffsetX: 100,
      prevOffsetX: 100,
      nextScale: 0.6,
      prevScale: 0.6,
      nextOpacity: 0.4,
      prevOpacity: 0.4
    }
  });

  // Ilightbox
  $('.i_annapolis-mateny').iLightBox({
      path: 'horizontal',
      controls: {
      fullscreen: false,
      thumbnail: false
    },
    styles: {
      nextOffsetX: 100,
      prevOffsetX: 100,
      nextScale: 0.6,
      prevScale: 0.6,
      nextOpacity: 0.4,
      prevOpacity: 0.4
    }
  });

  // Ilightbox
  $('.i_richmond').iLightBox({
    path: 'horizontal',
    controls: {
    fullscreen: false,
    thumbnail: false
  },
  styles: {
    nextOffsetX: 100,
    prevOffsetX: 100,
    nextScale: 0.6,
    prevScale: 0.6,
    nextOpacity: 0.4,
    prevOpacity: 0.4
  }
});

  // Screen Saver Close
  $('#screen_saver_wrap').click(function() {
    $(this).toggleClass('d-none d-block');
  });

}); /* End Of Document Ready */

    

























