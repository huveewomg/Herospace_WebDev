<?php
session_start();

//connection
require 'connection.php';

//hide error messages
error_reporting(E_ERROR | E_PARSE);

$state = $_SESSION['state'];

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
<?php include 'navbar.php'; ?>
<link rel="stylesheet" href="homestyle.css" />

<body>
  <div style="position: relative;">
    <img id="home-cover" src="https://cloudfront-us-east-2.images.arcpublishing.com/reuters/UHEUMBOZ3JNKPDFPX3IEPHOPCI.jpg">
    <button id="host-event">
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
        <?php while ($row1 = $result->fetch_assoc()) {

          echo "<div class='events scrollFade' onclick=\"window.location='post-view-overview.php?event_id=$row1[event_id]'\">" . $row1['event_name'] . "<br>" . $row1['event_desc'] . "<br>" . $row1['event_req'] . "</div>";
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
          $state_sql = $connection->query("SELECT * FROM events WHERE event_state = '$state'");
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