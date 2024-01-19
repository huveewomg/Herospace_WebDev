<?php
session_start();
require('connection.php');

$email = $_POST['email'];
$password = $_POST['newpass'];

$result = mysqli_query($connection, "UPDATE volunteer SET password = '$password' WHERE email = '$email'");

if ($result) {
    echo "<script>alert('Password updated successfully!');window.location.href='change_pass.php';</script>";
} else {
    echo "<script>alert('Failed to update password.');window.location.href='change_pass.php';</script>";
}
?>