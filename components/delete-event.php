<?php
session_start();
require('connection.php');

$event_id = $_GET['event_id'];


// Delete comments
$result = mysqli_query($connection, "DELETE FROM comments WHERE event_id = '$event_id';");

// Delete events
$result1 = mysqli_query($connection, "DELETE FROM events WHERE event_id = '$event_id';");

// Delete updates
$result2 = mysqli_query($connection, "DELETE FROM updates WHERE event_id = '$event_id';");

if ($result && $result1 && $result2) {
    echo "<script>alert('Event deleted successfully!');window.location.href='featured-projects.php';</script>";
} else {
    echo "<script>alert('Delete Event failed!');window.location.href='featured-projects.php';</script>";
}
?>