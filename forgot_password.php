<?php
include "db_connect.php";

$message = "";

if (isset($_POST['reset_password'])) {

    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];

    if ($new_password !== $confirm_password) {
        $message = "Passwords do not match.";
    } else {
        $check_user = "SELECT * FROM users WHERE email='$email'";
        $result = mysqli_query($conn, $check_user);

        if (mysqli_num_rows($result) > 0) {
            $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

            $update = "UPDATE users 
                       SET password='$hashed_password'
                       WHERE email='$email'";

            if (mysqli_query($conn, $update)) {
                $message = "Password reset successful. You can now login.";
            } else {
                $message = "Error: " . mysqli_error($conn);
            }
        } else {
            $message = "Email address not found.";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Forgot Password | Aura Fitness Club</title>
    <link rel="stylesheet" href="style.css?v=2">
</head>
<body>

<header class="navbar">
    <div class="logo">AURA FITNESS CLUB</div>

    <nav class="nav-links">
        <a href="index.php">HOME</a>
        <a href="login.php">LOGIN</a>
        <a href="register.php">REGISTER</a>
    </nav>
</header>

<section class="page-container">

    <div class="card">

        <h1>Reset Password</h1>

        <p><?php echo $message; ?></p>

        <form method="POST">

            <input type="email"
                   name="email"
                   placeholder="Enter your registered email"
                   required>

            <input type="password"
                   name="new_password"
                   placeholder="New Password"
                   required>

            <input type="password"
                   name="confirm_password"
                   placeholder="Confirm New Password"
                   required>

            <br><br>

            <button type="submit" name="reset_password">
                Reset Password
            </button>

        </form>

        <br>

        <p>
            Remember your password?
            <a href="login.php">Login here</a>
        </p>

    </div>

</section>

</body>
</html>