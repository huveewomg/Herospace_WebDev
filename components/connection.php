<?php
$host = 'localhost';
$user = 'root';
$password = '';
$database = 'test';

$connection = mysqli_connect($host, $user, $password, $database)
    or die('Connection failed. ');
?>
<!-- u means for all users; v for volunteer, ltr try make for all -->