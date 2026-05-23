<?php
session_start();
include 'db_connect.php';

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email='$email'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {

        $user = mysqli_fetch_assoc($result);

        if (password_verify($password, $user['password'])) {

            $_SESSION['user_id'] = $user['user_id'];
            $_SESSION['first_name'] = $user['first_name'];

            if ($user['role'] == 'admin') {
    header("Location: admin_dashboard.php");
} else {
    header("Location: dashboard.php");
}
exit();
        } else {
            $message = "Incorrect password!";
        }

    } else {
        $message = "User not found!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login | Aura Fitness Club</title>
    <link rel="stylesheet" href="style.css?v=2">
</head>
<body>

<header class="navbar">
    <div class="logo">AURA FITNESS CLUB</div>

    <nav class="nav-links">
        <a href="index.php">HOME</a>
        <a href="classes.php">CLASSES</a>
        <a href="register.php">REGISTER</a>
    </nav>
</header>

<section class="page-container">

    <div class="card">

        <h1>Member Login</h1>

        <?php if (!empty($message)) { ?>
            <p><?php echo $message; ?></p>
        <?php } ?>

        <form method="POST">

            <input type="email"
                   name="email"
                   placeholder="Email Address"
                   required>

            <input type="password"
                   name="password"
                   placeholder="Password"
                   required>

            <br><br>

            <button type="submit">
                Login
            </button>

        </form>

        <br>

        <p>
            Don't have an account?
            <a href="register.php">Register Here</a>
        </p>

    </div>

</section>

</body>
</html>