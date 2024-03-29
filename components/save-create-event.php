<?php
session_start();
require('connection.php');

$result1 = mysqli_query($connection, "SELECT COUNT(event_id) FROM events");
$row = mysqli_fetch_row($result1);
$event_id = "E" . $row[0] . "";

$charityid = $_SESSION['email'];
$location = $_POST['location'];
$fee = $_POST['fee'];

// convert array to string
$tags = $_POST['tags'];
$tagsString = implode(", ", $tags);

// Getting the required data
$link = $_POST['link'];
$evname = $_POST['evname'];
$evdesc = $_POST['evdesc'];
$evreq = $_POST['evreq'];
$evdate = $_POST['date'];
$startTime = $_POST['startHour'] . ":" . $_POST['startMinute'] . "" . $_POST['startampm'];
$endTime = $_POST['endHour'] . ":" . $_POST['endMinute'] . "" . $_POST['endampm'];
$date_created = date("Y-m-d");

//Saving snipshots
if (isset($_FILES['img']) && count($_FILES['img']['name']) >= 3) {
    for ($i = 0; $i < count($_FILES['img']['name']); $i++) {
        $img = $_FILES['img']['name'][$i];
        $imageArr = explode('.', $img);
        $snipshot = $imageArr[0] . '.' . $imageArr[1];
        $uploadPath = "../assets/event-images/" . $evname . "/" . $evname . "" . $i . ".png";
        $uploadFolder = "../assets/event-images/" . $evname . "/";
        if (!file_exists($uploadFolder)) {
            // Create the folder with appropriate permissions
            mkdir($uploadFolder, 0755);
            $isUploaded = move_uploaded_file($_FILES["img"]["tmp_name"][$i], $uploadPath);
        } else {
            $isUploaded = move_uploaded_file($_FILES["img"]["tmp_name"][$i], $uploadPath);
        }
    }

    $result1 = mysqli_query($connection, "INSERT INTO events (event_id, event_name, event_date, charityid, event_desc, event_req, event_fee, event_tags, signup_link, event_state, start_time, end_time, date_created) VALUES ('$event_id' , '$evname', '$evdate', '$charityid', '$evdesc', '$evreq', $fee, '$tagsString', '$link', '$location', '$startTime', '$endTime', '$date_created');");
    if ($result1) {
        echo "<script>alert('Event added successfully!');window.location.href='create-event.php';</script>";
    } else {
        echo "<script>alert('Failed to add event.');window.location.href='create-event.php';</script>";
    }
} else {
    echo "<script>alert('Please upload the a total of 3 related images.');window.location.href='create-event.php';</script>";
}
