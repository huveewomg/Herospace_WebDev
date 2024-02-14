<?php
session_start();
require('connection.php');

//hide error messages
error_reporting(E_ERROR | E_PARSE);

$email = $_POST['email'];
$name = $_POST['name'];
$age = $_POST['age'];
$state = $_POST['state'];
$gender = $_POST['gender'];
$bio = $_POST['bio'];


//Saving profile pic
if (isset($_FILES['profile-pic'])) {
    $img = $_FILES['profile-pic']['name'];
    $imageArr = explode('.', $img);
    $snipshot = $imageArr[0] . '.' . $imageArr[1];
    $uploadPath = "../assets/profile-pics/" . $name . ".png";
    if (file_exists($uploadPath)){
        unlink($uploadPath);
    }
    $isUploaded = move_uploaded_file($_FILES["profile-pic"]["tmp_name"], $uploadPath);
}

$result = mysqli_query($connection, "UPDATE volunteer SET name = '$name', age = '$age', state = '$state', gender = '$gender', bio = '$bio' WHERE email = '$email'");


if ($result) {
    echo "<script>alert('Profile updated successfully!');window.location.href='edit-profile.php';</script>";
} else {
    echo "<script>alert('Profile update failed!');window.location.href='edit-profile.php';</script>";
}

?>