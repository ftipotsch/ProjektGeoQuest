<?php
session_start();
    if(isset($_SESSION['id'])) {
        echo "Username: " . $_SESSION['username'];
        echo "</br>";
        echo "Password: " . $_SESSION['password'];
        echo "</br>";
        echo "id: " . $_SESSION['id'];
        echo "</br>";
        echo "points: " . $_SESSION['points'];
    } else {
        header("Location: Login.php");
    }
?>