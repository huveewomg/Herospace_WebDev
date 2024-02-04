<?php
session_start();
require('connection.php');

$event_id = $_POST['event_id'];
$volunteer_id = $_POST['volunteer_id'];
$comment = $_POST['comment'];

$result = mysqli_query($connection, "INSERT INTO comments (comment, event_id, volunteer_id ) VALUES  ('$comment',  '$event_id', '$volunteer_id');");

if ($result) {
    echo "<script>alert('Comment uploaded successfully!');window.location.href='post-view-discussions.php?event_id=". $event_id ."';</script>";
} else {
    echo "<script>alert('Upload comment failed!');window.location.href=''post-view-discussions.php?event_id=". $event_id ."';</script>";
}
?>