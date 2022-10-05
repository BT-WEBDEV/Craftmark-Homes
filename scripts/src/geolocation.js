$(document).ready(function () {

    // $.ajax({
    //     type: "GET",
    //     url: "https://maps.googleapis.com/maps/api/geocode/json?latlng=38.8825806,-77.1077511&key=AIzaSyDdCFDlE3fBLixVdjPQyqXlTI5xuK4M0-8",
    //     data: "data",
    //     dataType: "json",
    //     success: function (response) {
    //         console.log(response);
    //     }
    // });

    // var settings = {
    //     "async": true,
    //     "crossDomain": true,
    //     "url": "http://geodb-free-service.wirefreethought.com/v1/geo/locations/38.8825806-77.1077511/nearbyCities?limit=10&offset=0&radius=100&distanceUnit=MI",
    //     "method": "GET",
    //     "headers": {
    //         "x-rapidapi-key": "4c04c49695mshf712474ce9d40f4p14108bjsn84caba41718b",
    //         "x-rapidapi-host": "wft-geo-db.p.rapidapi.com"
    //     }
    // };

    // $.ajax(settings).done(function (response) {
    //     console.log(response);
    // });

    // jQuery.getJSON(
    //     "http://getnearbycities.geobytes.com/GetNearbyCities?callback=?&radius=50&locationcode=Rockville, MD",
    //     function (data) {
    //         console.log(data);
    //     }
    // );

    // $.ajax({
    //     type: "GET",
    //     url: "https://maps.googleapis.com/maps/api/distancematrix/json?origins=Arlington,VA&destinations=McLean,VA|Fairfax,VA&units=imperial&key=AIzaSyDdCFDlE3fBLixVdjPQyqXlTI5xuK4M0-8",
    //     data: "data",
    //     dataType: "json",
    //     success: function (response) {
    //         console.log(response);
    //     }
    // });

    $.ajax({
        type: "GET",
        url: "https://freegeoip.app/json/",
        data: "data",
        dataType: "json",
        success: function (response) {
            sortByDistance(response);
        }
    });

    // Sort Community by Distance | Google DistanceMatrix
    function sortByDistance(currentIpInfo) {

        var origin = currentIpInfo['city'] + ', ' + currentIpInfo['region_code'];
        var destinations = [];

        $.getJSON("/database-json/communities.json",
            function (data) {
                var returnedData = $.grep(data.communities, function (element, index) {
                    return element.status == "live";
                });

                $.each(returnedData, function (i, comm) {
                    var city = comm['address']['addresses'][0]['address']['city'];
                    var state = comm['address']['addresses'][0]['address']['state'];
                    var address = city + ", " + state;
                    if (city && state) {
                        destinations.push(address);
                    }
                });

                var distinctDestinations = destinations.filter(function (elem, index, self) {
                    return index == self.indexOf(elem);
                });

                var service = new google.maps.DistanceMatrixService();

                service.getDistanceMatrix({
                    origins: [origin],
                    destinations: distinctDestinations,
                    travelMode: google.maps.TravelMode.DRIVING,
                    unitSystem: google.maps.UnitSystem.IMPERIAL,
                    avoidHighways: false,
                    avoidTolls: false,
                }, MatrixCallback);

            }
        );

        function MatrixCallback(response, status) {

            var distance = [];
            // given els is one of the elements extracted from this object: 

            $.each(response.destinationAddresses, function (i, destination) {
                distance.push({
                    city: destination,
                    distanceText: response.rows[0].elements[i].distance.text,
                    distanceMetre: response.rows[0].elements[i].distance.value
                });
            });

            var sortedDistances = distance.sort(SortByDistanceMetre);

            function SortByDistanceMetre(a, b) {
                var aDistance = a.distanceMetre;
                var bDistance = b.distanceMetre;
                return ((aDistance < bDistance) ? -1 : ((aDistance > bDistance) ? 1 : 0));
            } 

            $.each(sortedDistances, function (i, sortedDistance) { 
                console.log(sortedDistance['city']);
                $('.community-container[data-location="' + sortedDistance['city'] + '"][data-status="live"]').css("order", (i+2));
            });
            
        }
    }

}); /* Document Ready End */