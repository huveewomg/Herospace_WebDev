<?php
$host = 'localhost';
$user = 'root';
$password = '';
$database = 'sem4test';

$connection = mysqli_connect($host, $user, $password, $database)
    or die('Connection failed. ');
echo 'Connection Successful';
?>
<!-- u means for all users; v for volunteer, ltr try make for all -->