<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="about-us.css" />
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
              <li >Logout</li>
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
    <div id="front-shape">
      <p id="about-us"><strong>About Us</strong></p>
      <img src="../assets/img/Logo.png" alt="" id="front-logo">
    </div>
    <div id="awards">
      one two three four
    </div>
    <div id="slogan">
      Allowing anyone to be a hero with one click
    </div>
    <div id="introduction">
      Introduction
    </div>
    <div id="front-last-row">
      <div id="column-right">STORY</div>
      <div id="column-left">World</div>
    </div>
    <div id="board">
      <strong>BOARD OF DIRECTORS</strong>
      <div>
        <div id="director-img-left"></div>
        <div id="self-introduction-right"></div>
      </div>
      <div>
        <div id="director-img-right"></div>
        <div id="self-introduction-left"></div>
      </div>
      <div>
        <div id="director-img-left"></div>
        <div id="self-introduction-right"></div>
      </div>
      <div>
        <div id="director-img-right"></div>
        <div id="self-introduction-left"></div>
      </div>
  </body>
</html>
