<?php
session_start();

//connection
require 'connection.php';

$event_id = $_GET['event_id'];
$volunteer_id = $_SESSION['email'];
$result = mysqli_query($connection, "SELECT * FROM comments WHERE event_id = '$event_id'");

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
  <div id="post-view-navbar" style="margin-bottom: 10vh;">
    <ul>
      <li><a href="#" onclick="window.location='post-view-overview.php?event_id=<?php echo $event_id; ?>'">Overview</a></li>
      <li><a href="#" onclick="window.location='post-view-updates.php?event_id=<?php echo $event_id; ?>'">Updates</a></li>
      <li><a class="active" href="#" onclick="window.location='post-view-discussions.php?event_id=<?php echo $event_id; ?>'">Discussion</a></li>
    </ul>
  </div>

  <?php
  if ($result->num_rows > 0) {
    // Fetch the first row
    $row = $result->fetch_assoc();
    // Output the first comment box
    echo "<div id='comment-box'><div id='comment'>" .$row['comment']."<p>" .$row['volunteer_id']."</p></div><div id='profile-pic'></div></div>";

    // Output the remaining comments
    while ($row = $result->fetch_assoc()) {
      echo "<div id='comment-box'><div id='comment'>" .$row['comment']."<p>" .$row['volunteer_id']."</p></div><div id='profile-pic'></div></div>";
    }
  } else {
    echo "<div id='comment'>No Comments Yet</div>";
  }
  ?>


  <form action="upload-comment.php" method="POST">
    <div id="comment-row">
      <input name="event_id" value="<?php echo $event_id ?>" type="text" hidden>
      <input name="volunteer_id" value="<?php echo $volunteer_id ?>" type="text" hidden>
      <textarea name="comment" cols="30" rows="10" id="comment-textarea" placeholder="Comment Something..." ;></textarea>
      <button id="submit-button">Submit</button>
    </div>
  </form>

  </div>
</body>

</html>