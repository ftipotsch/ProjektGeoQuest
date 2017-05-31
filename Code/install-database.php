<?php
$servername = "localhost";
$username = "root";
$password = "";

// Create connection
$conn = new mysqli($servername, $username, $password);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create database
$sql = "CREATE DATABASE GeoQuest";
if ($conn->query($sql) === TRUE) {
    echo "Database created successfully";
} else {
    echo "Error creating database: " . $conn->error;
}


$conn->close();


?>

//if ($conn->query($sql) === TRUE) {
echo "Table Users created successfully";
} else {
echo "Error creating table: " . $conn->error;
}
$conn->close();

// sql to create table
$sql = "CREATE TABLE Questions (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
question VARCHAR(100) UNIQUE,
x-coordinate VARCHAR (50),
y-coordinate VARCHAR (50),
)";

if ($conn->query($sql) === TRUE) {
echo "Table Users created successfully";
} else {
echo "Error creating table: " . $conn->error;
}
$sql = "CREATE TABLE Users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(30) UNIQUE NOT NULL,
firstname VARCHAR(30) NOT NULL,
lastname VARCHAR(30) NOT NULL,
email VARCHAR(50),
points INT();
)";

