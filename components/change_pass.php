<?php

session_start();
require('connection.php');

$sql = "Select * from volunteer where email = '$_SESSION[email]'";
$result =  $connection->query($sql);
$result = $result->fetch_assoc();

//Getting data from the user row
$password = $result['password'];
?>

<!DOCTYPE html>
<html lang="en">

<!-- Navbar Component -->
<?php include 'navbar.php'; ?>
<link rel="stylesheet" href="change_pass.css" />

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

  <form onsubmit="return validateForm()" action="save-change-pass.php" method="post">
    <div id="column-right">
      <input name="email" type="hidden" value=<?php echo "$_SESSION[email]" ?> />
      <h2>Password</h2>
      <br />
      <p>Change your password here.</p>
      <hr />
      <div><strong>Old Password</strong></div>
      <input class="password" type="password" name="oldpass" id="oldpass"/>
      <div><strong>New Password</strong></div>
      <input class="password" type="password" name="newpass" id="newpass" />
      <div><strong>Confirm Password</strong></div>
      <input class="password" type="password" name="confirmpass" id="confirmpass" />
      <br>
      <button type="submit" name="submit" id="confirm-button">Confirm</button>
    </div>
  </form>

  <script>
    function validateForm() {
      // Get form inputs
      var oldpass = document.getElementById('oldpass').value;
      var newpass = document.getElementById('newpass').value;
      var confirmpass = document.getElementById('confirmpass').value;
      var password = "<?php echo $password; ?>";

      // Check if old password is correct
      if (password != document.getElementById('oldpass').value) {
        alert('Old password is incorrect.');
        return false;
      }

      // Check if passwords are empty
      if (newpass.trim() === '' || confirmpass.trim() === '' || oldpass.trim() === '') {
        alert('Password is required.');
        return false;
      }

      // Check if passwords are the same
      if (newpass != confirmpass) {
        alert('Passwords do not match.');
        return false;
      }
      
      // If all validations pass, allow form submission
      return true;

    }
  </script>

</body>

</html>