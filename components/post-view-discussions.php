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
  <div id="post-view-navbar" style="margin-bottom: 10vh;">
    <ul>
      <li><a href="#" onclick="window.location='post-view-overview.php?event_name=<?php echo $event_name;?>'">Overview</a></li>
      <li><a href="#" onclick="window.location='post-view-updates.php?event_name=<?php echo $event_name;?>'">Updates</a></li>
      <li><a class="active" href="#" onclick="window.location='post-view-discussions.php?event_name=<?php echo $event_name;?>'">Discussion</a></li>
    </ul>
  </div>

  <div id="comment-box">
    <div id="comment">Comment</div>
    <div id="profile-pic">
      <p>Username</p>
    </div>
  </div>

  <div id="comment-box">
    <div id="comment">Comment</div>
    <div id="profile-pic">
      <p>Username</p>
    </div>
  </div>

  <div id="comment-box">
    <div id="comment">Comment</div>
    <div id="profile-pic">
      <p>Username</p>
    </div>
  </div>

  <div id="comment-box">
    <div id="comment">Comment</div>
    <div id="profile-pic">
      <p>Username</p>
    </div>
  </div>

  <div id="comment-box">
    <div id="comment">Comment</div>
    <div id="profile-pic">
      <p>Username</p>
    </div>
  </div>

  <div id="comment-row">
    <textarea name="" cols="30" rows="10" id="comment-textarea" placeholder="Comment Something...";></textarea>
    <button id="submit-button">Submit</button>
  </div>
</div>
</body>
</html>