<!DOCTYPE html>
<html lang="en">

<!-- Navbar Component -->
<?php include 'navbar.php'; ?>
<link rel="stylesheet" href="change_pass.css" />

<body>
  <div id="column-left">
    <div id="sidebar">
      <h2>Profile</h2>
      <p id="sidebar-p" onclick="window.location = 'edit-profile.php'">Customize Your Profile</p>
      <h2>Recommendation</h2>
      <p id="sidebar-p" onclick="window.location = 'preferences.php'">Preferences</p>
      <h2>Account Management</h2>
      <p id="sidebar-p" onclick="window.location = 'change_pass.php'">Password</p>
    </div>
  </div>
  <div id="column-middle"></div>
  <div id="column-right">
    <h2>Password</h2>
    <br />
    <p>Change your password here.</p>
    <hr />
    <div><strong>Old Password</strong></div>
    <input class="password" type="password" />
    <div><strong>New Password</strong></div>
    <input class="password" type="password" />
    <div><strong>Confirm Password</strong></div>
    <input class="password" type="password" />
    <br>
    <button id="confirm-button">
      Confirm
    </button>
  </div>
</body>

</html>