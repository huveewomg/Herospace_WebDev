<?php
session_start();
require('connection.php');

$updates = $_GET['evupdates'];
$event_id = $_GET['event_id'];
$currentDate = date('F j, Y');

$result = mysqli_query($connection, "INSERT INTO updates (update_text, event_id, date) VALUES ('$updates', '$event_id', '$currentDate'); ");

if ($result) {
    echo "<script>alert('Event Update Successfully!');window.location.href='featured-projects.php';</script>";
} else {
    echo "<script>alert('Event Update Failed!');window.location.href='featured-projects.php';</script>";
}
?>