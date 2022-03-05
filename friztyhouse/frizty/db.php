<?php

$servername = "localhost";
$username = "root";
$password = "";
$db = "frizty_ecommerce";

// Create connection
$con = mysqli_connect($servername, $username, $password,$db);
$connection=$con;
// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

//echo "Connected successfully";
?>