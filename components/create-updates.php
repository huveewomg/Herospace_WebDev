<?php
session_start();
require('connection.php');

$event_id = $_GET['event_id'];
$sql = "SELECT * FROM events WHERE event_id = '$event_id';";
$result = $connection->query($sql);
$row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<!-- Navbar Component -->
<?php include 'navbar.php'; ?>
<link rel="stylesheet" href="create-event.css" />

<body>
  <div id="updates-body">
    <form action="save-update.php">
      <div id="updates-title"><?php echo $row['event_name'];?> Updates</div>
      <input type="text" name="event_id" value="<?php echo $event_id; ?>" hidden>
      <textarea id="ev-updates" name="evupdates" cols="30" rows="10" placeholder="Update Text..." required></textarea><br><br>
      <input type="submit" value="Submit" id="submit">
    </form>
  </div>
</body>
<div style="margin-top: 40vh;">
  <!-- Footer Component -->
  <?php include 'footer.php'; ?>
</div>

</html>