<?php

session_start();
require('connection.php');

$sql = "SELECT * from volunteer where email = '$_SESSION[email]';";
$result =  $connection->query($sql);
$result = $result->fetch_assoc();

//Getting data from the user row
$selected_option = $result['state'];
$gender = $result['gender'];

?>
<!DOCTYPE html>
<html lang="en">

<!-- Navbar Component -->
<?php
if ($_SESSION['status'] == 'admin' || $_SESSION['status'] == 'charity') {
  include 'admin navbar.php';
} else {
  include 'navbar.php';
} ?>

<link rel="stylesheet" href="edit-profile.css" />

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

  <!-- Submit edited information form -->
  <form action="save-edit-profile.php" method="post" enctype="multipart/form-data">
    <input name="email" type="hidden" value=<?php echo "$_SESSION[email]" ?> />
    <div id="column-right">
      <div id="profile-info"></div>
      <h2>Profile Information</h2>
      <p>This information will appear on your public profile.</p>
      <hr />
      <div id="profile-pic-row">
        <div id="profile-pic-column">
          <p style="margin-left: 10px">Profile Pic</p>
          <input type="file" id="profile-pic" name="profile-pic" accept="image/*">
          <label for="profile-pic">
            <img src="<?php if (file_exists("../assets/profile-pics/" . $result['name'] . ".png")) {
                        echo "../assets/profile-pics/" . $result['name'] . ".png";
                      } else {
                        echo "../assets/profile-pics/images.png";
                      }; ?>" alt="Upload File" id="profile-pic-label">
            <p id="caption">No file Selected</p>
          </label>

          <script>
            function checkFileInput() {
              var fileInput = document.getElementById('profile-pic');
              if (fileInput && fileInput.files && fileInput.files.length > 0) {
                document.getElementById('caption').innerHTML = '<p style="color:green;margin-left: 0.5vh;">File Selected</p>';
              } else {
                document.getElementById('caption').innerHTML = '<p>No File Selected</p>';
              }
            }

            // Call the checkFileInput function when the file input changes
            document.getElementById('profile-pic').addEventListener('change', checkFileInput);
          </script>

        </div>
        <!-- Name input -->
        <div id="name-column">
          <div id="name">Name</div>
          <input type="text" style="border-width: 2px;" value="<?php echo $result['name']; ?>" name="name" />
        </div>

        <!-- Age input -->
        <div id="age-column">
          <div id="age">
            Age
            <br />
            <input type="text" style="border-width: 2px;" value="<?php echo $result['age'] == null ? 0 : $result['age']; ?>" name="age" />
          </div>
          <div id="state">
            <label for="dropdown">State</label> <br />
            <select id="dropdown" name="state" style="border-width: 2px;border-color: black;">
              <?php
              $options = array('Kedah', 'Kelantan', 'Malacca', 'Negeri Sembilan', 'Pahang', 'Penang', 'Perak', 'Perlis', 'Sabah', 'Sarawak', 'Selangor', 'Terengganu', 'Johor', 'Kuala Lumpur', 'Labuan', 'Putrajaya');

              // Generate options dynamically
              foreach ($options as $option) {
                echo '<option value="' . $option . '" ' . ($selected_option === $option ? 'selected' : '') . '>' . $option . '</option>';
              }
              ?>
            </select>
          </div>
          <div id="gender">
            Gender <br />
            <select id="dropdown" name="gender" style="border-width: 2px;border-color: black;">
              <?php
              $options = array('Male', 'Female', 'Other');

              // Generate options dynamically
              foreach ($options as $option) {
                echo '<option value="' . $option . '" ' . ($gender === $option ? 'selected' : '') . '>' . $option . '</option>';
              }
              ?>
            </select>
          </div>
        </div>
      </div>

      <div id="bio-row">
        Bio <br /><textarea name="bio" cols="30" rows="10" id="bio-textarea"><?php echo htmlspecialchars($result['bio']); ?></textarea>
        <br>
        <br>
        <button type="submit" name="submit" id="submit-button">Submit</button>
      </div>
    </div>
  </form>

</body>

</html>