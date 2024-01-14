<?php

session_start();
include('connection.php');

$sql = "Select * from volunteer where email = '$_SESSION[email]'";
$result =  $connection->query($sql);
$result = $result->fetch_assoc();

?>

<!DOCTYPE html>
<html lang="en">

<!-- Navbar Component -->
<?php include 'navbar.php'; ?>
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
  <form action="edit-profile.php" method="post">
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
          <input type="text" style="border-width: 2px;" value="<?php echo $result['name']; ?>" />
        </div>
        <div id="age-column">
          <div id="age">
            Age
            <br />
            <input type="text" style="border-width: 2px;" value="<?php echo $result['age'] == null ? 0 : $result['age'];?>" />
          </div>
          <div id="state">
            <label for="dropdown">State</label> <br />
            <select id="dropdown" name="dropdown" style="border-width: 2px;border-color: black;" >
              <option value="option1">Johor</option>
              <option value="option2">Kedah</option>
              <option value="option3">Kelantan</option>
              <option value="option1">Malacca</option>
              <option value="option2">Negeri Sembilan</option>
              <option value="option3" selected>Pahang</option>
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
  </form>

</body>

</html>