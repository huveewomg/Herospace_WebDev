<?php
include('components/connection.php');

$sql = "SELECT COUNT(event_id) as eventCount FROM test.events";
$result = mysqli_query($connection, $sql);

if ($result) {
    $row = mysqli_fetch_assoc($result);
    echo '<script>var eventCount = ' . $row['eventCount'] . ';</script>';
} else {
    echo '<script>var eventCount = 0;</script>';
}

mysqli_close($connection);
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Herospace</title>
    <link rel="stylesheet" href="styles.css" />
    <link rel="icon" type="image/png" href="assets/favicon_io/favicon-16x16.png" />

    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:ital,wght@0,500;0,700;0,800;0,900;1,500&display=swap"
      rel="stylesheet"
    />
    <link
      href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400&display=swap"
      rel="stylesheet"
    />
  </head>
  <body>
    <div class="content">
      <img id="logo" src="assets/img/Logo.png" alt="Logo">
      <h1>BE A <span id="hero-text">HERO</span> FOR A DAY</h1>
      <h2>Together, we can change the lives of millions in Malaysia!</h2>
      <button id="loginBt" type="submit" onclick="window.location.href='components/login.php'"><span>Login</span></button>
      <button id="guestBt" type="submit" onclick="window.location.href='components/login.php'"><span>Continue as Guest</span></button>
      <div id="stats-title">
        <p id="stats-title-p">STATISTICS</p>
      </div>
      <div id="stats">
        <p>EVENTS HOSTED</p>
        <div id="eventCounter">0</div>
      </div>
    </div>

    <script>
    document.addEventListener("DOMContentLoaded", function () {
        // Get the element where the counter will be displayed
        var counterElement = document.getElementById("eventCounter");

        // Function to animate the counter
        function animateCounter(targetNumber) {
            var count = 0;
            var duration = 2000; // Adjust the duration of the animation (in milliseconds)
            var interval = 50; // Adjust the interval between counts (in milliseconds)
            var steps = duration / interval;
            var stepValue = targetNumber / steps;

            var counterInterval = setInterval(function () {
                count += stepValue;

                // Update the displayed number during the animation
                counterElement.textContent = Math.floor(count);

                if (count >= targetNumber) {
                    // Stop the interval when the target number is reached
                    clearInterval(counterInterval);
                }
            }, interval);
        }
        animateCounter(eventCount);
    });
</script>

  </body>
</html>

