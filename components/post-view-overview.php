<!DOCTYPE html>
<html lang="en">

<!-- Navbar Component -->
<?php include 'navbar.php'; ?>
<link rel="stylesheet" href="post-view.css" />

<body>
  <div id="post-view-navbar">
    <ul>
      <li><a class="active" href="#" onclick="window.location='post-view-overview.php'">Overview</a></li>
      <li><a href="#" onclick="window.location='post-view-updates.php'">Updates</a></li>
      <li><a href="#" onclick="window.location='post-view-discussions.php'">Discussion</a></li>
    </ul>
  </div>
  <h1 id="event-name">Event Name</h1>
  <button id="join-event">Join Event</button>
  <div id="row-1">
    <div id="event-description">Description</div>
    <div id="event-details">Details</div>
  </div>
  <div id="row-2" class="flex-container">
    <div id="event-snipshot">Snipshot</div>
    <div id="event-snipshot">Snipshot</div>
    <div id="event-snipshot">Snipshot</div>
  </div>
  <div id="row-3">
    <div id="requirements">Requirements</div>
  </div>
</body>
</html>