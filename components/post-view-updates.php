<?php
session_start();

//connection
require 'connection.php';

$event_id = $_GET['event_id'];
$sql =  "SELECT * FROM updates WHERE event_id = '$event_id';";
$result = $connection->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<!-- Navbar Component -->
<?php if ($_SESSION['status'] == 'admin' || $_SESSION['status'] == 'charity') {
  include 'admin navbar.php';
} else {
  include 'navbar.php';
} ?>
<link rel="stylesheet" href="post-view-updates.css" />
<link rel="stylesheet" href="post-view-overview.css" />
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />

<body>
  <div id="post-view-navbar">
    <ul>
      <li><a href="#" onclick="window.location='post-view-overview.php?event_id=<?php echo $event_id; ?>'">Overview</a></li>
      <li><a class="active" href="#" onclick="window.location='post-view-updates.php?event_id=<?php echo $event_id; ?>'">Updates</a></li>
      <li><a href="#" onclick="window.location='post-view-discussions.php?event_id=<?php echo $event_id; ?>'">Discussion</a></li>
    </ul>
  </div>


  <!-- Remove the vertical line for the last update record -->
  <?php
  $num_rows = $result->num_rows;
  if ($result->num_rows == 0) {
    echo "<div class=\"card-no-updates\">
    <div class=\"container-card bg-green-box\">
        <p class=\"card-title\">No Updates Yet</p>
    </div>
</div>";
  } else {
    for ($i = 0; $i < $num_rows; $i++) {
      // Fetch the current row
      $row1 = $result->fetch_assoc();
      // Check if the current row is the last one
      if ($i == $num_rows - 1) {
        // This is the last record
        echo "<div class=\"row\">
            <div id=\"alert-container-last\">
                <span class=\"material-symbols-outlined\" id=\"alert\">priority_high</span>
            </div>
            <div class=\"card\">
                <div class=\"container-card bg-green-box\">
                    <p class=\"card-title\">" . $row1['date'] . "</p>
                    <p class=\"card-description\">" . $row1['update_text'] . "</p>
                </div>
            </div>
          </div>";
      } else {
        echo "<div class=\"row\">
              <div id=\"alert-container\">
                  <span class=\"material-symbols-outlined\" id=\"alert\">priority_high</span>
              </div>
              <div class=\"card\">
                  <div class=\"container-card bg-green-box\">
                      <p class=\"card-title\">" . $row1['date'] . "</p>
                      <p class=\"card-description\">" . $row1['update_text'] . "</p>
                  </div>
              </div>
            </div>";
      }
    }
  }
  ?>
</body>

</html>