<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.html");
    exit();
}
echo "<h1>Welcome, " . $_SESSION['username'] . "!</h1>";
?>
