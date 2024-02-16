<?php
session_start();
require('connection.php');

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

<link rel="stylesheet" href="create-event.css" />

<!-- Form to create new event -->

<body>
  <h1>
    Share the Love!
  </h1>
  <form action="save-create-event.php" method="post" enctype="multipart/form-data">
    <div id="column-right">
      <div id="input-title-details">Event Details</div>
      <div id="event-box">
        <div id="ev-date">Event Date</div>
        <input type="date" id="ev-details" name="date" required><br><br>
        <div id="input-title">Event Start Time</div>
        <div id="time-picker">
          <input type="text" id="hour" name="startHour" size="2" maxlength="2">
          :
          <input type="text" id="minute" name="startMinute" size="2" maxlength="2">
          <select id="ampm" name="startampm">
            <option value="am">AM</option>
            <option value="pm">PM</option>
          </select>
        </div>
        <div id="input-title">Event End Time</div>
        <div id="time-picker">
          <input type="text" id="hour" name="endHour" size="2" maxlength="2">
          :
          <input type="text" id="minute" name="endMinute" size="2" maxlength="2">
          <select id="ampm" name="endampm">
            <option value="am">AM</option>
            <option value="pm">PM</option>
          </select>
        </div>
        <div id="input-title">Event Location</div>
        <select id="dropdown" name="location" style="border-width: 2px;border-color: black; margin-bottom:2vh;">
          <?php
          $options = array('Kedah', 'Kelantan', 'Malacca', 'Negeri Sembilan', 'Pahang', 'Penang', 'Perak', 'Perlis', 'Sabah', 'Sarawak', 'Selangor', 'Terengganu', 'Johor', 'Kuala Lumpur', 'Labuan', 'Putrajaya');

          // Generate options dynamically
          foreach ($options as $option) {
            echo '<option value="' . $option . '" ' . ($selected_option === $option ? 'selected' : '') . '>' . $option . '</option>';
          }
          ?>
        </select>
        <div id="input-title">Participation Fee (RM)</div>
        <input type="number" id="ev-details" name="fee" required><br><br>
        <div id="input-title">Tags</div>

        <!-- 3 select fields for tags -->
        <select id="dropdown" name="tags[]" style="border-width: 2px;border-color: black;margin-bottom:3vh;">
          <?php
          $options = array('orphanage', 'river', 'reforestation', 'beach', 'homeless', 'elderly', 'education', 'cat shelter', 'dog shelter', 'food bank', 'hospital', 'disaster relief', 'cleanup', 'old folks home', 'homeless shelter', 'soup kitchen', 'animal shelter', 'clinic');

          // Generate options dynamically
          foreach ($options as $option) {
            echo '<option value="' . $option . '" >' . $option . '</option>';
          }
          ?>
        </select>
        <select id="dropdown" name="tags[]" style="border-width: 2px;border-color: black;margin-bottom:3vh;">
          <?php
          $options = array('orphanage', 'river', 'reforestation', 'beach', 'homeless', 'elderly', 'education', 'cat shelter', 'dog shelter', 'food bank', 'hospital', 'disaster relief', 'cleanup', 'old folks home', 'homeless shelter', 'soup kitchen', 'animal shelter', 'clinic');

          // Generate options dynamically
          foreach ($options as $option) {
            echo '<option value="' . $option . '" >' . $option . '</option>';
          }
          ?>
        </select>
        <select id="dropdown" name="tags[]" style="border-width: 2px;border-color: black;margin-bottom:3vh;">
          <?php
          $options = array('orphanage', 'river', 'reforestation', 'beach', 'homeless', 'elderly', 'education', 'cat shelter', 'dog shelter', 'food bank', 'hospital', 'disaster relief', 'cleanup', 'old folks home', 'homeless shelter', 'soup kitchen', 'animal shelter', 'clinic');

          // Generate options dynamically
          foreach ($options as $option) {
            echo '<option value="' . $option . '" >' . $option . '</option>';
          }
          ?>
        </select>
        <div id="input-title">Signup Link (Google Forms only)</div>
        <input type="text" id="ev-details" name="link" pattern="https?:\/\/forms\.gle\/[A-Za-z0-9_-]+"><br><br>
      </div>
    </div>
    <div id="column-left">
      <div id="ev-name">Event Name</div>
      <input type="text" id="ev-name" name="evname" maxlength="50"><br><br>
      <div id="input-title">Event Description</div>
      <textarea id="ev-desc" name="evdesc" cols="30" rows="10"  placeholder="Tell us a little about this event..." required></textarea><br><br>
      <div id="input-title">Event Requirements</div>
      <textarea id="ev-req" name="evreq" cols="30" rows="10" placeholder="What is needed to be brought by participants for the event..." required></textarea><br><br>
      <div id="input-title">Event Images (Horizontal Images recommended, <strong>Only 3 Accepted</strong>)</div>
      <input type="file" id="ev-img" name="img[]" accept="image/*" multiple required><br><br>
      <input type="submit" value="Submit" id="submit">
  </form>

  </div>
</body>
<?php include 'footer.php'; ?>

</html>