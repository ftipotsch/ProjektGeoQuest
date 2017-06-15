/**
 * Created by Floo on 07.06.2017.
 */
var map;
var id = 0;



function initMap() {
    var myLatlng = {lat: 47.2105455, lng: 10.7184836};
    var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 10
        ,
        center: myLatlng
    });
    var locations = [
        ['Imst', 47.240238, 10.739595, 1],
        ['Haiming', 47.255817, 10.883267, 2],
        ['Mieming', 47.305761, 10.974388, 3],
        ['Innsbruck Hauptbahnhof', 47.264665, 11.400367, 4],
        ['Fügen', 47.346790, 11.849369, 5]
    ];


    var marker, i;

    for (i = 0; i < locations.length; i++) {
        marker = new google.maps.Marker({
            position: new google.maps.LatLng(locations[i][1], locations[i][2]),
            map: map,
            titel: locations[i][0]
        });
        google.maps.event.addListener(marker, 'click', (function(marker, i) {
            return function() {
                //infowindow.setContent(locations[i][0]);
                //infowindow.open(map, marker);
                id = locations[i][3]
                var url = "Fragen.php?id=" + id;
                window.location = url;
            }

        })(marker, i));
    }




    /*
     //Wenn die Karte Bewegt wird, zentriert die Karte wieder über dem Marker
     map.addListener('center_changed', function() {
     // 3 seconds after the center of the map has changed, pan back to the
     // marker.
     window.setTimeout(function() {
     map.panTo(marker.getPosition());
     }, 3000);
     });

    marker.addListener('click', function() {
        var url = "Fragen.php?id=" + id;
        window.location = url;

    });
    //var infoWindow = new google.maps.InfoWindow({map: map});
    // GEO LOCATION sets center of Map to User Position
    // Try HTML5 geolocation.
    */
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function(position) {
            var pos = {
                lat: position.coords.latitude,
                lng: position.coords.longitude
            };
            //INFO BOX
            //infoWindow.setPosition(pos);
            //infoWindow.setContent('Location found.');
            map.setCenter(pos);
        }, function() {
            handleLocationError(true, infoWindow, map.getCenter());
        });
    } else {
        // Browser doesn't support Geolocation
        handleLocationError(false, infoWindow, map.getCenter());
    }
}







function handleLocationError(browserHasGeolocation, infoWindow, pos) {
    infoWindow.setPosition(pos);
    infoWindow.setContent(browserHasGeolocation ?
        'Error: The Geolocation service failed.' :
        'Error: Your browser doesn\'t support geolocation.');
}

