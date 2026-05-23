<?php
session_start();
include "db_connect.php";

$result = mysqli_query(
    $conn,
    "SELECT * FROM contact_messages
     ORDER BY submitted_at DESC"
);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Contact Messages | Aura Fitness Club</title>
    <link rel="stylesheet" href="style.css?v=2">
</head>
<body>

<header class="navbar">
    <div class="logo">AURA ADMIN</div>

    <nav class="nav-links">
        <a href="admin_dashboard.php">DASHBOARD</a>
        <a href="logout.php">LOGOUT</a>
    </nav>
</header>

<section class="page-container">

    <h1 style="margin-bottom:20px;">
        Contact Messages
    </h1>

    <table class="data-table">

        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Message</th>
                <th>Date Submitted</th>
            </tr>
        </thead>

        <tbody>

        <?php while($row = mysqli_fetch_assoc($result)) { ?>

            <tr>

                <td><?php echo $row['message_id']; ?></td>

                <td><?php echo $row['full_name']; ?></td>

                <td><?php echo $row['email']; ?></td>

                <td><?php echo $row['message']; ?></td>

                <td><?php echo $row['submitted_at']; ?></td>

            </tr>

        <?php } ?>

        </tbody>

    </table>

</section>

</body>
</html>