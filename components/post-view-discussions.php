<?php
session_start();

//connection
require 'connection.php';

$event_id = $_GET['event_id'];
$id = $_SESSION['email'];
$result = mysqli_query($connection, "SELECT * FROM comments WHERE event_id = '$event_id'");
$result1;

if ($_SESSION['status'] == 'admin') {
  $result1 = mysqli_query($connection, "SELECT * FROM admins WHERE adminid = '$id'");
} elseif ($_SESSION['status'] == 'charity') {
  $result1 = mysqli_query($connection, "SELECT * FROM charity WHERE charityid = '$id'");
} else {
  $result1 = mysqli_query($connection, "SELECT * FROM volunteer WHERE email = '$id'");
}

$row1 = $result1->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">

<!-- Navbar Component -->
<?php if ($_SESSION['status'] == 'admin' || $_SESSION['status'] == 'charity') {
  include 'admin navbar.php';
} else {
  include 'navbar.php';
} ?>
<link rel="stylesheet" href="post-view-discussions.css" />
<link href="https://fonts.googleapis.com/css2?family=Anta&family=Roboto:wght@300;400&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Alice&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Sen:wght@400..800&display=swap" rel="stylesheet">


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
    while ($row = $result->fetch_assoc()) {
      echo "<div id='comment-box'><div id='comment'><p id='comment-body'>" . $row['comment'] ."<p id='commented-by'>By: " . $row['volunteer_id'];
        if ($_SESSION['status'] == 'admin') {
          echo "<button id='delete-button' onclick='window.location=\"delete-comment.php?comment_id=$row[comment_id]&event_id=$row[event_id]\"'>Delete Comment</button>";
        }
      echo  "</p></p></div>";
      
      // Add the img tag here
      echo "<img ";

      if (file_exists("../assets/profile-pics/" . $row1['name'] . ".png")) {
        echo "src='../assets/profile-pics/" . $row1['name'] . ".png'";
      } else {
        echo "src='../assets/profile-pics/images.png'";
      }

      echo " alt='' id='profile-pic'></div>";
    }
  } else {
    echo "<div id='no-comment'>No Comments Yet</div>";
  }
  ?>





  <form action="upload-comment.php" method="POST">
    <div id="comment-row">
      <input name="event_id" value="<?php echo $event_id ?>" type="text" hidden>
      <input name="volunteer_id" value="<?php echo $id ?>" type="text" hidden>
      <textarea name="comment" cols="30" rows="10" id="comment-textarea" placeholder="Comment Something..." maxlength="100"></textarea>
      <button id="submit-button">Submit</button>
    </div>
  </form>

  </div>
  <footer>
    <?php include 'footer.php'; ?>
  </footer>
</body>

</html>