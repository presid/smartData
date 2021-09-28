<?php
// Database configuration

$dbHost     = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName     = "test_internet";

// Create database connection
$db = mysqli_connect($dbHost, $dbUsername, $dbPassword, $dbName);

// Check connection
if ($db->connect_error) {
    die("Connection failed : " . $db->connect_error);
}
    return $db;

?>