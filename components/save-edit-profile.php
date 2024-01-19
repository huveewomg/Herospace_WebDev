<?php
session_start();
require('connection.php');

$email = $_POST['email'];
$name = $_POST['name'];
$age = $_POST['age'];
$state = $_POST['state'];
$gender = $_POST['gender'];
$bio = $_POST['bio'];

$result = mysqli_query($connection, "UPDATE volunteer SET name = '$name', age = '$age', state = '$state', gender = '$gender', bio = '$bio' WHERE email = '$email'");

if ($result) {
    echo "<script>alert('Profile updated successfully!');window.location.href='edit-profile.php';</script>";
} else {
    echo "<script>alert('Profile update failed!');window.location.href='edit-profile.php';</script>";
}
?>