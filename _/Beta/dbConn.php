<?php

$servername = "ahmedge.ipagemysql.com";
$username = "gsc";
$password = "gsc@asu15";
$dbname = "ci1";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

?>