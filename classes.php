<?php
include "db_connect.php";

$sql = "SELECT classes.*, trainers.trainer_name
        FROM classes
        LEFT JOIN trainers ON classes.trainer_id = trainers.trainer_id";

$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Classes | Aura Fitness Club</title>
    <link rel="stylesheet" href="style.css?v=2">
</head>
<body>

<header class="navbar">
    <div class="logo">AURA FITNESS CLUB</div>

    <nav class="nav-links">
        <a href="index.php">HOME</a>
        <a href="dashboard.php">DASHBOARD</a>
        <a href="register.php">REGISTER</a>
        <a href="logout.php">LOGOUT</a>
    </nav>
</header>

<section class="page-container">

    <h1>Available Classes</h1>

    <div class="card">

        <table>
            <tr>
                <th>Class</th>
                <th>Date</th>
                <th>Time</th>
                <th>Trainer</th>
                <th>Capacity</th>
                <th>Description</th>
                <th>Book</th>
            </tr>

            <?php while ($row = mysqli_fetch_assoc($result)) { ?>

            <tr>
                <td><?php echo $row['class_name']; ?></td>
                <td><?php echo $row['class_date']; ?></td>
                <td><?php echo $row['class_time']; ?></td>
                <td><?php echo $row['trainer_name']; ?></td>
                <td><?php echo $row['capacity']; ?></td>
                <td><?php echo $row['class_description']; ?></td>

                <td>
                    <a class="btn"
                       href="book_class.php?class_id=<?php echo $row['class_id']; ?>">
                        Book
                    </a>
                </td>
            </tr>

            <?php } ?>

        </table>

    </div>

</section>

</body>
</html>