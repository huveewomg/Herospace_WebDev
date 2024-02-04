<?php
session_start();
require('connection.php');

$updates = $_POST['evupdates'];

$result = mysqli_query($connection, "INSERT INTO updates (update_text) VALUES ('$updates')");

if ($result) {
    echo "<script>alert('Profile updated successfully!');window.location.href='edit-profile.php';</script>";
} else {
    echo "<script>alert('Profile update failed!');window.location.href='edit-profile.php';</script>";
}
?>