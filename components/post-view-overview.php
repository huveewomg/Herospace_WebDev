<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
  <link rel="stylesheet" href="post-view.css" />
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

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
        <li><a href="#">Share the Love!</a></li>
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
  <div id="post-view-navbar">
    <ul>
      <li><a class="active" href="#" onclick="window.location='post-view-overview.php'">Overview</a></li>
      <li><a href="#" onclick="window.location='post-view-updates.php'">Updates</a></li>
      <li><a href="#" onclick="window.location='post-view-discussions.php'">Discussion</a></li>
    </ul>
  </div>
  <h1 id="event-name">Event Name</h1>
  <button id="join-event">Join Event</button>
  <div id="row-1">
    <div id="event-description">Description</div>
    <div id="event-details">Details</div>
  </div>
  <div id="row-2" class="flex-container">
    <div id="event-snipshot">Snipshot</div>
    <div id="event-snipshot">Snipshot</div>
    <div id="event-snipshot">Snipshot</div>
  </div>
  <div id="row-3">
    <div id="requirements">Requirements</div>
  </div>
</body>
</html>