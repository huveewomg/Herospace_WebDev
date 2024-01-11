<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="profile.css" />
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200"
    />

    <div id="container">
      <nav>
        <div id="logo-container">
          <img src="../assets/img/Logo.png" alt="" id="logo" />
        </div>
        <ul>
          <li><a href="#" onclick="window.location='home.php'">Home</a></li>
          <li class="dropdown" onmouseover="hover(this);" onmouseout="out(this);"
            style="position: relative; z-index: 9999;">
            <a href="#">Projects &nbsp;<i class="fa fa-caret-down"></i></a>
            <div class="dd">
              <div id="up_arrow"></div>
              <ul>
                <li><a href="#" onclick="window.location='featured-projects.php'">Featured</a></li>
                <li><a href="#">Recent Posts</a></li>
              </ul>
            </div>
          </li>
          <li><a href="#" onclick="window.location='about-us.php'">About Us</a></li>
          <li><a href="#" onclick="window.location='create-event.php'">Share the Love!</a></li>
        </ul>
  
        <div id="profile-logo-container">
          <div id="myDropdown" class="dropdown" onclick="toggleDropdown('myDropdown')">
            <span class="material-symbols-outlined md-36" id="profile-logo">
              person
            </span>
            <div class="dropdown-content">
              <li onclick="window.location = 'profile.php'">Profile</li>
              <li>Logout</li>
            </div>
          </div>
        </div>
      </nav>
    </div>
    <script>
      function toggleDropdown(dropdownId) {
        var dropdown = document.getElementById(dropdownId);
        dropdown.classList.toggle("active");
      }
    </script>
  </head>

  <body>
    <div id="profile-background">
        <div id="username">Username</div>
        <button id="edit-profile" onclick="window.location='edit-profile.php'">Edit Profile</button>
    </div>
    <div id="profile-pic">
        Profile Picture
    </div>
    <div id="bio">
        Biography
    </div>
    <div id="recent-posts">
        Recent Posts
    </div>
  </body>
</html>
