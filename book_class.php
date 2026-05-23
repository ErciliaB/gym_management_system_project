<?php
session_start();
include "db_connect.php";

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$message = "";

if (isset($_GET['class_id'])) {

    $class_id = mysqli_real_escape_string($conn, $_GET['class_id']);
    $user_id = $_SESSION['user_id'];

    $check_sql = "SELECT * FROM bookings 
                  WHERE user_id='$user_id' AND class_id='$class_id'";
    $check_result = mysqli_query($conn, $check_sql);

    if (mysqli_num_rows($check_result) > 0) {
        $message = "You have already booked this class.";
    } else {
        $sql = "INSERT INTO bookings (user_id, class_id)
                VALUES ('$user_id', '$class_id')";

        if (mysqli_query($conn, $sql)) {
            $message = "Class booked successfully!";
        } else {
            $message = "Error: " . mysqli_error($conn);
        }
    }

} else {
    $message = "No class selected.";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Book Class | Aura Fitness Club</title>
    <link rel="stylesheet" href="style.css?v=2">
</head>
<body>

<header class="navbar">
    <div class="logo">AURA FITNESS CLUB</div>

    <nav class="nav-links">
        <a href="index.php">HOME</a>
        <a href="dashboard.php">DASHBOARD</a>
        <a href="classes.php">CLASSES</a>
        <a href="logout.php">LOGOUT</a>
    </nav>
</header>

<section class="page-container">

    <div class="card">
        <h1>Booking Status</h1>

        <p><?php echo $message; ?></p>

        <br>

        <a class="btn" href="classes.php">Back to Classes</a>
        <a class="btn-outline" href="dashboard.php">Go to Dashboard</a>
    </div>

</section>

</body>
</html>