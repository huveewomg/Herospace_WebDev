<!DOCTYPE html>
<html lang="en">
  
<!-- Navbar Component -->
<?php include 'navbar.php'; ?>
<link rel="stylesheet" href="preferences.css" />

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
    <h2>Preferences</h2>
    <br>
    <p>This information helps us match your desired events.</p>
    <hr>
    <p><strong>What is your preferred community service(s)?</strong></p>
    <div id="tag_column1">
      <div class="tag">Hello</div>
      <div class="tag">World</div>
      <div class="tag">One</div>
      <div class="tag">Hello</div>
      <div class="tag">World</div>
      <div class="tag">One</div>
    </div>
    <div id="tag_column2">
      <div class="tag">Hello</div>
      <div class="tag">World</div>
      <div class="tag">One</div>
      <div class="tag">Hello</div>
      <div class="tag">World</div>
      <div class="tag">One</div>
    </div>
    <div id="tag_column3">
      <div class="tag">Hello</div>
      <div class="tag">World</div>
      <div class="tag">One</div>
      <div class="tag">Hello</div>
      <div class="tag">World</div>
      <div class="tag">One</div>
    </div>
  </div>
</body>

</html>