<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "GeoQuest";


//create table USERS
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // sql to create table
    $sql = "CREATE TABLE Users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
    username VARCHAR (30) UNIQUE,
    firstname VARCHAR(30) NOT NULL,
    lastname VARCHAR(30) NOT NULL,
    email VARCHAR(50),
    points INT(9)
    )";

    // use exec() because no results are returned
    $conn->exec($sql);
    echo "Table Users created successfully";
}
catch(PDOException $e)
{
    echo $sql . "<br>" . $e->getMessage();
}


//create Table QUESTIONS
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// sql to create table
$sql = "CREATE TABLE Questions (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
    question VARCHAR (100) NOT NULL,
    creator VARCHAR(50) NOT NULL,
    x_coordinates VARCHAR (30),
    y_coordinates VARCHAR (30),
    rating INT(9)
    )";

// use exec() because no results are returned
$conn->exec($sql);
echo "Table Questions created successfully";
}
catch(PDOException $e)
{
    echo $sql . "<br>" . $e->getMessage();
}


$conn = null;
?>