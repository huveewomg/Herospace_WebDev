<?php
session_start();

//connection
require 'connection.php';

//hide error messages
error_reporting(E_ERROR | E_PARSE);

$sql = "SELECT * from volunteer where email = '$_SESSION[email]';";
$result = $connection->query($sql);
$result = $result->fetch_assoc();

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
<link rel="stylesheet" href="profile.css" />
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />

<body>
  <div id="profile-background">
    <div id="username">Hello, <?php if ($result['name'] != null) {
                                echo $result['name'];
                              } else {
                                echo "Username";
                              }
                              ?>!<span id="wave" class="material-symbols-outlined">
        waving_hand
      </span></div>
    <button id="edit-profile" onclick="window.location='edit-profile.php'">Edit Profile</button>
  </div>
  <img src="<?php if (file_exists("../assets/profile-pics/" . $result['name'] . ".png")) {
              echo "../assets/profile-pics/" . $result['name'] . ".png";
            } else {
              echo "../assets/profile-pics/images.png";
            }; ?>" alt="Upload File" id="profile-pic">

  <div id="column-left">
    <div id="card-left">
    <span id="point" class="material-symbols-outlined">
        arrow_right_alt
      </span>
      <br>
      A little something about myself, <br>
      but first here's my Biography.
      <br>
      <br>
      <?php if ($result['name'] != null) {
        echo $result['bio'];
      } else {
        echo "Biography";
      }
      ?>
    </div>
  </div>
  <div id="column-right">
    <div id="card-right">
      <div id ="name">NAME: <?php echo $result['name']; ?></div>
      <div id ="details">AGE: <?php echo $result['age']; ?></div>
      <div id ="details">STATE: <?php echo $result['state']; ?></div>
      <div id ="details">GENDER: <?php echo $result['gender']; ?></div>
      <div id ="details">PREFERENCES: <?php echo trim($result['preferences'], ','); ?></div>
    </div>


  </div>


</body>

</html>