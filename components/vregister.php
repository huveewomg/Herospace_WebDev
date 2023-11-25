<!-- try incorporate register for charity also inside one file -->
<!-- should charity register themselves or is that an admin-only feature? -->
<?php
include('connection.php');
if (isset($_POST['volunteerid'])) {
    $volunteerid = $_POST["volunteerid"];
    $password = $_POST["password"];
    $name = $_POST["name"];
    $age = $_POST["age"];
    $sql = "INSERT INTO volunteer VALUES ('$volunteerid','$password','$name','$age')";
    $result = mysqli_query($connection, $sql);
    if ($result)
        echo "<script>alert('Successful registration')</script>";
    else
        echo "<script>alert('Fail registration')</script>";
}
?>
<h3>REGISTER</h3>
<form action="vregister.php" method="post">
    <table>
        <tr>
            <td>Volunteer ID</td>
            <td><input type="text" name="volunteerid" placeholder="V001 MAX 4 CHAR"></td>
        </tr>
        <tr>
            <td>Name</td>
            <td><input type="text" name="name" placeholder="name"></td>
        </tr>
        <tr>
            <td>Password</td>
            <td><input type="password" name="password" placeholder="max 8 char"></td>
        </tr>
        <tr>
            <td>Age</td>
            <td><input type="number" name="age" placeholder=" 19 "></td>
        </tr>

    </table>
    <button type="submit">Register</button>

</form>