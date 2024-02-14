<?php
session_start();

//connection
require 'connection.php';

//hide error messages
error_reporting(E_ERROR | E_PARSE);

$state = $_SESSION['state'];

$sql = "SELECT * FROM events ORDER BY event_id DESC";
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

<body>
  <div style="position: relative;">
    <img id="home-cover" src="../assets/img/homepic.webp">
    <button id="host-event" onclick="window.location.href='create-event.php'">
      Host an Event
    </button>
  </div>
  <form role="search" id="searchbar" action="">
    <input id="search" name="search" type="text" placeholder="Enter Tags" autofocus required />
    <button type="submit">Search</button>
  </form>
  <div>

    <div id="events-column">
      <div id="column-right">
        <h1>Latest Events</h1>
        <?php
        $count = 0; // count number of posts
        while ($row1 = $result->fetch_assoc()) {
          if ($count < 3) { // Check if the post is less than 3
            echo "<div class='events scrollFade' onclick=\"window.location='post-view-overview.php?event_id=$row1[event_id]'\">" . $row1['event_name'] . "<br>" . $row1['event_desc'] . "<br>" . $row1['event_req'] . "</div>";
            $count++;
          }
        }
        ?>
        <br>
      </div>
      <div id="column-left">
        <h1>Events from your area</h1>
        <?php
        if ($_SESSION['state'] == null) {
          echo "<div class='no-events scrollFade'>" . "No events in your area.<br><br>Update your location in the Profile Page." .
            "</div>";
        } else {
          $state_sql = $connection->query("SELECT * FROM events WHERE event_state = '$state' ORDER BY event_id DESC LIMIT 3");
          while ($row2 = $state_sql->fetch_assoc()) {
            echo "<div class='events scrollFade' onclick=\"window.location='post-view-overview.php?event_id=$row2[event_id]'\">" . $row2['event_name'] . "<br>" . $row2['event_desc'] . "<br>" . $row2['event_req'] .
              "</div>";
          }
        }
        ?>
      </div>
    </div>
  </div>

  <script src="homescript.js"></script>
</body>

<div style="margin-top: 130vh;">
  <!-- Footer Component -->
  <?php include 'footer.php'; ?>
</div>


</html>