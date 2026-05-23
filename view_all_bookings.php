<?php
session_start();
include "db_connect.php";

$sql = "SELECT
        bookings.booking_id,
        bookings.booking_date,
        bookings.booking_status,
        users.first_name,
        users.last_name,
        users.email,
        classes.class_name,
        classes.class_date,
        classes.class_time
        FROM bookings

        JOIN users
        ON bookings.user_id = users.user_id

        JOIN classes
        ON bookings.class_id = classes.class_id

        ORDER BY bookings.booking_date DESC";

$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Bookings | Aura Fitness Club</title>
    <link rel="stylesheet" href="style.css?v=2">
</head>
<body>

<header class="navbar">
    <div class="logo">AURA ADMIN</div>

    <nav class="nav-links">
        <a href="admin_dashboard.php">DASHBOARD</a>
        <a href="manage_classes.php">CLASSES</a>
        <a href="manage_memberships.php">MEMBERSHIPS</a>
        <a href="logout.php">LOGOUT</a>
    </nav>
</header>

<section class="page-container">

    <h1 style="margin-bottom:20px;">
        All Member Bookings
    </h1>

    <table class="data-table">

        <thead>
            <tr>
                <th>ID</th>
                <th>Member</th>
                <th>Email</th>
                <th>Class</th>
                <th>Date</th>
                <th>Time</th>
                <th>Booking Date</th>
                <th>Status</th>
            </tr>
        </thead>

        <tbody>

        <?php while($row = mysqli_fetch_assoc($result)) { ?>

            <tr>

                <td><?php echo $row['booking_id']; ?></td>

                <td>
                    <?php
                    echo $row['first_name'] . " " . $row['last_name'];
                    ?>
                </td>

                <td><?php echo $row['email']; ?></td>

                <td><?php echo $row['class_name']; ?></td>

                <td><?php echo $row['class_date']; ?></td>

                <td><?php echo $row['class_time']; ?></td>

                <td><?php echo $row['booking_date']; ?></td>

                <td><?php echo $row['booking_status']; ?></td>

            </tr>

        <?php } ?>

        </tbody>

    </table>

</section>

</body>
</html>