<?php
session_start();
require('connection.php');
require('create-event.php');

if($availability[0] == 1){
    $result1 = mysqli_query($connection, "UPDATE events SET available = 0 WHERE charityid = '$_SESSION[email]'");
    if($result1){
        echo "<script>alert('Availability updated successfully!');window.location.href='create-event.php';</script>";
    } else {
        echo "<script>alert('Failed to update availability.');window.location.href='create-event.php';</script>";
    }
} else {
    $result1 = mysqli_query($connection, "UPDATE events SET available = 1 WHERE charityid = '$_SESSION[email]'");
    if($result1){
        echo "<script>alert('Availability updated successfully!');window.location.href='create-event.php';</script>";
    } else {
        echo "<script>alert('Failed to update availability.');window.location.href='create-event.php';</script>";
    }
}
?>