// ===== Get Varialbes from url ==== 
function getUrlVars() {
    var vars = {};
    var parts = window.location.href.replace(/[?&]+([^=&]+)=([^&]*)/gi, function (m, key, value) {
        value = value.replace("/", "");
        vars[key] = value;
    });
    return vars;
}

function clean(string) {
    return cleanString = string.replace(/[|&;$%@"<>()+,]/g, "");
}

$(document).ready(function () {

    new WOW().init();

    // ===== Main menu Active color. ==== 
    $(function () {
        var page = window.location.pathname.split('/');
        if (page[1]) {
            $("header .navbar li a").parent().removeClass("active");
            $("header .navbar li a").filter('[href="/' + page[1] + '/"]').parent().addClass('active');
        }

        // Hover Effect
        $('.hover-ul').hoverSlider({
            onInit: function () {}
        });

    });

    // Add Class When Scrolls
    $(window).scroll(function () {
        var nav = $('.custom-navbar');
        var top = 22;
        if ($(window).scrollTop() >= top) {
            nav.addClass('shrink');
        } else {
            nav.removeClass('shrink');
        }
    });

    $('.more-button').on('click', function () {
        $('.animated-icon1').toggleClass('open');
    });
    // $('#hamburgerMenu').modal('show');

    // Main hover animation
    $('.hover-tab').hoverSlider({
        onInit: function () {}
    });

    $("#highlight-close").on("click", function (event) {
        event.preventDefault(event);
        $("#notify").toggleClass("d-flex d-none");
    });

    $("#notifyModal .close").on("click", function (event) {
        event.preventDefault(event);
        $("#notifyModal").toggleClass("slideInRight slideOutRight");
    });

    // PopUpShow
    setTimeout(
        function () {
            $('#popup').modal('show');
        }, 2000);
    setTimeout(
        function () {
            $('#popup').modal('hide');
        }, 15000);

}); /* Document Ready End */


// Temprary Codes

// $('#savedItems').modal('show');

function setJqueryCookie(name, value, days) {
    var expires = "";
    if (days) {
        var date = new Date();
        date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
        expires = "; expires=" + date.toUTCString();
    }
    document.cookie = name + "=" + (value || "") + expires + "; path=/";
}

function getJqueryCookie(name) {
    var nameEQ = name + "=";
    var ca = document.cookie.split(';');
    for (var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') c = c.substring(1, c.length);
        if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length, c.length);
    }
    return null;
}

// forcedOverLay Contact From
$('#forcedOverLayCloseButton').on('click', function(event) {
    event.preventDefault();
    $('.forcedOverlayContactModal').addClass('d-none');
    setJqueryCookie("forcedOverlayContactModalClosed", true, 365);
});

var forcedOverlayContactModalClosed = getCookie('forcedOverlayContactModalClosed');

if(forcedOverlayContactModalClosed) {
    $('#forcedOverlayContactModal').hide();
}