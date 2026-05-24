<?php
include "db_connect.php";

$result = mysqli_query($conn, "SELECT * FROM trainers");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Manage Trainers | Aura Fitness Club</title>
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

    <h1 style="margin-bottom:20px;">Manage Trainers</h1>

    <div style="margin-bottom:30px;">
        <a href="add_trainer.php" class="btn">Add Trainer</a>
    </div>

    <table class="data-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Trainer</th>
                <th>Specialization</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Actions</th>
            </tr>
        </thead>

        <tbody>
        <?php while($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
                <td><?php echo $row['trainer_id']; ?></td>
                <td><?php echo $row['trainer_name']; ?></td>
                <td><?php echo $row['specialization']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td><?php echo $row['phone_number']; ?></td>
                <td>
                    <a class="btn" href="edit_trainer.php?id=<?php echo $row['trainer_id']; ?>">Edit</a>

                    <a class="btn-outline"
                       href="delete_trainer.php?id=<?php echo $row['trainer_id']; ?>"
                       onclick="return confirm('Delete this trainer?')">
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