<!DOCTYPE html>
<html>

<head>

    <title>Simple Map</title>
    <meta name="viewport" content="initial-scale=1.0">
    <meta charset="utf-8">
    <link rel="stylesheet" href="style.css">
    <?php
        require "Maps.php"
    ?>
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

<?php
//LINKS
?>
<div id="div">
    <table id="table" style="width:100%">
        <tr>
            <th><a href="CRUDUser/create.php">Create User</a></th>
            <th><a href="CRUDUser/read.php">Read User List</a></th>
            <th><a href="CRUDQuestion/qcreate.php">Create Question</a></th>
            <th><a href="CRUDQuestion/qread.php">Read Question List</a></th>
            <th><a href="index.php">Index</a></th>
        </tr>
    </table>
</div>

<div id="map" style="height: 400px"></div>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBqlwEF-tTeE9tUu94SGdMyOWjRJZk79ZA&callback=initMap"
        async defer>initMap()</script>
<?php
//api key= AIzaSyBqlwEF-tTeE9tUu94SGdMyOWjRJZk79ZA
?>


</body>
</html>