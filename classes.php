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
    <title>Available Classes</title>
</head>
<body>

<h1>Available Gym Classes</h1>

<nav>
    <a href="index.php">Home</a> |
    <a href="dashboard.php">Dashboard</a> |
    <a href="logout.php">Logout</a>
</nav>

<br>

<table border="1" cellpadding="10">
    <tr>
        <th>Class Name</th>
        <th>Date</th>
        <th>Time</th>
        <th>Trainer</th>
        <th>Capacity</th>
        <th>Description</th>
        <th>Action</th>
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
                <a href="book_class.php?class_id=<?php echo $row['class_id']; ?>">
                    Book Class
                </a>
            </td>
        </tr>
    <?php } ?>

</table>

</body>
</html>