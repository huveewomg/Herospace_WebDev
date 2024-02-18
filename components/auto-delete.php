<?php
session_start();
require('connection.php');

$sql = "DELETE FROM events WHERE event_date < CURDATE()";
$result = $connection->query($sql);

?>
