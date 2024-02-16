<?php
session_start();

//connection
require 'connection.php';

//hide error messages
error_reporting(E_ERROR | E_PARSE);
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

<link rel="stylesheet" href="register-charity.css" />
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Sen:wght@400..800&display=swap" rel="stylesheet">


  <body>
  <div class="scrollFade">
    <div id="front-shape">
        <p id="about-us"><strong>INTERESTED TO START CREATING EVENTS? LIST A <a href="https://forms.gle/eMGyzHYNxvecnqXj9" target="_blank">CHARITY</a> OR CONTACT OUR BOARD OF DIRECTOR BELOW.</strong></p>
        <div id=row>
          <a href="https://github.com/zzSleepyCoderzz" target="_blank"><img id= timpfp src="https://avatars.githubusercontent.com/u/73248416?v=4" alt=""></a>
          <a href="https://github.com/huveewomg" target="_blank"><img id="wongpfp" src="../assets/profile-pics/huvee.jpg" alt=""></a>
          <img src="../assets/img/Logo.png" alt="" id="front-logo">
          <a href="https://github.com/spacemxchi" target="_blank"><img id="shanpfp" src="../assets/profile-pics/images.png" alt=""></a>
          <a href="https://github.com/cookspaghetti" target="_blank"><img id="alexpfp" src="../assets/profile-pics/alex.jpg" alt=""></a>
        </div>
      </div>
    <script src="homescript.js"></script>

    <footer style='margin-top:40vh'>
      <?php include 'footer.php'; ?>
    </footer>
  </body>


</html>
