// Hero Slider 
var mySwiper = new Swiper('.hero-slider', {
    loop: true,
    preventClicks: false,
    preventClicksPropagation: false,
    autoplay: {
        delay: 7000,
    },
    breakpoints: {
        1200: {
            allowTouchMove: false,
        }
    },
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
});

// Featured Swiper
var featuredSwiper = new Swiper('.featured-swiper-container', {
    slidesPerView: 3.2,
    spaceBetween: 10,
    preventClicks: false,
    preventClicksPropagation: false,
    breakpoints: {
        576: {
            slidesPerView: 3.8
        },
        767: {
            slidesPerView: 4,
            spaceBetween: 20,
            allowTouchMove: false,
        },
        1200: {
            slidesPerView: 6,
            spaceBetween: 30,
            allowTouchMove: false,
        }
    },
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
});

// Listings Swiper
var homeListingSwiperV1 = new Swiper('.home-listing-swiper-v1', {
    // loop: true,
    slidesPerView: 2.2,
    spaceBetween: 10,
    preventClicks: false,
    preventClicksPropagation: false,
    breakpoints: {
        576: {
            slidesPerView: 2.7,
            spaceBetween: 10
        },
        767: {
            slidesPerView: 3.2,
            spaceBetween: 20,
            allowTouchMove: false,
        },
        991: {
            slidesPerView: 3.7,
            spaceBetween: 20,
            allowTouchMove: false,
        },
        1200: {
            slidesPerView: 4,
            spaceBetween: 20,
            allowTouchMove: false,
        },
        1300: {
            slidesPerView: 5,
            spaceBetween: 20,
            allowTouchMove: false,
        },
        1500: {
            slidesPerView: 5.5,
            spaceBetween: 20,
            allowTouchMove: false,
        }
    },
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
});

var homeListingSwiperV2 = new Swiper('.home-listing-swiper-v2', {
    // loop: true,
    slidesPerView: 2.2,
    spaceBetween: 10,
    preventClicks: false,
    preventClicksPropagation: false,
    breakpoints: {
        576: {
            slidesPerView: 3.2,
            spaceBetween: 20
        },
        767: {
            slidesPerView: 4.2,
            spaceBetween: 20,
            allowTouchMove: false,
        },
        991: {
            slidesPerView: 4.5,
            spaceBetween: 20,
            allowTouchMove: false,
        },
        1200: {
            slidesPerView: 5,
            spaceBetween: 20,
            allowTouchMove: false,
        }
    },
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
});

// Gallery Swiper
var mySwiper = new Swiper('.gallery-swiper-container', {
    slidesPerView: 1.5,
    spaceBetween: 10,
    preventClicks: false,
    preventClicksPropagation: false,
    breakpoints: {
        576: {
            slidesPerView: 1.9,
            spaceBetween: 10
        },
        767: {
            slidesPerView: 2.5,
            spaceBetween: 20,
            allowTouchMove: false,
        },
        991: {
            slidesPerView: 2.8,
            spaceBetween: 20,
            allowTouchMove: false,
        },
        1200: {
            slidesPerView: 3,
            spaceBetween: 20,
            allowTouchMove: false,
        }
    },
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
});

// Listings On Map
var listingOnMapSwiper = new Swiper('.listing-on-map-swiper', {
    // loop: true,
    width: 130,
    freeMode: true,
    spaceBetween: 10,
    preventClicks: false,
    preventClicksPropagation: false,
});


// Floorplan Slider
function fpGalleryMultiple(galId) {
    var fpGalleryMultiple = new Swiper(galId + '-fp-gallery', {});
}

$(document).ready(function () {
    var fpGallerySingle = new Swiper('#fp-gallery-single', {});

    fpGalleryMultiple($('.floorplan-pills .nav-item a.active').attr("href"));

    $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
        var fpSwiperId = $(e.target).attr("href")
        fpGalleryMultiple(fpSwiperId);
    });
});

// Community Siteplan
var communitySiteplanSwiper = new Swiper('.community-siteplan-swiper-container', {
    slidesPerView: 2.2,
    spaceBetween: 15,
    preventClicks: false,
    preventClicksPropagation: false,
    breakpoints: {
        991: {
            slidesPerView: 3,
            spaceBetween: 15,
        }
    }
});

var communityHighlightSwiper = new Swiper('.community-highlight-swiper-container', {
    slidesPerView: 1,
    spaceBetween: 10,
    preventClicks: false,
    preventClicksPropagation: false,
    breakpoints: {
        576: {
            slidesPerView: 2
        },
        767: {
            slidesPerView: 2,
            spaceBetween: 20,
            allowTouchMove: false,
        },
        1200: {
            slidesPerView: 3,
            spaceBetween: 30,
            allowTouchMove: false,
        }
    },
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
});

// Mobile Single Swiper
var mobileSingleSwiper = new Swiper('.mobile-single-swiper-container', {
    slidesPerView: 1.2,
    initialSlide: 1,
    spaceBetween: 10,
    centeredSlides: true,
    preventClicks: true,
    preventClicksPropagation: false,
    breakpoints: {
        767: {
            slidesPerView: 2.5,
            spaceBetween: 10,
            initialSlide: 0,
            centeredSlides: false,
        },
        1200: {
            slidesPerView: 3.8,
            spaceBetween: 5,
            spaceBetween: 20,
            initialSlide: 0,
            centeredSlides: false,
            allowTouchMove: false,
        }
    },
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
});



// Custom Gallery Swiper
$(document).ready(function () {
    var customGallerySwiper = new Swiper('.custom-gallery-swiper-container', {
        loop: true,
        slidesPerView: 1.2,
        spaceBetween: 10,
        centeredSlides: true,
        preventClicks: false,
        preventClicksPropagation: false,
        breakpoints: {
            767: {
                init: false,
                noSwiping: true
            }
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
    });
    $('#custom-gallery .md-pills a').on('show.bs.tab', function () {
        var customGallerySwiper = new Swiper('.custom-gallery-swiper-container', {
            loop: true,
            slidesPerView: 1.2,
            spaceBetween: 10,
            centeredSlides: true,
            breakpoints: {
                767: {
                    init: false,
                    noSwiping: true
                }
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
        });
    });
});

// Community Details Floorplans and Quick Move-Ins Swiper
var communityDetailsSwiper = new Swiper('.community-details-swiper-container', {
    slidesPerView: 1.2,
    spaceBetween: 10,
    preventClicks: false,
    preventClicksPropagation: false,
    breakpoints: {
        767: {
            loop: false,
            slidesPerView: 2.2,
            spaceBetween: 10,
            centeredSlides: false,
        },
        1200: {
            loop: false,
            slidesPerView: 3.8,
            spaceBetween: 5,
            spaceBetween: 20,
            centeredSlides: false,
            slidesPerGroup: 4.5,
            allowTouchMove: false,
        }
    },
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
});

var communityDetailsSwiperV2 = new Swiper('.community-details-swiper-containerV2', {
    slidesPerView: 1.4,
    spaceBetween: 10,
    preventClicks: false,
    preventClicksPropagation: false,
    centeredSlides: true,
    breakpoints: {
        1200: {
            slidesPerView: 1.4,
            spaceBetween: 20,
            allowTouchMove: false,
        },
    },
    navigation: {
        nextEl: '.com-fp-btn-next',
        prevEl: '.com-fp-btn-prev',
    },
});

var communityDetailsSwiperV3 = new Swiper('.community-details-swiper-containerV3', {
    slidesPerView: 1.4,
    spaceBetween: 10,
    preventClicks: false,
    preventClicksPropagation: false,
    centeredSlides: true,
    breakpoints: {
        1200: {
            slidesPerView: 1.4,
            spaceBetween: 20,
            allowTouchMove: false,
        },
    },
    navigation: {
        nextEl: '.com-qmi-btn-next',
        prevEl: '.com-qmi-btn-prev',
    },
});

// Community Details Swiper
var communitySliderSwiper = new Swiper('.community-slider-swiper-container', {
    loop: true,
    preventClicks: false,
    preventClicksPropagation: false,
    breakpoints: {
        767: {
            slidesPerView: 2,
            spaceBetween: 5,
        },
        991: {
            init: false,
            noSwiping: true
        }
    }
});

// Quick Move-Ins Details Swiper
var mySwiper = new Swiper('.quick-move-ins-slider-swiper-container', {
    loop: true,
    preventClicks: false,
    preventClicksPropagation: false,
    breakpoints: {
        767: {
            slidesPerView: 2,
            spaceBetween: 5,
        },
        991: {
            init: false,
            noSwiping: true
        }
    }
});