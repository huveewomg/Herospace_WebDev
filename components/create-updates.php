<?php
session_start();
require('connection.php');

?>

<!DOCTYPE html>
<html lang="en">
<!-- Navbar Component -->
<?php include 'navbar.php'; ?>
<link rel="stylesheet" href="create-event.css" />

<body>
    <form action="save-update.php">
        <div>Updates</div>
        <textarea id="ev-updates" name="evupdates" cols="30" rows="10" required></textarea><br><br>
        <input type="submit" value="Submit" id="submit">
    </form>
</body>
<div style="margin-top: 40vh;">
  <!-- Footer Component -->
  <?php include 'footer.php'; ?>
</div>

</html>