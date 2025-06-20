<?php
session_start();

// Replace with your DB connection
$conn = mysqli_connect("localhost", "root", "", "FB");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $check = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn, $check);

    if (mysqli_num_rows($result) == 1) {
        $_SESSION['username'] = $username;
        header("Location: welcome.php"); // GO TO WELCOME FIRST
        exit();
    } else {
        echo "Invalid login.";
    }
}
?>
