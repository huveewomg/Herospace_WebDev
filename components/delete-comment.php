<?php
session_start();
require('connection.php');

$event_id = $_GET['event_id'];
$comment_id = $_GET['comment_id'];

$result = mysqli_query($connection, "DELETE FROM comments WHERE comment_id ='$comment_id';");

if ($result) {
    echo "<script>alert('Comment deleted successfully!');window.location.href='post-view-discussions.php?event_id=". $event_id ."';</script>";
} else {
    echo "<script>alert('Upload comment failed!');window.location.href=''post-view-discussions.php?event_id=". $event_id ."';</script>";
}
?>