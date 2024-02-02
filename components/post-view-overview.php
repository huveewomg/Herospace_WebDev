<?php
session_start();

//connection
require 'connection.php';

$event_name = $_GET['event_name'];
$result = mysqli_query($connection, "SELECT * FROM events WHERE event_name = '$event_name'");
$event_details = mysqli_fetch_row($result);
?>


<!DOCTYPE html>
<html lang="en">

<!-- Navbar Component -->
<?php include 'navbar.php'; ?>
<link rel="stylesheet" href="post-view.css" />

<body>
  <div id="post-view-navbar">
    <ul>
      <li><a class="active" href="#" onclick="window.location='post-view-overview.php?event_name=<?php echo $event_name;?>'">Overview</a></li>
      <li><a href="#" onclick="window.location='post-view-updates.php?event_name=<?php echo $event_name;?>'">Updates</a></li>
      <li><a href="#" onclick="window.location='post-view-discussions.php?event_name=<?php echo $event_name;?>'">Discussion</a></li>
    </ul>
  </div>
  <h1 id="event-name"><?php echo $event_details[1] ?></h1>
  <a href="<?php echo $event_details[8]?>" target="_blank"><button id="join-event" on>Join Event</button></a>
  <div id="row-1">
    <div id="event-description"><?php echo $event_details[4]?></div>
    <div id="event-details">
      <?php echo $event_details[9]?> <br>
      <?php echo $event_details[3]?> <br>
      <?php echo $event_details[12]?> <br>
      <?php echo $event_details[13]?> <br>
      <?php echo $event_details[6]?> <br>
    </div>
  </div>
  <div id="row-2" class="flex-container">
    <div id="event-snipshot"><img src="../assets/event-images/<?php echo $event_details[1];?>/<?php echo $event_details[1];?>0.png" alt=""></div>
    <div id="event-snipshot"><img src="../assets/event-images/<?php echo $event_details[1];?>/<?php echo $event_details[1];?>1.png" alt=""></div>
    <div id="event-snipshot"><img src="../assets/event-images/<?php echo $event_details[1];?>/<?php echo $event_details[1];?>2.png" alt=""></div>
  </div>
  <div id="row-3">
    <div id="requirements"><?php echo $event_details[5]?></div>
  </div>
</body>
</html>