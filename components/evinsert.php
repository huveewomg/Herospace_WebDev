<?php
include('connection.php');

if (isset($_POST['eventid'])) {
    $eventid = $_POST["eventid"];
    $name = $_POST["name"];
    $event_date = $_POST["event_date"];
    $charityid = $_POST["charityid"];
    $sql = "INSERT INTO events VALUES ('$eventid','$name','$event_date','$charityid')";
    $result = mysqli_query($connection, $sql);
    if ($result)
        echo "<script>alert('Successful registration')</script>";
    else
        echo "<script>alert('Fail registration')</script>";
}
?>
<h3>REGISTER EVENT</h3>
<form action="evinsert.php" method="post">
    <table>
        <tr>
            <td>EVENT ID</td>
            <td><input type="text" name="eventid" placeholder="E001 MAX 4 CHAR"></td>
        </tr>
        <tr>
            <td>Name</td>
            <td><input type="text" name="name" placeholder="Name of event"></td>
        </tr>
        <tr>
            <td>Date</td>
            <td><input type="date" name="event_date" placeholder="21/1/2020"></td>
        </tr>
        <tr>
            <td>Charity ID</td>
            <td><input type="text" name="charityid" placeholder=" V001 "></td>
        </tr>

    </table>
    <button type="submit">Register</button>

</form>
<!-- feel like eventid and charityid should be generated, or unique  -->
<!-- oh wait nvm database already set as pk, so just need error handling ig -->