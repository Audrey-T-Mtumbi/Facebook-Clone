<?php
$conn = mysqli_connect("localhost", "root", "", "fb");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullname = trim($_POST['fullname']);
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    $age = $_POST['age'];
    $dob = $_POST['dob'];

    // Check if user already exists
    $check = "SELECT * FROM users WHERE username='$username'";
    $result = mysqli_query($conn, $check);

    if (mysqli_num_rows($result) > 0) {
        // User exists, redirect to login
        echo "<script>
                alert('Username already exists. Please log in.');
                window.location.href = 'login.html';
              </script>";
    } else {
        // Insert new user
        $query = "INSERT INTO users (fullname, username, password, age, dob) 
                  VALUES ('$fullname', '$username', '$password', '$age', '$dob')";
        if (mysqli_query($conn, $query)) {
            echo "<script>
                    alert('Sign up successful! Please log in.');
                    window.location.href = 'login.html';
                  </script>";
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    }
}
?>

