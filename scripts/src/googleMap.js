
// Initialize Google Map
function initMap() {
    mapOptions = {
        maxZoom: 14,
        scrollwheel: false,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    };

    map = new google.maps.Map(document.getElementById("google-map"), mapOptions);
    bounds = new google.maps.LatLngBounds();
    markers = [];
    infowindow = new google.maps.InfoWindow();

    // Close info box when click on map
    google.maps.event.addListener(map, "click", function (event) {
        infowindow.close();
    });

    // Google Map Info Box Styling
    google.maps.event.addListener(infowindow, 'domready', function () {
        var iwOuter = $('.gm-style-iw');
        $(".gm-style-iw").next("div").hide();
        var iwBackground = iwOuter.prev();
        iwBackground.children(':nth-child(2)').css({ 'display': 'none' });
        iwBackground.children(':nth-child(4)').css({ 'display': 'none' });
    });
}

// Create Community markers from the json data
function createCommunityMapMarkers(data, county, homeTypes, minPrice, maxPrice) {
    var result = data.filter(function (val) {
        var filteredHomeType;
        if (county) {
            return val.address.county == county; 
        } else if (minPrice && maxPrice) {
            if (minPrice <= val.priceInfo.price && val.priceInfo.price <= maxPrice) {
                if (homeTypes[0] != 'any') {
                    homeTypes.forEach(function (homeType) {
                        if (homeType == val.homeType) {
                            filteredHomeType = val;
                        }
                    });
                    return filteredHomeType;
                } else {
                    return val;
                }
            }
        } else {
            return val;
        }
    });
    result.forEach(function (comm) {
        var lat = comm.address.coords ? comm.address.coords[0] : null;
        var long = comm.address.coords ? comm.address.coords[1] : null;
        var pinType = (comm.status == "comingsoon") ? comm.status : comm.homeType;
        if (lat !== null && long !== null && comm.status != "sold" && comm.status != "soldLabel") {
            pushMarkers(lat, long, pinType, comm.name, comm.url, comm.priceInfo.label, comm.priceInfo.price, "community", comm.landingPage, null, comm.mapImg, comm.status);
        }
    });
}

// Create Quick Move-Ins Markers from MySql
function creatQuickMoveInsMapMarkers(data, county, homeTypes, minPrice, maxPrice) {
    result = data.filter(function (val) {
        var filteredHomeType;
        if (county) {
            return val['county'] == county;
        } else if (minPrice && maxPrice) {
            console.log(val['price'].slice(0, -3));
            if (minPrice <= clean(val['price'].slice(0, -3)) && clean(val['price'].slice(0, -3)) <= maxPrice) {
                if (homeTypes[0] != 'any') {
                    $.each(homeTypes, function (k, homeType) {
                        if (homeType == val['homeType']) {
                            filteredHomeType = val;
                        }
                    })
                    return filteredHomeType;
                } else {
                    return val;
                }
            }
        } else {
            return val;
        }
    })
    $.each(result, function (k, v) {
        var lat = v['google_lat'];
        var long = v['google_long'];
        
        if (v['c_lat'] && v['c_long']) {
            lat = v['c_lat'];
            long = v['c_long'];
        }

        pushMarkers(lat, long, 'quickMoveIns', v['name'], v['url'], "", v['price'], "quickMoveIns", "", v['id'], null, null);
    })
}

// Push Markers to the Map
function pushMarkers(coordx, coordy, homeType, name, url, priceLabel, price, listType, landingPage, id, mapImg, status) {

    var mapPinUrl = "";
    var imgUrl = "";
    var comUrl = "";

    if (listType == "quickMoveIns") {
        imgUrl = url
        comUrl = "/quick-move-ins/home?id=" + id;
    } else if (listType == "community") {
        imgUrl = "/communities/" + url + "/images/" + mapImg;
        if (landingPage) {
            comUrl = landingPage;
        } else {
            comUrl = "/communities/" + url + "/";
        }
    }

    switch (homeType) {
        case 'townhomes':
            mapPinUrl = "/images/icon/townhomes.png";
            break;
        case 'singleFamily':
            mapPinUrl = "/images/icon/singleFamily.png";
            break;
        case 'condominiums':
            mapPinUrl = "/images/icon/condominiums.png";
            break;
        case 'comingsoon':
            mapPinUrl = "/images/icon/comingsoon.png";
            break;
        default:
            mapPinUrl = "/images/icon/map-pin.png";
            break;
    }

    mapPin = {
        url: mapPinUrl,
        scaledSize: new google.maps.Size(30, 46),
        origin: new google.maps.Point(0, 0),
        anchor: new google.maps.Point(15, 23)
    };

    latLng = new google.maps.LatLng(coordx, coordy);

    var listStatus = "";
    var zIndex = 1;
    if (status == "soldLabel") {
        listStatus = '  <div class="mask flex-center rgba-black overlay-status">\
                            <p>SOLD OUT</p>\
                        </div>';
        zIndex = 0;
    } 

    if (status == "comingsoon") {
        listStatus = '  <div class="mask flex-center rgba-black overlay-status">\
                            <p>COMING SOON!</p>\
                        </div>';
    }

    priceInfo = priceLabel + ' $' + price + 's';

    if(price == 0) {
        priceInfo = 'COMING SOON!';
    }


    var contentString = '   <div class="infobox">\
                                <a href="'+ comUrl + '" class="cursor-pointer">\
                                    <div>\
                                        <!-- Slider main container -->\
                                        <div class="swiper-container hero-slider">\
                                            <!-- Additional required wrapper -->\
                                            <div class="swiper-wrapper">\
                                                <!-- Slides -->\
                                                <div class="swiper-slide">\
                                                    <div class="list-item image">\
                                                        <div class="view">\
                                                            <img src="'+ imgUrl + '"\
                                                                class="img-fluid w-100" alt="'+ name + '">\
                                                            '+ listStatus + '\
                                                        </div>\
                                                    </div>\
                                                </div>\
                                            </div>\
                                        </div>\
                                        <div class="content">\
                                            <h5 class="m-0 font-weight-normal text-black">'+ name + '</h5>\
                                            <p></p>\
                                            <p class="font-weight-bold text-black">'+ priceInfo + '</p>\
                                        </div>\
                                    </div>\
                                </a>\
                            </div>';
    
    if (comUrl == '/communities/coming-soon/') {
        contentString = '   <div class="infobox">\
                                <div>\
                                    <!-- Slider main container -->\
                                    <div class="swiper-container hero-slider">\
                                        <!-- Additional required wrapper -->\
                                        <div class="swiper-wrapper">\
                                            <!-- Slides -->\
                                            <div class="swiper-slide">\
                                                <div class="list-item image">\
                                                    <div class="view">\
                                                        <img src="'+ imgUrl + '"\
                                                            class="img-fluid w-100" alt="'+ name + '">\
                                                        '+ listStatus + '\
                                                    </div>\
                                                </div>\
                                            </div>\
                                        </div>\
                                    </div>\
                                    <div class="content">\
                                        <h5 class="m-0 font-weight-normal text-black">'+ name + '</h5>\
                                        <p></p>\
                                        <p class="font-weight-bold text-black">'+ priceInfo + '</p>\
                                    </div>\
                                </div>\
                            </div>';
    }

    var marker = new google.maps.Marker({
        position: latLng,
        animation: google.maps.Animation.DROP,
        icon: mapPin,
        zIndex: zIndex
    });
    markers.push(marker);

    bounds.extend(marker.position);
    marker.setMap(map);
    map.fitBounds(bounds);

    google.maps.event.addListener(marker, 'click', function () {
        infowindow.setContent(contentString);
        infowindow.open(map, marker);
        toggleBounce(marker);
    });

    // google.maps.event.addListener(marker, 'mouseover', function () {
    //     toggleBounce(marker);
    // });

}

//  Bounce function 
function toggleBounce(marker) {
    if (marker.getAnimation() != null) {
        marker.setAnimation(null);
    } else {
        marker.setAnimation(google.maps.Animation.BOUNCE);
        setTimeout(function () { marker.setAnimation(null); }, 750);
    }
}