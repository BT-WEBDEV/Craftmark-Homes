$(document).ready(function () {

    var currentPage = window.location.pathname.split('/');

    // Open Filter Modal
    $(".openFilterModal").on('click', function () {
        $('#filterModal').modal('show');
    });
    // $('#contactToday').modal('show');
    // Open Map Modal
    $("#map-list-switch").on('click', function () {
        $('#mapList').modal('toggle');
        $(this).text($(this).text() == 'MAP' ? 'LIST' : 'MAP');
    })

    // Filter Price Range
    $('#multi').mdbRange({
        value: {
            min: 300,
            max: 999,
        },
        single: {
            active: true,
            counting: true,
            countingTarget: '#minPrice',
            multi: {
                active: true,
                rangeLength: 1,
                counting: true,
                countingTarget: ['#maxPrice']
            },
        }
    });

    // Material Select Initialization
    $('.mdb-select').materialSelect();

    // Filter county from select box
    $('#county-filter').on('change', function () {
        var county = this.value;
        $('#loader').show();

        var newUrl = window.location.protocol + "//" + window.location.host + window.location.pathname + "?county=" + county;
        window.history.pushState({ path: newUrl }, '', newUrl);

        if(currentPage[1] == "locations") {
            $('#filter-container .community-container').hide();
            setTimeout(function() {
                countyReadyCommunity(county)
            }, 500);
        } else if(currentPage[1] == "quick-move-ins") {
            $('#filter-container .quick-move-ins-container').hide();
            setTimeout(function() {
                countyReadyQuickMoveIns(county)
            }, 500);
        }
    });

    // County filter for Community
    function countyReadyCommunity(county) {
        initMap();
        $('#loader').hide();

        if (county == 'any') {
            $('#filter-container .community-container').show();
            createCommunityMapMarkers(communities);
        } else {
            $('#filter-container')
                .children()
                .filter(function () {
                    return $(this).data('county') == county;
                })
                .show();
            createCommunityMapMarkers(communities, county);
        }
    }

    // County filter for Quick Move Ins
    function countyReadyQuickMoveIns(county) {
        initMap();
        $('#loader').hide();

        if (county == 'any') {
            $('#filter-container .quick-move-ins-container').show();
            creatQuickMoveInsMapMarkers(quickMoveIns);
        } else {
            $('#filter-container')
                .children()
                .filter(function () {
                    return $(this).data('county') == county;
                })
                .show();
            creatQuickMoveInsMapMarkers(quickMoveIns, county);
        }
    }

    // Filter County from URL
    if (getUrlVars()["county"]) {
        var county = decodeURI(getUrlVars()["county"]);
        if(currentPage[1] == "locations") {
            $('#filter-container .community-container').hide();
            setTimeout(function() {
                countyReadyCommunity(county)
            }, 500);
        } else if(currentPage[1] == "quick-move-ins") {
            $('#filter-container .quick-move-ins-container').hide();
            setTimeout(function() {
                countyReadyQuickMoveIns(county)
            }, 500);
        }
    }

    // Main Filter
    function filterReady(homeTypes, minPrice, maxPrice) {
        initMap();
        if ((homeTypes[0] == 'any' || homeTypes[0] == undefined) && minPrice == 300 && maxPrice == 999) {
            $('#loader').hide();
            if(currentPage[1] == "locations") {
                $('#filter-container .community-container').show();
                createCommunityMapMarkers(communities);
            } else if(currentPage[1] == "quick-move-ins") {
                $('#filter-container .quick-move-ins-container').show();
                creatQuickMoveInsMapMarkers(quickMoveIns);
            }
        } else {
            $('#loader').hide();
            // Filter by hometype
            $('#filter-container')
                .children()
                .filter(function () {
                    var price = parseInt($(this).data('price'));
                    var listType = $(this).data('hometype');
                    var listing = $(this);
                    var filteredHomeList;
                    
                    if(!homeTypes[0]) { homeTypes[0] = "any"; }

                    if (minPrice <= price && price <= maxPrice) {
                        if (homeTypes[0] != 'any') {
                            $.each(homeTypes, function (k, homeType) {
                                if (listType == homeType) {
                                    filteredHomeList = listing;
                                }
                            })
                            return filteredHomeList;
                        } else {
                            return listing;
                        }
                    }
                }).show();
            if(currentPage[1] == "locations") {
                createCommunityMapMarkers(communities, null, homeTypes, minPrice, maxPrice);
            } else if(currentPage[1] == "quick-move-ins") {
                creatQuickMoveInsMapMarkers(quickMoveIns, null, homeTypes, minPrice, maxPrice);
            }
            
        }
    }

    // Main filter from tab menu 
    $('#filter-btn').on('click', function () {
        $('#loader').show();
        var homeTypes = getCheckedCheckboxesFor('homeType');
        var minPrice = parseInt($("#minPrice").html());
        var maxPrice = parseInt($("#maxPrice").html());
        var homeTypeString = "";

        $.each(homeTypes, function (k, homeType) {
            var comma = (k == 0) ? "" : ","
            homeTypeString += comma + homeType;
        });

        if(!homeTypeString) { homeTypeString = "any"; }

        var newUrl = window.location.protocol + "//" + window.location.host + window.location.pathname + "?hometypes=" + homeTypeString + "&min_price=" + minPrice + "&max_price=" + maxPrice;
        window.history.pushState({ path: newUrl }, '', newUrl);
        
        $('#filter-container .community-container, #filter-container .quick-move-ins-container').hide();

        setTimeout(function() {
            setTimeout(filterReady(homeTypes, minPrice, maxPrice), 5000);
        }, 500);

        $('#filterModal').modal('hide');
    })

    // Main filter from URL 
    if (getUrlVars()["hometypes"] || getUrlVars()["min_price"] || getUrlVars()["max_price"]) {
        var homeTypes = (getUrlVars()["hometypes"]).split(',');
        var minPrice = parseInt(getUrlVars()["min_price"]);
        var maxPrice = parseInt(getUrlVars()["max_price"]);

        setTimeout(function() {
            setTimeout(filterReady(homeTypes, minPrice, maxPrice), 5000);
        }, 500);
    }

    // Get all the check box vallues,
    function getCheckedCheckboxesFor(checkboxName) {
        var checkboxes = $('input[name="' + checkboxName + '"]:checked').map(function () { return this.value; })
        return checkboxes;
    }

}); // End of Document Ready