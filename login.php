<?php

include 'dbBroker.php';
include 'models/User.php';

//session_start();
session_unset();
error_reporting(0);

if (isset($_SESSION['user_id'])) {
    header("Location: main.php");
    exit();
}

if (isset($_POST['username']) && isset($_POST['password'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];

    $user = new User(1, $username, null, $password);
    $result = User::loginUser($user, $conn);

    if ($result->num_rows == 1) {
        session_start();
        $_SESSION['user_id'] = $user->id;
        header("Location: main.php");
        exit();
    } else {
        echo '<script>alert("Username or password incorrect!")</script>';
        $_POST['username'] = "";
        $_POST['password'] = "";
    }
}


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/register.css">
    <link rel="icon" href="img/logo2.png">
</head>
<body>
<?php include('templates/header.php'); ?>
    <div class="container">
        <div class="box">
            <h2>Login</h2>
            <form action="" method="POST">

            <div class="input_box">
                <input type="text" class="username" name="username" value="<?php echo $_POST['username']; ?>" required>
                <label>Username</label>
            </div>
            <div class="input_box">
                <input type="password" class="password" name="password" value="<?php echo $_POST['password']; ?>" required>
                <label>Password</label>
                <div class="password_checkbox"><input type="checkbox"><p>Show Password</p></div>
            </div>

            <button class="login_button" type="submit">Login</button>
            <div class="register_link"><a href="register.php">Don't have an account?</a></div>

        </div>
    </div>

    <?php
    include 'templates/footer.php';
    ?>



</body>
</html>