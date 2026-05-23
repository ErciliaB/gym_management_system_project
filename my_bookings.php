<?php
session_start();
include "db_connect.php";

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

$sql = "SELECT bookings.*, classes.class_name, classes.class_date, classes.class_time, trainers.trainer_name
        FROM bookings
        JOIN classes ON bookings.class_id = classes.class_id
        LEFT JOIN trainers ON classes.trainer_id = trainers.trainer_id
        WHERE bookings.user_id = '$user_id'
        ORDER BY classes.class_date ASC";

$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>My Bookings | Aura Fitness Club</title>
    <link rel="stylesheet" href="style.css?v=2">
</head>
<body>

<header class="navbar">
    <div class="logo">AURA FITNESS CLUB</div>
    <nav class="nav-links">
        <a href="dashboard.php">DASHBOARD</a>
        <a href="classes.php">CLASSES</a>
        <a href="access_card.php">ACCESS CARD</a>
        <a href="logout.php">LOGOUT</a>
    </nav>
</header>

<section class="page-container">
    <h1>My Bookings</h1>
    <p>View the classes you have booked.</p>

    <div class="class-scroll">
        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <div class="class-card">
                <h2><?php echo $row['class_name']; ?></h2>
                <p><strong>Date:</strong> <?php echo $row['class_date']; ?></p>
                <p><strong>Time:</strong> <?php echo $row['class_time']; ?></p>
                <p><strong>Trainer:</strong> <?php echo $row['trainer_name']; ?></p>
                <p><strong>Status:</strong> <?php echo $row['booking_status']; ?></p>
            </div>
        <?php } ?>
    </div>
</section>

</body>
</html>