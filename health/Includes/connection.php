<?php
// Database credentials for local environment
$host = 'localhost'; 
$dbname = 'healthmonitoring';
$username = 'root';
$password = '';
// Attempt to establish a connection to the local database
$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    echo "";
}
?>
