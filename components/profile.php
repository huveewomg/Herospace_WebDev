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

<body>
  <div id="profile-background">
    <div id="username"><?php if ($result['name'] != null) {
                          echo $result['name'];
                        } else {
                          echo "Username";
                        }
                        ?></div>
    <button id="edit-profile" onclick="window.location='edit-profile.php'">Edit Profile</button>
  </div>
    <img src="<?php if (file_exists("../assets/profile-pics/" . $result['name'] . ".png")) {
                echo "../assets/profile-pics/" . $result['name'] . ".png";
              } else {
                echo "../assets/profile-pics/images.png";
              }; ?>" alt="Upload File" id="profile-pic">
  <div id="bio">
    <?php if ($result['name'] != null) {
      echo $result['bio'];
    } else {
      echo "Biography";
    }
    ?>
  </div>
  <div id="recent-posts">
    Events Attended
  </div>
</body>

</html>