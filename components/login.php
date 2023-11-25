<?php
include('connection.php');
session_start();

if (isset($_POST['userid'])) {
    $userid = $_POST['userid'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM volunteer";
    $result = mysqli_query($connection, $sql);
    $found = FALSE;

    while ($volunteer = mysqli_fetch_array($result)) {
        if ($volunteer['volunteerid'] == $userid && $volunteer['password'] == $password) {
            $found = TRUE;
            $_SESSION['username'] = $volunteer['volunteerid'];
            $_SESSION['password'] = $volunteer['password'];
            $_SESSION['status'] = 'volunteer';
            break;
        }
    }

    if (!$found) {
        $sql = "SELECT * FROM charity";
        $result = mysqli_query($connection, $sql);

        while ($charity = mysqli_fetch_array($result)) {
            if ($charity['charityid'] == $userid && $charity['password'] == $password) {
                $found = TRUE;
                $_SESSION['username'] = $charity['charityid'];
                $_SESSION['password'] = $charity['password'];
                $_SESSION['status'] = 'charity';
                break;
            }
        }
    }

    // Check for admin credentials
    if (!$found) {
        $sql = "SELECT * FROM admins";
        $result = mysqli_query($connection, $sql);

        while ($admin = mysqli_fetch_array($result)) {
            if ($admin['adminid'] == $userid && $admin['password'] == $password) {
                $found = TRUE;
                $_SESSION['username'] = $admin['adminid'];
                $_SESSION['password'] = $admin['password'];
                $_SESSION['status'] = 'admin';
                break;
            }
        }
    }

    if ($found) {
        header("Location: home.php");
    } else {
        echo "<script>alert('Invalid username or password');
              window.location = 'login.php'</script>";
    }
}
?>
<h3>Login</h3>
<form action="login.php" method="post">
    <table>
        <tr>
            <td><input type="text" name="userid" placeholder=" username" </td>
        </tr>
        <tr>
            <td><input type="password" name="password" placeholder=" password" </td>
        </tr>
    </table>
    <button type="submit">Login</button>
    <button type="button" onclick="window.location= 'vregister.php'">Register</button>
</form>
<!-- havent add register for charity -->