<?php
session_start();

//connection
require 'connection.php';

$event_id = $_GET['event_id'];
$result = mysqli_query($connection, "SELECT * FROM events WHERE event_id = '$event_id'");
$event_details = mysqli_fetch_row($result);
?>

<!DOCTYPE html>
<html lang="en">

<!-- Navbar Component -->
<?php if ($_SESSION['status'] == 'admin' || $_SESSION['status'] == 'charity') {
  include 'admin navbar.php';
} else {
  include 'navbar.php';
} ?>
<link rel="stylesheet" href="post-view.css" />

<body>
  <div id="post-view-navbar">
    <ul>
      <li><a href="#" onclick="window.location='post-view-overview.php?event_id=<?php echo $event_id;?>'">Overview</a></li>
      <li><a class="active" href="#" onclick="window.location='post-view-updates.php?event_id=<?php echo $event_id;?>'">Updates</a></li>
      <li><a href="#" onclick="window.location='post-view-discussions.php?event_id=<?php echo $event_id;?>'">Discussion</a></li>
    </ul>
  </div>

  
</body>
</html>