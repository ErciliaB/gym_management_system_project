<?php
session_start();
include "db_connect.php";

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

$sql = "SELECT users.*, memberships.membership_name
        FROM users
        LEFT JOIN memberships ON users.membership_id = memberships.membership_id
        WHERE users.user_id = '$user_id'";

$result = mysqli_query($conn, $sql);
$user = mysqli_fetch_assoc($result);

$access_code = "AURA-" . str_pad($user['user_id'], 5, "0", STR_PAD_LEFT);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Access Card | Aura Fitness Club</title>
    <link rel="stylesheet" href="style.css?v=2">
</head>
<body>

<header class="navbar">
    <div class="logo">AURA FITNESS CLUB</div>
    <nav class="nav-links">
        <a href="dashboard.php">DASHBOARD</a>
        <a href="classes.php">CLASSES</a>
        <a href="my_bookings.php">MY BOOKINGS</a>
        <a href="logout.php">LOGOUT</a>
    </nav>
</header>

<section class="page-container">
    <div class="access-card">
        <h1>AURA FITNESS CLUB</h1>
        <h2>Digital Access Card</h2>

        <p><strong>Name:</strong> <?php echo $user['first_name'] . " " . $user['last_name']; ?></p>
        <p><strong>Email:</strong> <?php echo $user['email']; ?></p>
        <p><strong>Membership:</strong> <?php echo $user['membership_name']; ?></p>
        <p><strong>Status:</strong> Active</p>

        <div class="access-code"><?php echo $access_code; ?></div>

        <div class="qr-box">
            QR CODE
        </div>
    </div>
</section>

</body>
</html>