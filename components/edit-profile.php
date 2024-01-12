<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
  <link rel="stylesheet" href="edit-profile.css" />
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
                <li><a href="#" onclick="window.location='featured-projects.html'">Featured</a></li>
                <li><a href="#">Recent Posts</a></li>
              </ul>
            </div>
          </li>
          <li><a href="#" onclick="window.location='about-us.html'">About Us</a></li>
          <li><a href="#" onclick="window.location='create-event.html'">Share the Love!</a></li>
        </ul>
  
        <div id="profile-logo-container">
          <div id="myDropdown" class="dropdown" onclick="toggleDropdown('myDropdown')">
            <span class="material-symbols-outlined md-36" id="profile-logo">
              person
            </span>
            <div class="dropdown-content">
              <li onclick="window.location = 'profile.html'">Profile</li>
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
  <div id="column-left">
    <div id="sidebar">
      <h2>Profile</h2>
      <p id="sidebar-p"  onclick="window.location = 'edit-profile.php'">Customize Your Profile</p>
      <h2>Recommendation</h2>
      <p id="sidebar-p" onclick="window.location = 'preferences.php'">Preferences</p>
      <h2>Account Management</h2>
      <p id="sidebar-p" onclick="window.location = 'change_pass.php'">Password</p>
    </div>
  </div>
  <div id="column-middle"></div>

  <div id="column-right">
    <div id="profile-info"></div>
    <h2>Profile Information</h2>
    <p>This information will appear on your public profile.</p>
    <hr />
    <div id="profile-pic-row">
      <div id="profile-pic-column">
        <p style="margin-left: 10px">Profile Pic</p>
        <div id="profile-pic">
          <img id="profile-img" src="..//assets/img/Logo.png" alt="testing" />
        </div>
      </div>
      <div id="name-column">
        <div id="name">Name</div>
        <input type="text" style="border-width: 2px;" />
      </div>
      <div id="age-column">
        <div id="age">
          Age
          <br />
          <input type="text" style="border-width: 2px;" />
        </div>
        <div id="state">
          <label for="dropdown">State</label> <br />
          <select id="dropdown" name="dropdown" style="border-width: 2px;border-color: black;">
            <option value="option1">Johor</option>
            <option value="option2">Kedah</option>
            <option value="option3">Kelantan</option>
            <option value="option1">Malacca</option>
            <option value="option2">Negeri Sembilan</option>
            <option value="option3">Pahang</option>
            <option value="option1">Penang</option>
            <option value="option2">Perak</option>
            <option value="option3">Perlis</option>
            <option value="option1">Sabah</option>
            <option value="option2">Sarawak</option>
            <option value="option3">Selangor</option>
            <option value="option1">Terengganu</option>
            <option value="option2">WP KL</option>
            <option value="option3">WP Labuan</option>
          </select>
        </div>
        <div id="gender">
          Gender <br />
          <select id="dropdown" name="dropdown" style="border-width: 2px;border-color: black;">
            <option value="option1">Male</option>
            <option value="option2">Female</option>
            <option value="option3">Other</option>
          </select>
        </div>
      </div>
    </div>

    <div id="bio-row">
      Bio <br /><textarea name="" cols="30" rows="10" id="bio-textarea"></textarea>
      <br>
      <br>
      <button id="submit-button">Submit</button>
    </div>
  </div>
</body>

</html>