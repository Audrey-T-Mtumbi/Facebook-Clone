<?php
$host = "localhost";
$user = "root";
$pass = ""; // leave blank if no password
$dbname = "fb"; // use your actual database name

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
