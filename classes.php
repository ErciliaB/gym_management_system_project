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
        <a href="logout.php">LOGOUT</a>
    </nav>
</header>

<section class="page-container">

    <h1>Available Classes</h1>
    <p>Choose a class and reserve your spot.</p>

    <div class="class-scroll">

        <?php while ($row = mysqli_fetch_assoc($result)) { ?>

            <div class="class-card">
                <h2><?php echo $row['class_name']; ?></h2>

                <p><strong>Date:</strong> <?php echo $row['class_date']; ?></p>
                <p><strong>Time:</strong> <?php echo $row['class_time']; ?></p>
                <p><strong>Trainer:</strong> <?php echo $row['trainer_name']; ?></p>
                <p><strong>Capacity:</strong> <?php echo $row['capacity']; ?></p>

                <p class="class-description">
                    <?php echo $row['class_description']; ?>
                </p>

                <a class="btn" href="book_class.php?class_id=<?php echo $row['class_id']; ?>">
                    Book Class
                </a>
            </div>

        <?php } ?>

    </div>

</section>

</body>
</html>