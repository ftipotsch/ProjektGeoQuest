<!DOCTYPE html>
<html>

<head>
    <title>Simple Map</title>
    <meta name="viewport" content="initial-scale=1.0">
    <meta charset="utf-8">
    <script src="Maps.js"></script>
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


<div id="map" style="height: 400px"></div>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBqlwEF-tTeE9tUu94SGdMyOWjRJZk79ZA&callback=initMap"
        async defer>initMap()</script>
<?php
//api key= AIzaSyBqlwEF-tTeE9tUu94SGdMyOWjRJZk79ZA
?>


</body>
</html>