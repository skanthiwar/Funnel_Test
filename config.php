<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "nadsoft";

// Create a database connection 
$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    // else{
    //     echo "Connected";
    // }
    ?>