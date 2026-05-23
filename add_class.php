<?php
session_start();
include "db_connect.php";

$message = "";

$trainer_result = mysqli_query($conn, "SELECT * FROM trainers");

if (isset($_POST['add_class'])) {
    $class_name = mysqli_real_escape_string($conn, $_POST['class_name']);
    $class_date = mysqli_real_escape_string($conn, $_POST['class_date']);
    $class_time = mysqli_real_escape_string($conn, $_POST['class_time']);
    $capacity = mysqli_real_escape_string($conn, $_POST['capacity']);
    $class_description = mysqli_real_escape_string($conn, $_POST['class_description']);
    $trainer_id = mysqli_real_escape_string($conn, $_POST['trainer_id']);

    $sql = "INSERT INTO classes
            (class_name, class_date, class_time, capacity, class_description, trainer_id)
            VALUES
            ('$class_name', '$class_date', '$class_time', '$capacity', '$class_description', '$trainer_id')";

    if (mysqli_query($conn, $sql)) {
        $message = "Class added successfully.";
    } else {
        $message = "Error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Class | Aura Fitness Club</title>
    <link rel="stylesheet" href="style.css?v=2">
</head>
<body>

<header class="navbar">
    <div class="logo">AURA ADMIN</div>
    <nav class="nav-links">
        <a href="admin_dashboard.php">DASHBOARD</a>
        <a href="manage_classes.php">MANAGE CLASSES</a>
        <a href="logout.php">LOGOUT</a>
    </nav>
</header>

<section class="page-container">
    <div class="card">
        <h1>Add New Class</h1>

        <p><?php echo $message; ?></p>

        <form method="POST">
            <input type="text" name="class_name" placeholder="Class Name" required>

            <input type="date" name="class_date" required>

            <input type="time" name="class_time" required>

            <input type="number" name="capacity" placeholder="Capacity" required>

            <textarea name="class_description" placeholder="Class Description" required></textarea>

            <select name="trainer_id" required>
                <option value="">Select Trainer</option>

                <?php while ($trainer = mysqli_fetch_assoc($trainer_result)) { ?>
                    <option value="<?php echo $trainer['trainer_id']; ?>">
                        <?php echo $trainer['trainer_name']; ?>
                    </option>
                <?php } ?>
            </select>

            <br><br>

            <button type="submit" name="add_class">Add Class</button>
        </form>
    </div>
</section>

</body>
</html>
