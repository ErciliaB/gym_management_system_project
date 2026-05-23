
<?php
session_start();
include "db_connect.php";

$sql = "SELECT classes.*, trainers.trainer_name
        FROM classes
        LEFT JOIN trainers
        ON classes.trainer_id = trainers.trainer_id";

$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Manage Classes | Aura Fitness Club</title>
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

   <h1 style="margin-bottom: 20px;">
    Manage Classes
</h1>

<div style="margin-bottom: 30px;">
    <a href="add_class.php" class="btn">
        Add New Class
    </a>
</div>

    <table class="data-table">

        <thead>
            <tr>
                <th>ID</th>
                <th>Class</th>
                <th>Date</th>
                <th>Time</th>
                <th>Trainer</th>
                <th>Capacity</th>
                <th>Actions</th>
            </tr>
        </thead>

        <tbody>

        <?php while($row = mysqli_fetch_assoc($result)) { ?>

            <tr>

                <td><?php echo $row['class_id']; ?></td>

                <td><?php echo $row['class_name']; ?></td>

                <td><?php echo $row['class_date']; ?></td>

                <td><?php echo $row['class_time']; ?></td>

                <td><?php echo $row['trainer_name']; ?></td>

                <td><?php echo $row['capacity']; ?></td>

                <td>

                    <a class="btn"
                       href="edit_class.php?class_id=<?php echo $row['class_id']; ?>">
                        Edit
                    </a>

                    <a class="btn-outline"
                       href="delete_class.php?class_id=<?php echo $row['class_id']; ?>"
                       onclick="return confirm('Delete this class?');">
                        Delete
                    </a>

                </td>

            </tr>

        <?php } ?>

        </tbody>

    </table>

</section>

</body>
</html>