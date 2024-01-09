<?php
include('connection.php');
session_start();

if (isset($_POST['email'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM volunteer";
    $result = mysqli_query($connection, $sql);
    $found = FALSE;

    while ($volunteer = mysqli_fetch_array($result)) {
        if ($volunteer['email'] == $email && $volunteer['password'] == $password) {
            $found = TRUE;
            $_SESSION['email'] = $volunteer['email'];
            $_SESSION['password'] = $volunteer['password'];
            $_SESSION['status'] = 'volunteer';
            break;
        }
    }

    if (!$found) {
        $sql = "SELECT * FROM charity";
        $result = mysqli_query($connection, $sql);

        while ($charity = mysqli_fetch_array($result)) {
            if ($charity['charityid'] == $email && $charity['password'] == $password) {
                $found = TRUE;
                $_SESSION['email'] = $charity['charityid'];
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
            if ($admin['adminid'] == $email && $admin['password'] == $password) {
                $found = TRUE;
                $_SESSION['email'] = $admin['adminid'];
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
        echo "<script>alert('Invalid email or password');
              window.location = 'login.php'</script>";
    }
}

elseif(isset($_POST['registerEmail'])) {
    $registerEmail = $_POST['registerEmail'];
    $registerName = $_POST['registerName'];
    $registerPassword = $_POST['registerPassword'];
    $cpassword = $_POST['cpassword'];

    // Check if the email already exists in the database
    $checkEmailQuery = "SELECT * FROM volunteer WHERE email = '$registerEmail'";
    $checkEmailResult = mysqli_query($connection, $checkEmailQuery);

    if (mysqli_num_rows($checkEmailResult) > 0) {
        // If email exists, show error message
        echo "<script>alert('Email already exists');
              window.location = 'login.php'</script>";
    } else {
        // If email doesn't exist, proceed with registration
        if ($registerPassword == $cpassword) {
            $sql = "INSERT INTO volunteer (email, password, name) VALUES ('$registerEmail','$registerPassword','$registerName')";
            $result = mysqli_query($connection, $sql);
            if ($result) {
                echo "<script>alert('Successful registration');
                      window.location = 'login.php'</script>";
            } else {
                echo "<script>alert('Failed registration');
                      window.location = 'login.php'</script>";
            }
        } else {
            echo "<script>alert('Passwords do not match');
                  window.location = 'login.php'</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Herospace</title>
    <link rel="stylesheet" href="loginstyle.css">'
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
</head>

<body>
    <div class="container">
        <div class="slideshow-container">
            <div class="mySlides">
                <img src="https://cloudfront-us-east-2.images.arcpublishing.com/reuters/UHEUMBOZ3JNKPDFPX3IEPHOPCI.jpg">
            </div>
            <div class="mySlides">
                <img src="https://www.undp.org/sites/g/files/zskgke326/files/migration/bb/undp-bb-kalinago-forestday-DSC_8672.jpg">
            </div>
            <div class="mySlides">
                <img src="https://www.cityofcarrollton.com/home/showpublishedimage/25204/637812153581200000">
            </div>

            <div style="background: transparent;">
                <span class="dot"></span>
                <span class="dot"></span>
                <span class="dot"></span>
            </div>
        </div>
    </div>

    <div class="split"></div>
    <div class="wrapper">
        <span class="close-icon">
            close
        </span>

        <!-- Login Segment -->
        <div class="form-box login">
            <h2>Login</h2>
            <form action="login.php" method="post">
                <div class="input-box">
                    <span class="material-symbols-outlined">
                        mail
                    </span>
                    <input type="text" name="email" required>
                    <label>Email</label>
                </div>

                <div class="input-box">
                    <span class="material-symbols-outlined">
                        lock
                    </span>
                    <input type="password" name="password" required>
                    <label>Password</label>
                </div>
                
                <div class="TC">
                    <label><input type="checkbox" required>
                        I agree to the</label>
                    <a href="#">Term and Conditions</a>
                </div>

                <button type="submit" class="btn">Login</button>
                <div class="login-register">
                    <p>New User ?
                        <a href="#" class="register-link">Register</a>
                    </p>
                </div>
            </form>
        </div>


        <!-- Register Segment -->
        <div class="form-box register">
            <h2>Registration</h2>
            <form action="login.php" method="post">
                <div class="input-box">
                    <span class="person-icon">
                        person
                    </span>
                    <input type="text" name="registerName"required>
                    <label>Name</label>
                </div>
                <div class="input-box">
                    <span class="material-symbols-outlined">
                        mail
                    </span>
                    <input type="email" name="registerEmail" required>
                    <label>Email</label>
                </div>

                <div class="input-box">
                    <span class="material-symbols-outlined">
                        lock
                    </span>
                    <input type="password"  name="registerPassword" required>
                    <label>Password</label>
                </div>

                <div class="input-box">
                    <span class="material-symbols-outlined">
                        lock
                    </span>
                    <input type="password"  name="cpassword" required>
                    <label>Confirm Password</label>
                </div>

                <div class="message">
                    <p id="message"></p>
                </div>

                <div class="T&C">
                    <label><input type="checkbox">
                        I agree to the</label>
                    <a href="#">Term and Conditions</a>
                </div>

                <button type="submit" onclick="CheckPassword()" class="btn">Register</button>
                <div class="login-register">
                    <p>Already have an account ?
                        <a href="#" class="login-link">Login</a>
                    </p>
                </div>
            </form>
        </div>

    </div>



    <script src="script.js"></script>
</body>

</html>