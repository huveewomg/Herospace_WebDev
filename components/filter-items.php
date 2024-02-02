<?php
session_start();
require('connection.php');

$state = $_GET['state'];
$sort = $_GET['sort'];
if (!empty($_GET["state"])) {
    echo $state;    
    $result = mysqli_query($connection, "SELECT * FROM events WHERE event_state = '$state'");
    $row = mysqli_fetch_row($result);
    $selected_ids = array();
    foreach($row as $value) {
        array_push($value[0], $selected_ids);
    }
    $selected_ids = $row[0];
    echo '<script> window.location.href="featured-projects.php?selected_ids=' .$selected_ids.'"</script>';
} else {    
    echo '<script> window.location.href="featured-projects.php"; </script>';
}
?>


