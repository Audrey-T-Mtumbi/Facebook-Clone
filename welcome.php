<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <style>
        .popup {
            position: fixed;
            top: 30%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: white;
            color: #333;
            padding: 30px 50px;
            border: 2px solid #1877f2;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.3);
            font-family: Arial, sans-serif;
            font-size: 22px;
            text-align: center;
            z-index: 1000;
        }

        body {
            background-color: #f0f2f5;
            margin: 0;
        }
    </style>
    <script>
        setTimeout(function() {
            window.location.href = "home.php";
        }, 3000); // redirect after 3 seconds
    </script>
</head>
<body>
    <div class="popup">
        <h1>Welcome, <?php echo $_SESSION['username']; ?>!</h1>
        <p>Redirecting to your Facebook page...</p>
    </div>
</body>
</html>
