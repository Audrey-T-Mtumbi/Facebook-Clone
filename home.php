<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.html");
    exit();
}
$username = $_SESSION['username'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Facebook Home</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <style>
        * {
            box-sizing: border-box;
        }
        body {
            margin: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f0f2f5;
        }

        .header {
            background-color: #1877f2;
            color: white;
            padding: 12px 20px;
            font-size: 22px;
            font-weight: bold;
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        .header-icons {
            display: flex;
            gap: 15px;
            font-size: 18px;
        }

        .logout {
            background: white;
            color: #1877f2;
            padding: 6px 12px;
            border: none;
            border-radius: 20px;
            cursor: pointer;
            font-weight: bold;
        }

        .container {
            display: flex;
            padding: 20px;
            gap: 15px;
        }

        .sidebar, .rightbar {
            width: 20%;
            position: sticky;
            top: 70px;
            height: fit-content;
        }

        .main {
            width: 60%;
        }

        .menu-item {
            padding: 12px;
            background: white;
            margin-bottom: 10px;
            border-radius: 10px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.08);
            cursor: pointer;
            transition: background 0.3s;
        }

        .menu-item:hover {
            background: #f0f2f5;
        }

        .story-box {
            display: flex;
            gap: 10px;
            overflow-x: auto;
            margin-bottom: 20px;
        }

        .story {
            width: 110px;
            height: 180px;
            background: white;
            border-radius: 12px;
            overflow: hidden;
            text-align: center;
            font-size: 14px;
            box-shadow: 0 1px 4px rgba(0,0,0,0.1);
        }

        .story img {
            width: 100%;
            height: 130px;
            object-fit: cover;
        }

        .create-story .plus {
            position: absolute;
            bottom: 50px;
            left: 50%;
            transform: translateX(-50%);
            background: #1877f2;
            color: white;
            border-radius: 50%;
            padding: 3px 9px;
            font-size: 18px;
        }

        .post-box {
            background: white;
            border-radius: 12px;
            padding: 15px;
            margin-bottom: 20px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
        }

        .post-input {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .post-input input {
            flex: 1;
            padding: 12px;
            border-radius: 25px;
            border: 1px solid #ccc;
        }

        .avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
        }

        .post-actions {
            display: flex;
            justify-content: space-around;
            border-top: 1px solid #eee;
            padding-top: 10px;
            margin-top: 10px;
            font-weight: bold;
            color: #65676b;
            font-size: 14px;
        }

        .post {
            background: white;
            padding: 15px;
            border-radius: 12px;
            margin-bottom: 20px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.08);
        }

        .post img {
            width: 100%;
            margin-top: 10px;
            border-radius: 10px;
        }

        @media (max-width: 900px) {
            .container {
                flex-direction: column;
            }
            .sidebar, .rightbar {
                width: 100%;
            }
            .main {
                width: 100%;
            }
        }
    </style>
</head>
<body>

<div class="header">
    facebook
    <div class="header-icons">
        🔔 📨 🧍
    </div>
    <form action="logout.php" method="post" style="margin: 0;">
        <button class="logout">Logout</button>
    </form>
</div>

<div class="container">
    <div class="sidebar">
        <div class="menu-item">👤 <?php echo $username; ?></div>
        <div class="menu-item">🎯 Friends</div>
        <div class="menu-item">📺 Reels</div>
        <div class="menu-item">🛒 Marketplace</div>
        <div class="menu-item">📘 Groups</div>
        <div class="menu-item">💾 Saved</div>
        <div class="menu-item">🕓 Memories</div>
    </div>

    <div class="main">
        <div class="story-box">
            <div class="story create-story" style="position: relative;">
                <img src="images/audrey.jpg" alt="Create Story">
                <div class="plus">+</div>
                <p>Create story</p>
            </div>
            <div class="story"><img src="images/augustine.jpeg" alt=""><p>Augustine</p></div>
            <div class="story"><img src="images/beau.jpg" alt=""><p>Beauty</p></div>
            <div class="story"><img src="images/smelita.jpg" alt=""><p>Smelita</p></div>
            <div class="story"><img src="images/malv.jpg" alt=""><p>Malvin</p></div>
            <div class="story"><img src="images/oga.jpg" alt=""><p>Tadiwa</p></div>
        </div>

        <div class="post-box">
            <div class="post-input">
                <img src="images/audrey.jpg" class="avatar" alt="avatar">
                <input type="text" placeholder="What's on your mind, <?php echo $username; ?>?">
            </div>
            <div class="post-actions">
                📹 Live &nbsp;&nbsp; 📸 Photo/Video &nbsp;&nbsp; 🎬 Reel
            </div>
        </div>

        <div class="post">
            <strong>Wicknell Chivayo</strong>
            <p>Bought another Rolls Royce today 😎</p>
            <img src="images/wicknell.jpeg" alt="Post">
        </div>

        <div class="post">
            <strong>Kylie Jenner</strong>
            <p>Self-love is the best love 💖</p>
            <img src="images/kylie-jenner.avif" alt="Post">
        </div>
    </div>

    <div class="rightbar">
        <div class="menu-item" style="background-color: #fcecec; color: #d9534f;">
            🎂 <strong>Birthdays</strong>
            <p style="margin-top: 8px;">Today is <strong>Tanaka Mucheche</strong>'s birthday 🎉</p>
        </div>
        <div class="menu-item">
            <strong>Contacts</strong>
            <p>🟢 Tawanda Mudenga</p>
            <p>🟢 Marlvin Munyanyi</p>
            <p>🟢 Jazmin Bland</p>
            <p>🟢 Tanaka Mucheche</p>
            <p>🟢 Makanaka Ishe</p>
            <p>🟢 Sean Sezere</p>
        </div>
    </div>
</div>

</body>
</html>

