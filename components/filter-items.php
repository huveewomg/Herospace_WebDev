<?php
session_start();
require('connection.php');

$state = $_GET['state'];
$sort = $_GET['sort'];
$result = mysqli_query($connection, "SELECT * FROM events WHERE event_state = '$state'");
if (!empty($_GET["state"]) && mysqli_num_rows($result) > 0) {
    $events = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $events[] = $row[0];
    }
    
    $_SESSION['events'] = $events;
    $_SESSION['selected_state'] = $state;

    $serializedArray = json_encode($events);

    // URL encode the serialized string
    $encodedArray = urlencode($serializedArray);

    echo "<script>alert('Found the results!');</script>";
    echo '<script> window.location.href="featured-projects.php?events=' . $encodedArray . '&state='.$state = $_GET['state'] .'"; </script>';
} else {  
    echo "<script>alert('No results found');</script>";
    echo '<script> window.location.href="featured-projects.php"; </script>';
}
?>


