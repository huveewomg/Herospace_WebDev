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
        header("Location: home.html");
        echo "alert('Login successful!')";
    } else {
        echo "<script>alert('Invalid username or password');
              window.location = 'login.php'</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Herospace</title>
    <link rel="stylesheet" href="Loginstyle.css">'
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
</head>
    
<body>
    <div class="container">
        <div class="slideshow-container">
            <div class="mySlides fade">
            <img src="https://cdn.worldofbuzz.com/wp-content/uploads/2023/03/collage-5-2.jpg?strip=all&lossy=1&quality=92&ssl=1">
            </div>
            <div class="mySlides fade"> 
            <img src="https://media.freemalaysiatoday.com/wp-content/uploads/2023/05/372fa82b-air-kelantan-bernama-100523.jpg">
            </div>
            <div class="mySlides fade">
            <img src="https://clips.mstar.com.my/images/blob/02E42499-562B-40DA-89E6-8CDA233298A7">
            </div>
            
            <div style="background: transparent;">
                <span class="dot"></span> 
                <span class="dot"></span> 
                <span class="dot"></span> 
            </div>
        </div>
    </div>

    <div class="wrapper">
        <div class="form-box login">
            <h2>Login</h2>
            <form action="login.php" method="post">
                <div class="input-box">
                    <span class="material-symbols-outlined">
                        mail
                        </span>
                    <input type="text" name="userid" required>
                    <label>Email</label>
                </div>
                
                <div class="input-box">
                    <span class="material-symbols-outlined">
                        lock
                        </span>
                    <input type="password" name="password" required>
                    <label>Password</label>
                </div>

                <div class="T&C">
                    <label><input type="checkbox">
                    I agree to the</label>
                    <a href="#">Term and Conditions</a>
                </div>

                <button type="submit" class="btn">Login</button>
                <div class="login-register">
                    <p>New User ?
                        <a href="/components/vregister.php" class="register-link">Register</a></p>
                </div>
        </div>
    </div>
        


    <script src="script.js"></script>
</body>
</html>