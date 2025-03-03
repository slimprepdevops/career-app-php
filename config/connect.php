<?php

    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    $host = "localhost";
    $username = "root";
    $password = "";
    $dbname = "career_search";

    // Create connection
    $conn = mysqli_connect($host, $username, $password, $dbname);

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
