<?php
session_start();

//connection
require 'connection.php';

//hide error messages
error_reporting(E_ERROR | E_PARSE);

$sql = "SELECT * FROM events";
$whereClause = ""; // Initialize the WHERE clause

if (!empty($_GET['search'])) {
  $search = strtolower($_GET['search']);
  $tags = explode(",", $search); // Split the search string into an array of tags

  // Construct the WHERE clause to search for each tag
  foreach ($tags as $tag) {
    $tag = trim($tag); // Remove extra spaces
    if (!empty($tag)) { // Skip empty tags
      if ($whereClause === "") {
        $whereClause .= " WHERE ";
      } else {
        $whereClause .= "OR"; // Add OR condition
      }
      $whereClause .= " event_tags LIKE '%$tag%'"; // Check whether the event_tags column contains the tag
    }
  }

  // Append the WHERE clause to the main SQL query
  $sql .= $whereClause;
}
$result = $connection->query($sql);

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
<link rel="stylesheet" href="homestyle.css" />
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Alice&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Sen:wght@400..800&display=swap" rel="stylesheet">

<body>
  <div style="position: relative;">
    <div style="position: relative;">
      <img id="home-cover" src="../assets/img/homepic.webp">
      <span id='slogan'>Allowing anyone to be a hero with one click</span>
    </div>
    <button id="host-event" onclick="window.location.href='<?php
                                                            if ($_SESSION['status'] == 'admin' || $_SESSION['status'] == 'charity') {
                                                              echo 'create-event.php';
                                                            } else {
                                                              echo 'register-charity.php';
                                                            } ?>'">
      Host an Event
    </button>
  </div>
  <form role="search" id="searchbar" action="">
    <input id="search" name="search" type="text" placeholder="Enter Tags" autofocus required />
    <button type="submit">Search</button>
  </form>
  <div>

    <div id="events-column">

      <!-- All Events -->
      <div id="column-right">
        <h1>Latest Events</h1>
        <?php
        if ($result->num_rows == 0) {
          echo "<div class='no-events scrollFade' onclick='window.location=\"home.php\"'>" . "No events listed under those tags.<br><br> Popular tags: beach, reforestation, river...<br><br> Click to refresh this page." .
            "</div>";
        } else {
          $count = 0; // count number of posts
          while ($row1 = $result->fetch_assoc()) {
            if ($count < 3) { // Check if the post is less than 3
              $charity_name = $connection->query("SELECT name FROM charity WHERE charityid = '$row1[charityid]';");
              $charity_name = $charity_name->fetch_assoc();
              echo "<div class='events scrollFade' onclick=\"window.location='post-view-overview.php?event_id=$row1[event_id]'\"><div id='event-title'>" . $row1['event_name'] . "</div> Hosted By: " . $charity_name['name'] . "<br> Date: " . $row1['event_date'] . "<br> Time: " . $row1['start_time'] . "<br> Participation Fee: RM" . $row1['event_fee'] . "</div>";
              $count++;
            }
          }
        }
        ?>
        <br>
      </div>

      <!-- Events based on Area -->
      <div id="column-left">
        <h1>Events from your area</h1>
        <?php
        $user_state_sql = $connection->query("SELECT state FROM volunteer WHERE email = '$_SESSION[email]' ");
        $user_state = $user_state_sql->fetch_assoc();
        $state_sql = $connection->query("SELECT * FROM events WHERE event_state = '$user_state[state]' ORDER BY event_id DESC LIMIT 3");

        if ($user_state == null || $state_sql->num_rows == 0) {
          echo "<div class='no-events scrollFade'>" . "No events in your area.<br><br>Update your location in the Profile Page." .
            "</div>";
        } else {
          while ($row2 = $state_sql->fetch_assoc()) {
            $charity_name = $connection->query("SELECT name FROM charity WHERE charityid = '$row2[charityid]';");
            $charity_name = $charity_name->fetch_assoc();
            echo "<div class='events scrollFade' onclick=\"window.location='post-view-overview.php?event_id=$row2[event_id]'\"><div id='event-title'>" . $row2['event_name'] . "</div> Hosted By: " . $charity_name['name'] . "<br> Date: " . $row2['event_date'] . "<br> Time: " . $row2['start_time'] . "<br> Participation Fee: RM" . $row2['event_fee'] . "</div>";
          }
        }
        ?>
      </div>
    </div>
  </div>

  <script src="homescript.js"></script>
</body>

<div style="margin-top: 140vh;">
  <!-- Footer Component -->
  <?php include 'footer.php'; ?>
</div>


</html>