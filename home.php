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
            margin: 0;
            padding: 0;
        }
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f0f2f5;
            color: #1c1e21;
        }
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: white;
            padding: 8px 16px;
            position: sticky;
            top: 0;
            z-index: 999;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
        }
        .left-header, .center-header, .right-header {
            display: flex;
            align-items: center;
            flex: 1;
        }
        .center-header {
            justify-content: center;
            gap: 35px;
        }
        .nav-icon {
            font-size: 20px;
            padding: 8px;
            border-radius: 10px;
            cursor: pointer;
            transition: background 0.2s;
        }
        .nav-icon:hover {
            background-color: #f0f2f5;
        }
        .search-container {
            display: flex;
            align-items: center;
            background: #f0f2f5;
            border-radius: 20px;
            padding: 8px 15px;
            width: 300px;
        }
        .search-container input {
            background: transparent;
            border: none;
            outline: none;
            margin-left: 10px;
            width: 100%;
            font-size: 15px;
        }
        .profile-pic {
            width: 30px;
            height: 30px;
            border-radius: 50%;
            object-fit: cover;
        }
        .container {
            display: flex;
            gap: 20px;
            max-width: 1200px;
            margin: 20px auto 0;
            align-items: flex-start;
        }
        .sidebar, .rightbar {
            flex-shrink: 0;
        }
        .sidebar {
            width: 25%;
            position: sticky;
            top: 80px;
        }
        .main {
            width: 50%;
        }
        .rightbar {
            width: 25%;
            position: sticky;
            top: 80px;
            height: calc(100vh - 80px);
            overflow-y: auto;
        }
        .menu-item {
    display: flex;
    align-items: center;
    gap: 6px;
    padding: 10px 15px;
    margin: 5px 0;
    border-radius: 8px;
    cursor: pointer;
    background-color: transparent;
    color: #000;
    font-weight: 600;
    transition: background-color 0.3s;
}
.sidebar .menu-item,
.left-menu-item {
    display: flex;
    align-items: center;
    gap: 10px;
    padding: 10px 15px;
    margin: 5px 0;
    border-radius: 8px;
    cursor: pointer;
    background-color: transparent;
    transition: background-color 0.3s;
}

.sidebar .menu-item:hover,
.left-menu-item:hover {
    background-color: #f0f2f5;
}

.rightbar .menu-item {
    display: block;
    padding: 10px 15px;
    margin: 5px 0;
    border-radius: 8px;
    background-color: transparent;
}

.menu-item img {
    width: 28px;
    height: 28px;
    object-fit: cover;
    border-radius: 50%;
}

.menu-item:hover {
    background-color: #3a3b3c; /* Keep your hover color */
}

        .menu-item:hover {
            background: #f0f2f5;
        }
        .story-box {
            display: flex;
            gap: 10px;
            overflow-x: auto;
            margin-bottom: 20px;
            padding: 10px 0;
        }
        .story {
            width: 110px;
            height: 190px;
            background: white;
            border-radius: 10px;
            overflow: hidden;
            text-align: center;
            font-size: 13px;
            box-shadow: 0 1px 4px rgba(0,0,0,0.1);
            position: relative;
            flex-shrink: 0;
        }
        .story img {
            width: 100%;
            height: 140px;
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
            padding: 3px 8px;
            font-size: 16px;
            border: 3px solid white;
        }
        .post-box {
            background: white;
            border-radius: 8px;
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
            padding: 10px 15px;
            border-radius: 20px;
            border: none;
            background: #f0f2f5;
            font-size: 15px;
        }
        .avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            object-fit: cover;
        }
        .post-actions {
            display: flex;
            justify-content: space-around;
            border-top: 1px solid #eee;
            padding-top: 10px;
            margin-top: 10px;
            font-weight: 600;
            color: #65676b;
            font-size: 14px;
            cursor: pointer;
        }

       .post-action {
    display: flex;
    align-items: center;
    gap: 8px;
    padding: 8px 12px;
    border-radius: 8px;
    flex: 1;
    justify-content: center;
    white-space: nowrap;
}
.post-action img, .post-action svg {
    width: 20px;
    height: 20px;
}

        .post-action:hover {
            background: #f0f2f5;
        }
        .post {
            background: white;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 20px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.08);
        }
        .post-header {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 10px;
        }
        .post-user {
            font-weight: 600;
        }
        .post-time {
            font-size: 13px;
            color: #65676b;
        }
        .post-content {
            margin-bottom: 10px;
            font-size: 15px;
            line-height: 1.4;
        }
        .birthdays {
            background: #fff8e1;
            border-left: 3px solid #f7b928;
            padding: 10px;
        }
        .birthdays strong {
            color: #1c1e21;
        }
        @media (max-width: 900px) {
            .container {
                flex-direction: column;
            }
            .sidebar, .rightbar, .main {
                width: 100%;
            }
        }
        .sponsored {
            padding: 10px;
            border-bottom: 1px solid #ddd;
            margin-bottom: 10px;
        }
        .sponsored h4 {
            margin-bottom: 10px;
            color: #65676b;
            font-size: 16px;
        }
        .sponsored-item {
            display: block;
            margin-bottom: 20px;
            text-align: left;
        }
        .sponsored-item img {
            width: 100%;
            height: auto;
            border-radius: 10px;
            margin-bottom: 8px;
            object-fit: cover;
        }
        .sponsored-item a {
            text-decoration: none;
            font-size: 14px;
            color: #1877f2;
        }
        .sponsored-item a:hover {
            text-decoration: underline;
        }
        button.btn-confirm {
            background-color: #1877f2;
            color: white;
            border: none;
            border-radius: 6px;
            padding: 6px 12px;
            cursor: pointer;
        }
         button.btn-delete {
            background-color:rgb(215, 215, 215);
            color: black;
            border: none;
            border-radius: 6px;
            padding: 6px 12px;
            cursor: pointer;
        }
        button.btn-confirm:hover {
            background-color: #155dc0;
        }
        .fb-logo {
    width: 40px;
    height: auto;
    margin-right: 10px;
}
.right-header {
    justify-content: flex-end;
    gap: 12px;
}
.friend-requests-container {
  background-color: #f0f2f5 !important;
  display: flex;
  flex-direction: column;
  gap: 12px;
  padding: 12px;
  border-radius: 10px;
  box-shadow: none !important;
  border: none;
}

.friend-requests-header {
  display: flex;
  justify-content: space-between;
  align-items: center;
  margin-bottom: 12px;
  font-size: 16px;
  font-weight: bold;
}

.see-all {
  font-size: 14px;
  color: #1877f2;
  text-decoration: none;
}

.friend-request {
  display: flex;
  gap: 10px;
  align-items: flex-start;
  margin-bottom: 15px;
}

.avatar {
  width: 60px;
  height: 60px;
  border-radius: 50%;
  object-fit: cover;
}

.friend-info {
  flex: 1;
}

.friend-name {
  font-weight: 600;
  font-size: 15px;
  margin-bottom: 4px;
}

.mutual-friends {
  font-size: 13px;
  color: #65676b;
  margin-bottom: 8px;
}

.friend-actions {
  display: flex;
  gap: 8px;
}

.avatar {
  width: 50px;
  height: 50px;
  border-radius: 50%;
  object-fit: cover;
}

.friend-info {
  display: flex;
  flex-direction: column;
  flex-grow: 1;
}

.friend-name {
  font-weight: 600;
  font-size: 14px;
  margin-bottom: 5px;
}


.friend-requests-container {
  display: flex;
  flex-direction: column;
  gap: 12px;
  padding: 12px;
  background: #fff;
  border-radius: 10px;
}

.friend-requests-header {
  display: flex;
  justify-content: space-between;
  align-items: center;
  font-weight: 600;
  font-size: 15px;
}

.friend-request {
  display: flex;
  gap: 10px;
  align-items: flex-start;
  padding: 10px 15px;
  border-radius: 10px;
  margin-bottom: 10px;
  max-width: 400px;
  background-color: transparent; /* Orrgb(64, 57, 165) if you want soft gray */
}


.friend-info {
  display: flex;
  flex-direction: column;
  gap: 5px;
  flex: 1;
}

.friend-actions {
  display: flex;
  gap: 8px;
}
.post-stats {
  display: flex;
  justify-content: space-between;
  align-items: center;
  font-size: 14px;
  padding: 6px 12px;
  color: #65676b;
  border-top: 1px solid #ddd;
  margin-top: 10px;
}

.likes {
  display: flex;
  align-items: center;
  gap: 6px;
}

.like-icon {
  width: 18px;
  height: 18px;
  background-color: #1877f2;
  padding: 4px;
  border-radius: 50%;
}

.stats-right span {
  margin-left: 6px;
}



    </style>
</head>
<body>
<div class="header">
    <div class="left-header">
        <img src="images/facebook.png" alt="Facebook Logo" style="width: 40px; margin-right: 10px;">
        <div class="search-container">
            <input type="text" placeholder="Search Facebook">
        </div>
    </div>

    <div class="center-header">
    <div class="nav-icon" title="Home">
        <img src="images/house-solid.svg" alt="Home"style="width: 28px; height: 28px;">
    </div>

    <div class="nav-icon" title="Video">
        <img src="images/youtube-brands.svg" alt="Video"style="width: 28px; height: 28px;">
    </div>
        
          <div class="nav-icon" title="Marketplace">
        <img src="images/store.svg" alt="Marketplace"style="width: 28px; height: 28px;">
    </div>
       
        <div class="nav-icon" title="Groups">
        <img src="images/users-line-solid.svg" alt="Groups"style="width: 28px; height: 28px;">
    </div>
       <div class="nav-icon" title="Gaming">
    <img src="images/gamepad-solid.svg" alt="Gaming" style="width: 28px; height: 28px;">
</div>

    </div>

    <div class="right-header" style="justify-content: flex-end; gap: 12px;">

<div class="nav-icon" title="Messages">
          <img src="images/bars-solid.svg" alt="Menu" style="width: 18px; height: 18px;">
</div>

        <div class="nav-icon" title="Messages">
          <img src="images/facebook-messenger-brands.svg" alt="Menu" style="width: 18px; height: 18px;">
</div>


        <div class="nav-icon" title="Notification">
         <img src="images/bell-solid.svg" alt="Menu" style="width: 18px; height: 18px;">
</div>

        <img src="images/audrey.jpg" class="profile-pic" alt="Audrey">
        <form action="logout.php" method="post" style="margin: 0;">
            <button class="btn-confirm" style="margin-left: 8px;">Logout</button>
        </form>
    </div>
</div>

<div class="container">
    
    <div class="sidebar">
        <div class="menu-item">
            <img src="images/audrey.jpg" class="avatar" alt="Profile">
            <span><?php echo $username; ?></span>
        </div>
        
        <div class="menu-item">
            <img src="images/download234.png" class="avatar" alt="Meta AI Logo">
            <span>Meta AI</span> 
        </div>

        <div class="menu-item">
  <img src="images/user-group-solid.svg" class="avatar" alt="Friends">
  <span>Friends</span>
</div>

<div class="menu-item">
  <img src="images/chart-simple-solid.svg" class="menu-icon" alt="Professional dashboard">
  <span>Professional dashboard</span>
</div>
       <div class="menu-item">
  <img src="images/business-time-solid.svg" class="menu-icon" alt="Feeds">
  <span>Feeds</span>
</div>


<div class="menu-item">
  <img src="images/users-line-solid.svg" class="menu-icon" alt="Groups">
  <span>Groups</span>
</div>


<div class="menu-item">
  <img src="images/store-solid.svg" class="menu-icon" alt="Marketplace">
  <span>Marketplace</span>
</div>

<div class="menu-item">
  <img src="images/youtube-brands.svg" class="menu-icon" alt="Reels">
  <span>Reels</span>
</div>

<div class="menu-item">
  <img src="images/clock-solid.svg" class="menu-icon" alt="Memories">
  <span>Memories</span>
</div>

    </div>

    <div class="main">
        <div class="story-box">
            <div class="story create-story">
                <img src="images/audrey.jpg" alt="Create Story">
                <div class="plus">+</div>
                <p>Create story</p>
            </div>
            <div class="story"><img src="images/beau.jpg" alt="Silence"><p>Beauty Musarara</p></div>
            <div class="story"><img src="images/oga.jpg" alt="Top"><p>Tadiwa</p></div>
            <div class="story"><img src="images/augustine.jpeg" alt="Alpha"><p>Augustine Mtumbi</p></div>
            <div class="story"><img src="images/smelita.jpg" alt="Ndavanepgwe"><p>Smelita Musara</p></div>
        </div>

        <div class="post-box">
            <div class="post-input">
                <img src="images/audrey.jpg" class="avatar" alt="avatar">
                <input type="text" placeholder="What's on your mind, <?php echo $username; ?>?">
            </div>
            <div class="post-actions">

            <div class="post-action">
    <img src="images/video-solid.svg" alt="Live" style="width: 26px; height: 26px;">
    <span>Live video</span>
</div>
<div class="post-action">
    <img src="images/images-solid.svg" alt="Photo/Video" style="width: 26px; height: 26px;">
    <span>Photo/video</span>
</div>
<div class="post-action">
   <svg width="200" height="200" viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg">
  <!-- Outer rounded rectangle -->
<rect x="4" y="8" width="64" height="56" rx="12" ry="12" fill="#FF0000" />


  <!-- Inner play button triangle -->
  <polygon points="26,22 44,32 26,42" fill="white" />
  <!-- Film strip holes (circles) -->
  <circle cx="12" cy="16" r="3" fill="white" />
  <circle cx="12" cy="32" r="3" fill="white" />
  <circle cx="12" cy="48" r="3" fill="white" />

</svg>

    <span>Reel</span>
</div>



            </div>
        </div>

        <div class="post">
            <div class="post-header">
                <img src="images/Wicknell-Chivayo.jpg" class="avatar" alt="Wicknell-Chivayo">
                <div>
                    <div class="post-user">Wicknell Chivayo</div>
                    <div class="post-time">June 24 at 2:51 PM  🌤</div>
        
                </div>
            </div>
            <div class="post-content">
                <p><strong>Wicknell Chivayo</strong></p>
                <p>Bought another Rolls Royce today 😎</p>
                <img src="images/wicknell.jpeg" alt="Post" style="width: 100%; border-radius: 8px; margin-top: 10px;">
                <div class="post-stats">

</div>
<div class="post-stats">
  <div class="likes">
    <img src="images/thumbs-up-solid (1).svg" alt="Like" class="like-icon">
    <span>5.2K</span>
  </div>
  <div class="stats-right">
    <span>980 Comments</span>
    <span>·</span>
    <span>320 Shares</span>
  </div>
</div>

            </div>
        </div>

        <div class="post">
            <div class="post-header">
                <img src="images/kylie-jenner.avif" class="avatar" alt="Kylie Jenner">
                <div>
                    <div class="post-user">Kylie Jenner</div>
                    <div class="post-time">June 24 at 3:10 PM</div>
                </div>
            </div>
            <div class="post-content">
                <p>Self-love is the best love 💖</p>
                <img src="images/kylie-jenner.avif" alt="Post" style="width: 100%; border-radius: 8px; margin-top: 10px;">
            </div>
            <div class="post-stats">
  <div class="likes">
    <img src="images/thumbs-up-solid (1).svg" alt="Like" class="like-icon">
    <span>544.2K</span>
  </div>
  <div class="stats-right">
    <span>198k Comments</span>
    <span>·</span>
    <span>34k Shares</span>
  </div>
</div>
        </div>
    </div>

 <div class="rightbar">
    <div class="friend-requests-container">

  <div class="friend-requests-header">
    <span>Friend Requests</span>
    <a href="#" style="color: #1877f2; text-decoration: none; font-size: 14px;">See all</a>
  </div>

  <div class="friend-request">
    <img src="images/malv.jpg" alt="Shamila M." class="avatar" width="50">

    <div class="friend-info">
      <strong>Shamila M.</strong>
      <span style="font-size: 13px; color: gray;">116 mutual friends</span>
      <div class="friend-actions">
        <button class="confirm-btn">Confirm</button>
        <button class="delete-btn">Delete</button>
      </div>
    </div>
  </div>

    

</div>
        <div class="left-menu-item birthdays">
            <strong>Birthdays</strong>
            <p style="margin-top: 8px;">Lawson Cartie and 22 others have birthdays today</p>
        </div>
        <div class="left-menu-item sponsored">
            <h4>Sponsored</h4>
            <div class="sponsored-item">
                <img src="images/l.jpeg" alt="Sponsored Ad">
                <a href="https://www.deriv.com" target="_blank">Want to know how Forex trading works?</a>
            </div>
        </div>
    </div>
</div>
</body>
</html>
