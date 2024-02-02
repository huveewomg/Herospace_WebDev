<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Herospace</title>
  <link rel="stylesheet" href="homestyle.css" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
  <link rel="icon" type="image/png" href="../assets/favicon_io/favicon-16x16.png" />
  <div id="container">
    <nav>
      <div id="logo-container">
        <img src="../assets/img/Logo.png" alt="" id="logo" />
      </div>
      <ul>
        <li onclick="window.location='home.php'"><a href="#">Home</a></li>
        <li class="dropdown" onmouseover="hover(this);" onmouseout="out(this);" style="position: relative; z-index: 9999;">
          <a href="#">Projects &nbsp;</a>
          <div class="dd">
            <div id="up_arrow"></div>
            <ul>
              <li onclick="window.location='featured-projects.php'"><a href="#" >Featured</a></li>
              <li><a href="#">Recent Posts</a></li>
            </ul>
          </div>
        </li>
        <li onclick="window.location='about-us.php'"><a href="#" >About Us</a></li>
        <li onclick="window.location='create-event.php'"  ><a href="#" >Share the Love!</a></li>
      </ul>

      <div id="profile-logo-container">
        <div id="myDropdown" class="dropdown" onclick="toggleDropdown('myDropdown')">
          <span class="material-symbols-outlined md-36" id="profile-logo">
            person
          </span>
          <div class="dropdown-content">
            <li onclick="window.location = 'profile.php'">Profile</li>
            <li onclick="window.location = 'logout.php'">Logout</li>
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