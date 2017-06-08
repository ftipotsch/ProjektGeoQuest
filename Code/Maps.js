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

    while(id<5){
        id++;
        var marker = new google.maps.Marker({
            position: myLatlng,
            map: map,
            title: 'Frage ' + id
        });
    }
    /*var marker1 = new google.maps.Marker({
        position: myLatlng,
        map: map,
        title: 'Frage'
        }
    );
    */




    /*
     //Wenn die Karte Bewegt wird, zentriert die Karte wieder über dem Marker
     map.addListener('center_changed', function() {
     // 3 seconds after the center of the map has changed, pan back to the
     // marker.
     window.setTimeout(function() {
     map.panTo(marker.getPosition());
     }, 3000);
     });
     */
    marker.addListener('click', function() {
        var url = "Fragen.php?id=" + id;
        window.location = url;

    });
    //var infoWindow = new google.maps.InfoWindow({map: map});
    // GEO LOCATION sets center of Map to User Position
    // Try HTML5 geolocation.
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

