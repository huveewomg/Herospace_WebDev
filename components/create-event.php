<!DOCTYPE html>
<html lang="en">

<!-- Navbar Component -->
<?php include 'navbar.php'; ?>
<link rel="stylesheet" href="create-event.css" />

<body>
<h1>
    Share the Love!
</h1>
<div id="column-right">
  <div>Event Date</div>
  <div id="event-box">
    <button id="available">Available</button>
    <div id="">Event Date & Time</div>
    <div>Event Location</div>
    <div>Participation Fee</div>
    <div>Tags</div>
    <div>Embed Link</div>
  </div>
</div>
<div id="column-left">
  <form action="" style="padding-bottom: 10vh;">
    <div id="ev-name">Event Name</div>
    <input type="text" id="ev-name" name="fname"><br><br>
    <div>Event Description</div>
    <textarea name="Event Description" id="ev-desc" cols="30" rows="10"></textarea><br><br>
    <div>Event Requirements</div>
    <textarea name="Event Requirements" id="ev-req" cols="30" rows="10"></textarea><br><br>
    <div>Event Images</div>
    <input type="file" id="ev-img" name="img" accept="image/*"><br><br>
    <div>Updates</div>
    <textarea name="Event Updates" id="ev-updates" cols="30" rows="10"></textarea><br><br>
    <input type="submit" value="Submit" id="submit">
  </form>
</div>
</body>
</html>