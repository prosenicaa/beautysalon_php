<?php

include 'dbBroker.php';
include 'models/User.php';
error_reporting(0);
session_start();

if (isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

if (isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (strlen($password) > 8) {
        
        $user = new User(1, $username, $email, $password);
        $result = User::registerUser($user, $conn);

        if (!$result->num_rows > 0) {
            $result = User::addUser($user, $conn);
            if ($result) {
                echo '<script>alert("User successfully registrated!")</script>';
                header("Location: login.php");
                $username = "";
                $email = "";
                $_POST['password'] = "";
            } else {
                echo '<script>alert("Something went wrong...")</script>';
            }
        } else {
            echo '<script>alert("Email already exist!")</script>';
        }
    } else {
        echo '<script>alert("Password should be longer than 8 characters")</script>';
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="css/register.css">
    <link rel="icon" href="img/logo2.png">
</head>
<body>

<?php
    include 'templates/header.php';
    ?>
    
    <div class="container">
        <div class="box">
            <h2>Register</h2>
            <form action="#" method="POST">

            <div class="input_box">
                <input type="text" class="name" name="username" value="<?php echo $username; ?>" required>
                <label>Username</label>
            </div>
            <div class="input_box">
                <input type="password" class="password" name="password" value="<?php echo $_POST['password']; ?>" required>
                <label>Password</label>
                <div class="password_checkbox"><input type="checkbox"><p>Show Password</p></div>
            </div>
            <div class="input_box">
                <input type="text" class="email" name="email" value="<?php echo $email; ?>" required>
                <label>Email</label>
            </div>

            <button class="register_button" type="submit">Create Account</button>
            <div class="login_link"><a href="login.php">Already have an account?</a></div>

        </div>
    </div>


    <?php
    include 'templates/footer.php';
    ?>


</body>
</html>