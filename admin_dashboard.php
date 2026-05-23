<?php
session_start();
include "db_connect.php";

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

$sql = "SELECT * FROM users WHERE user_id = '$user_id' AND role = 'admin'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) == 0) {
    header("Location: dashboard.php");
    exit();
}

$users_count = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM users"));
$classes_count = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM classes"));
$bookings_count = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM bookings"));
$messages_count = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM contact_messages"));
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard | Aura Fitness Club</title>
    <link rel="stylesheet" href="style.css?v=2">
</head>
<body>

<header class="navbar">
    <div class="logo">AURA ADMIN</div>

    <nav class="nav-links">
        <a href="admin_dashboard.php">ADMIN HOME</a>
        <a href="index.php">WEBSITE</a>
        <a href="logout.php">LOGOUT</a>
    </nav>
</header>

<section class="page-container">

    <h1>Admin Dashboard</h1>
    <p>Manage website content, bookings, memberships and customer messages.</p>

    <div class="features">

        <div class="feature-card">
            <h3>Members</h3>
            <p><?php echo $users_count; ?> registered users</p>
        </div>

        <div class="feature-card">
            <h3>Classes</h3>
            <p><?php echo $classes_count; ?> available classes</p>
        </div>

        <div class="feature-card">
            <h3>Bookings</h3>
            <p><?php echo $bookings_count; ?> total bookings</p>
        </div>

        <div class="feature-card">
            <h3>Messages</h3>
            <p><?php echo $messages_count; ?> contact messages</p>
        </div>

    </div>

    <div class="features">

        <div class="feature-card">
            <h3>Manage Classes</h3>
            <p>Add, edit and delete gym classes.</p>
            <br>
            <a class="btn" href="manage_classes.php">Open</a>
        </div>

        <div class="feature-card">
            <h3>Manage Memberships</h3>
            <p>Add, edit and delete membership plans.</p>
            <br>
            <a class="btn" href="manage_memberships.php">Open</a>
        </div>

        <div class="feature-card">
            <h3>View Bookings</h3>
            <p>View all class bookings made by members.</p>
            <br>
            <a class="btn" href="view_all_bookings.php">Open</a>
        </div>

        <div class="feature-card">
            <h3>Contact Messages</h3>
            <p>View messages sent through the contact form.</p>
            <br>
            <a class="btn" href="view_messages.php">Open</a>
        </div>

    </div>

</section>

<script src="script.js"></script>

</body>
</html>