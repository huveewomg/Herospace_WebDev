<?php
session_start();
require('connection.php');

//hide error messages
error_reporting(E_ERROR | E_PARSE);


$sql = "Select * from volunteer where email = '$_SESSION[email]'";
$result =  $connection->query($sql);
$result = $result->fetch_assoc();

$preferences = explode(",", $result['preferences']); // array of preferences

if (isset($_POST['preference'])) {
  if (in_array($_POST['preference'], $preferences)) {
    $key = array_search($_POST['preference'], $preferences);
    unset($preferences[$key]);
  } else {
    array_push($preferences, $_POST['preference']);
  }
  $preferences = implode(",", $preferences);
  $sql = "UPDATE volunteer SET preferences = '$preferences' WHERE email = '$_SESSION[email]'";
  $connection->query($sql);
  $preferences = explode(",", $preferences);
}
?>

<!DOCTYPE html>
<html lang="en">

<!-- Navbar Component -->
<?php include 'navbar.php'; ?>
<link rel="stylesheet" href="preferences.css" />

<body>
  <div id="column-left">
    <div id="sidebar">
      <h2>Profile</h2>
      <p id="sidebar-p" onclick="window.location = 'edit-profile.php'">Customize Your Profile</p>
      <h2>Recommendation</h2>
      <p id="sidebar-p" onclick="window.location = 'preferences.php'">Preferences</p>
      <h2>Account Management</h2>
      <p id="sidebar-p" onclick="window.location = 'change_pass.php'">Password</p>
    </div>
  </div>
  <div id="column-middle"></div>
  <div id="column-right">
    <h2>Preferences</h2>
    <br>
    <p>This information helps us match your desired events.</p>
    <hr>
    <p><strong>What is your preferred community service(s)?</strong></p>

    <form action="preferences.php" style="width: 80%;" method="post">
      <?php
      // Number of times to repeat the content
      $repeatCount = 6;

      // Array of tag content
      $tagContent = array(
        array('orphanage', 'river', 'reforestation', 'beach', 'homeless', 'elderly'),
        array('education', 'cat shelter', 'dog shelter', 'food bank', 'hospital', 'disaster relief'),
        array('cleanup', 'old folks home', 'homeless shelter', 'soup kitchen', 'animal shelter', 'clinic'),
      );


      // Output the HTML div elements using PHP
      echo '<div id="tag_column1">';
      for ($i = 0; $i < $repeatCount; $i++) {
        if (in_array($tagContent[0][$i % count($tagContent[0])], $preferences)) {
          echo '<button class="tag" style="background-color:red;" value= \'' . $tagContent[0][$i % count($tagContent[0])] . '\' name="preference" > ' . $tagContent[0][$i % count($tagContent[0])] . '</button>';
        } else {
          echo '<button class="tag" value= \'' . $tagContent[0][$i % count($tagContent[0])] . '\' name="preference" > ' . $tagContent[0][$i % count($tagContent[0])] . '</button>';
        }
      }
      echo '</div>';

      echo '<div id="tag_column2">';
      for ($i = 0; $i < $repeatCount; $i++) {
        if (in_array($tagContent[1][$i % count($tagContent[1])], $preferences)) {
          echo '<button class="tag" style="background-color:red;" value= \'' . $tagContent[1][$i % count($tagContent[1])] . '\' name="preference"> ' . $tagContent[1][$i % count($tagContent[1])] . '</button>';
        } else {
          echo '<button class="tag" value= \'' . $tagContent[1][$i % count($tagContent[1])] . '\' name="preference"> ' . $tagContent[1][$i % count($tagContent[1])] . '</button>';
        }
      }
      echo '</div>';

      echo '<div id="tag_column3">';
      for ($i = 0; $i < $repeatCount; $i++) {
        if (in_array($tagContent[2][$i % count($tagContent[2])], $preferences)) {
          echo '<button class="tag" style="background-color:red;" value= \'' . $tagContent[2][$i % count($tagContent[2])] . '\' name="preference"> ' . $tagContent[2][$i % count($tagContent[2])] . '</button>';
        } else {
          echo '<button type="submit" class="tag" value= \'' . $tagContent[2][$i % count($tagContent[2])] . '\' name="preference"> ' . $tagContent[2][$i % count($tagContent[2])] . '</button>';
        }
      }
      echo '</div>';
      ?>
    </form>
  </div>
</body>

</html>