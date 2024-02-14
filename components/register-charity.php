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
        <p id="about-us"><strong>INTERESTED TO START CREATING EVENTS? LIST A CHARITY.</strong></p>
        <img src="../assets/img/Logo.png" alt="" id="front-logo">
      </div>
    <script src="homescript.js"></script>
  </body>


</html>
