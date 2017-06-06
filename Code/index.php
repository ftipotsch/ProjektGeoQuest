<!DOCTYPE html>
<html>

<head>
    <title>Simple Map</title>
    <meta name="viewport" content="initial-scale=1.0">
    <meta charset="utf-8">
    <style>
        /* Always set the map height explicitly to define the size of the div
         * element that contains the map. */
        #map {
            height: 100%;
        }
        /* Optional: Makes the sample page fill the window. */
        html, body {
            height: 100%;
            margin: 0;
            padding: 0;
        }
    </style>
</head>
<body>
<p>Links</p>
<p><a href="create.php">Create</a></p>
<p><a href="read.php">Read</a></p>
<p><a href="update.php">Update</a></p>
<p><a href="delete.php">Delete</a></p>
<p><a href="index.php">Index</a></p>


<div id="map" style="height: 400px;width: 400px"></div>
<script>
    var map;
    function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
            center: {lat: 47.2105455, lng: 10.7184836},
            zoom: 10
        });
        var infoWindow = new google.maps.InfoWindow({map: map});

        // Try HTML5 geolocation.
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function(position) {
                var pos = {
                    lat: position.coords.latitude,
                    lng: position.coords.longitude
                };

                infoWindow.setPosition(pos);
                infoWindow.setContent('Location found.');
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
</script>
    }
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBqlwEF-tTeE9tUu94SGdMyOWjRJZk79ZA&callback=initMap"
        async defer></script>
<?php
//api key= AIzaSyBqlwEF-tTeE9tUu94SGdMyOWjRJZk79ZA
?>


</body>
</html>