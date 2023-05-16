<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="css/style.css">
<link rel="icon" href="img/logo2.png">

<div class="navbar">
            <img src="img/logo2.png">
            <?php if (isset($_SESSION['user_id'])) : ?>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="main.php">Make an apointment</a></li>
                <li>
                    <a href="logout.php">Logout</a>
                </li>
            </ul>
            <?php else : ?>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="main.php">Make an apointment</a></li>
                <li><a href="register.php">Register</a></li>
                <li><a href="login.php">Login</a></li>
            </ul>
            <?php endif; ?>
</div>

</html>